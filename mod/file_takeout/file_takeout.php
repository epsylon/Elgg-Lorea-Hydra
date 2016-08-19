<?php

//
// Define variables
//
global $CONFIG;
$file_takeout_tmp_files = array(); // keep track of all the tmp files, so we can remove them later.
$site_url =  elgg_get_site_url();
$title = elgg_view_title("File Takeout");
$guid_from_path = basename($_SERVER["REQUEST_URI"]);
$logged_in_user = elgg_get_logged_in_user_entity();

// 
// Helper functions
//

// Everything needed to convert HTML files to DOCX
require_once(elgg_get_plugins_path() . 'file_takeout/html2docx/phpword/PHPWord.php');
require_once(elgg_get_plugins_path() . 'file_takeout/html2docx/simplehtmldom/simple_html_dom.php');
require_once(elgg_get_plugins_path() . 'file_takeout/html2docx/htmltodocx_converter/h2d_htmlconverter.php');
require_once(elgg_get_plugins_path() . 'file_takeout/html2docx/styles.inc');
require_once(elgg_get_plugins_path() . 'file_takeout/html2docx/support_functions.inc');
function generate_docx($html, $file_path, &$file_takeout_tmp_files) {
	$phpword_object = new PHPWord();
	$section = $phpword_object->createSection();
	$html_dom = new simple_html_dom();
	$html_dom->load($html);
	$html_dom_array = $html_dom->find('html',0)->children();
	$paths = htmltodocx_paths();
	$initial_state = array(
		'phpword_object' => &$phpword_object, // Must be passed by reference.
		'base_root' => $paths['base_root'],
		'base_path' => $paths['base_path'],
		'current_style' => array('size' => '11'), // The PHPWord style on the top element.
		'parents' => array(0 => 'body'), // Our parent is body.
		'list_depth' => 0, // This is the current depth of any current list.
		'context' => 'section', // Possible values - section, footer or header.
		'pseudo_list' => TRUE, // NOTE: Word lists not yet supported (TRUE is the only option at present).
		'pseudo_list_indicator_font_name' => 'Wingdings', // Bullet indicator font.
		'pseudo_list_indicator_font_size' => '7', // Bullet indicator size.
		'pseudo_list_indicator_character' => 'l ', // Gives a circle bullet point with wingdings.
		'table_allowed' => TRUE, // Note, if you are adding this html into a PHPWord table you should set this to FALSE: tables cannot be nested in PHPWord.
		'treat_div_as_paragraph' => FALSE, // If set to TRUE, each new div will trigger a new line in the Word document. 
		'style_sheet' => htmltodocx_styles(), // This is an array (the "style sheet") from styles.inc
		/* I added these to fix a bug for images not showing up in docx converted files */
		'download_img_path' => elgg_get_data_path(),
		'download_img_tmp' => &$file_takeout_tmp_files, 
	);
	htmltodocx_insert_html($section, $html_dom_array[0]->nodes, $initial_state);
	$html_dom->clear(); 
	unset($html_dom);
	$objWriter = PHPWord_IOFactory::createWriter($phpword_object, 'Word2007'); // Word2007 is the only option :-(
	$objWriter->save($file_path);
}

// Save a few lines of code and use this helper function to grab all Elgg entities by owner and subtype (file, blog, page_top, bookmarks)
function get_all_entities($guid, $subtype) {
	$options = array(
		'type' => 'object',
		'subtype' => $subtype,
		'container_guid' => $guid,
		'limit' => '',
	);
	return elgg_get_entities($options);
}

// Sanitize file names
function sanitize_file_name($filename) {
	$filename_array = explode('.', $filename);
	if (count($filename_array) > 2) {
		$filename = implode('', $filename_array);
	}
	$strip = array("&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;", "&#039;", "~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "=", "+", "[", "{", "]", "’", "}", "\\", "|", ";", ":", "\"", "'", "â€”", "â€“", ",", "<", ">", "/", "?");
	$clean = trim(str_replace($strip, "", $filename));
	$clean = preg_replace('/\s+/', "_", $clean);
	return $clean;
}

function create_files_from_entities($entities, $entity_type, $subtype, $guid, &$zip, &$file_takeout_tmp_files) {
	if (count($entities) > 0) {
		$user = elgg_get_logged_in_user_entity();
		$user_guid = $user->getGUID();
		$export_type = '';
		if ($entity_type == 'file') {
			$export_type = elgg_get_plugin_user_setting('file_takeout_file_meta_export_type', $user_guid, 'file_takeout');
		} else {
			$export_type = elgg_get_plugin_user_setting('file_takeout_export_type', $user_guid, 'file_takeout');
		}
		if ($export_type == '') {
			$export_type = 'html';
		}
		$area = '<li style="font-family:  Monaco, Consolas, monospace; font-size:0.85em;">...' . $entity_type . '/entries.xml</li>';
		$group_entity = get_entity($guid);
		$url = elgg_get_site_url() . $entity_type . '/group' . '/' . $guid . '/all';
		set_input('view', 'rss');
		$contents = <<<__HTML
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:georss="http://www.georss.org/georss" >
<channel>
<title><![CDATA[$group_entity->name]]></title>
<link>$url</link>
<description><![CDATA[]]></description>
__HTML;
		$options = array(
			'type' => 'object',
			'subtype' => $subtype,
			'container_guid' => $guid,
			'limit' => '',
		);
		$contents .= elgg_list_entities($options);
		$contents .= <<<__HTML
</channel>
</rss>
__HTML;
		set_input('view', 'default');
		$zip->addFromString($entity_type . '/entries.xml', $contents);

		// create a file for each entry
		foreach ($entities as $entity) {
			$author = get_entity($entity->owner_guid)->name;
			$pubdate = date('r', $entity->time_created);
			$filedate = date('Y-m-d', $entity->time_created);
			if ($entity_type == 'bookmarks') {
				$description = $entity->description.'<p>Address of bookmark: <a href="'.$entity->address.'">'.$entity->address.'</a></p>';
			} else if ($entity_type == 'file') {
				$description = $entity->description.'<p>File: <a href="files/'.sanitize_file_name($entity->originalfilename).'">'.sanitize_file_name($entity->originalfilename).'</a></p>';
			} else {
				$description = $entity->description;
			}
			$content = '';
			$content .= <<<__HTML
<html>
__HTML;
			if ($export_type != 'docx') {
				$content .= <<<__HTML
<head>
<style>
body { 
	font-family: 'Segoe UI Light', 'Segoe UI', Segoe, Tahoma, Helvetica, Arial, sans-serif;
	font-size: 0.85em;
}
</style>
</head>
__HTML;
			}
			$content .= <<<__HTML
<body>
<div class="post">
<h1>$entity->title</h1>
<h2 class="post-meta">By $author on $pubdate</h2>
$description
__HTML;
			if ($entity->countComments() > 0) {
				$comments = $entity->getAnnotations('generic_comment');
				$content .= <<<__HTML
<div class="post-comments">
<h2>Comments</h2>
__HTML;
				foreach ($comments as $comment) {
					$comment_author = get_entity($comment->owner_guid)->name;
					$comment_pubdate = date('r', $comment->time_created);
					$content .= <<<__HTML
<div class="post-comment">
<h3 class="post-comment-meta">By $comment_author on $comment_pubdate</h3>
$comment->value
</div>
__HTML;
				}
				$content .= <<<__HTML
</div>
__HTML;
			}
			$content .= <<<__HTML
</div>
__HTML;
			if ($export_type == 'aspx') {
				$content .= <<<__HTML
<p><a href="javascript:history.back();">&lt; Back to file listing</a></p>
</body>
</html>
__HTML;
			}
			$file_name = sanitize_file_name($filedate . '-' . $entity->title) . '.' . $export_type;
			$area .= '<li style="font-family:  Monaco, Consolas, monospace; font-size: 0.85em;">...' . $entity_type . '/' . $file_name . '</li>';
			if ($export_type == 'docx') {
				$docx_filepath = elgg_get_data_path() . $file_name;
				generate_docx($content, $docx_filepath, $file_takeout_tmp_files);
				$zip->addFile($docx_filepath, $entity_type . '/' . $file_name);
				$file_takeout_tmp_files[] = $docx_filepath;
			} else {
				$zip->addFromString($entity_type . '/' . $file_name, $content);
			}
		}
		return $area;
	}
}

// 
// Logic to do the work ...
// 

// Create the ZIP archive and make it available for download
if ($guid_from_path != 'file_takeout') {
	$files = get_all_entities($guid_from_path, 'file');
	$blogs = get_all_entities($guid_from_path, 'blog');
	$pages = get_all_entities($guid_from_path, 'page_top');
	$bookmarks = get_all_entities($guid_from_path, 'bookmarks');
	if (count($files) > 0 || count($blogs) > 0 || count($pages) > 0 || count($bookmarks) > 0) {
		$area .= '<h3>' . get_entity($guid_from_path)->name . '</h3>';
		$area .= '<br><p>Zipping the following files...</p>';
		$area .= '<ul>';
		$archive_path = elgg_get_data_path() . $guid_from_path . '.zip';
		if (file_exists($archive_path)) {
			unlink($archive_path);
		}
		$zip = new ZipArchive;
		$res = $zip->open($archive_path, ZipArchive::CREATE);
		if ($res === TRUE) {
			foreach ($files as $file) {
				if (file_exists($file->getFilenameOnFilestore())) {
					$area .= '<li style="font-family: Monaco, Consolas, monospace; font-size: 0.85em;">...file/files/' . sanitize_file_name($file->originalfilename) . '</li>';
					$zip->addFile($file->getFilenameOnFilestore(), 'file/files/' . sanitize_file_name($file->originalfilename));
				} else {
					$area .= '<li>Could not find ' . $file->getFilenameOnFilestore() . '</li>';
				}
			}
			$area .= create_files_from_entities($files, 'file', 'file', $guid_from_path, $zip, $file_takeout_tmp_files);
			if (elgg_is_active_plugin('blog')) {
				$area .= create_files_from_entities($blogs, 'blog', 'blog', $guid_from_path, $zip, $file_takeout_tmp_files);
			}
			if (elgg_is_active_plugin('pages')) {
				$area .= create_files_from_entities($pages, 'pages', 'page_top', $guid_from_path, $zip, $file_takeout_tmp_files);
			}
			if (elgg_is_active_plugin('bookmarks')) {
				$area .= create_files_from_entities($bookmarks, 'bookmarks', 'bookmarks', $guid_from_path, $zip, $file_takeout_tmp_files);
			}
			$zip->close();
			// Clean up
			foreach ($file_takeout_tmp_files as $tmp_file){
				unlink($tmp_file);
			}
			$area .= '</ul>';
			$area .= '<br><p style="color: green;">ZIP file created successfully.</p><p>Download this <a href="'.$site_url.'file_takeout_download/'.$guid_from_path.'">ZIP file</a> to your computer and extract the contents to any folder.</p>';
		}
	} else {
		$area .= '<br><p style="color: red;">No files to export.</p>';
	}
	$area .= '<br><a href="'.$site_url.'file_takeout">&lt; Back to File Takeout</a>';
} 

// Display a listing of all groups that contain files
else {
	$area = '<br><p>This tool exports files from a group (which you own) into a ZIP archive. -- <a href="' . $site_url . 'settings/plugins">Configure Settings</a></p>';
	$all_groups = elgg_get_entities(array("type" => "group", "limit" => ""));
	$my_groups = 0;
	$sort_array = array();
	foreach ($all_groups as $group) {
		if (!isset($sort_array[$group->getOwnerEntity()->guid])) {
			$sort_array[$group->getOwnerEntity()->guid] = array();
		}
		$sort_array[$group->getOwnerEntity()->guid][] = $group;
	}
	foreach ($sort_array as $key => $val) {
		if ($key == $logged_in_user->guid || $logged_in_user->isAdmin() ) {
			$user = get_user($key);
			$area .= '<h3>Group Owner: ' . $user->name . '</h3>';
			$area .= '<ul>';
			foreach ($val as $group){
				$group_files = get_all_entities($group->guid, 'file');
				$area .= '<li>&gt; <a href="' . $group->getURL() . '">' . $group->name . '</a> (' . count($group_files) . ' files)';
				if (elgg_is_active_plugin('blog')) {
					$group_blogs = get_all_entities($group->guid, 'blog');
					$area .= '(' . count($group_blogs) . ' blogs)';
				}
				if (elgg_is_active_plugin('pages')) {
					$group_pages = get_all_entities($group->guid, 'page_top');
					$area .= '(' . count($group_pages) . ' pages)';
				}
				if (elgg_is_active_plugin('bookmarks')) {
					$group_bookmarks = get_all_entities($group->guid, 'bookmarks');
					$area .= '(' . count($group_bookmarks) . ' bookmarks)';
				}
				$area .= ' -- <a href="' . $_SERVER['REQUEST_URI'] . '/' . $group->guid . '">Download Archive</a></li>';
				$my_groups++;
			}
			$area .= '</ul><br>';
		}
	}
	if ($my_groups == 0) {
			$area .= '<p><span style="color: red;">You do not own any groups.</span></p><br>';
	}
	$user_files = get_all_entities($logged_in_user->guid, 'file');
	$area .= '<p>You may also download all your personal files (' . count($user_files) . ' files)';
	if (elgg_is_active_plugin('blog')) {
		$user_blogs = get_all_entities($logged_in_user->guid, 'blog');
		$area .= '(' . count($user_blogs) . ' blogs)';
	}
	if (elgg_is_active_plugin('pages')) {
		$user_pages = get_all_entities($logged_in_user->guid, 'page_top');
		$area .= '(' . count($user_pages) . ' pages)';
	}
	if (elgg_is_active_plugin('bookmarks')) {
		$user_bookmarks = get_all_entities($logged_in_user->guid, 'bookmarks');
		$area .= '(' . count($user_bookmarks) . ' bookmarks)';
	}
	$area .= ' --  <a href="' . $_SERVER['REQUEST_URI'] . '/' . $logged_in_user->guid . '">Download Archive</a></p>';
}

// Format page
$body = elgg_view_layout('one_column', array('content' => $title . $area));

// Draw it
echo elgg_view_page("File Takeout", $body);

?>
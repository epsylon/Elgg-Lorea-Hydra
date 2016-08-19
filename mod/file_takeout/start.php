<?php

elgg_register_event_handler('init', 'system', 'file_takeout_init');

$show_site_menu = elgg_get_plugin_setting('file_takeout_site_menu');
if ($show_site_menu == 'yes') {
	$menu_item = new ElggMenuItem('File Takeout', elgg_echo('File Takeout'), 'file_takeout');
	elgg_register_menu_item('site', $menu_item);
}

elgg_register_event_handler('pagesetup', 'system', 'file_takeout_plugin_pagesetup');

function file_takeout_init() {
	elgg_register_page_handler('file_takeout','page_handler_file_takeout');
	elgg_register_page_handler('file_takeout_download', 'page_handler_file_takeout_download');
}

function page_handler_file_takeout($page) {
	include elgg_get_plugins_path() . 'file_takeout/file_takeout.php';
}

/**
* Download the Archive ZIP to computer 
*/
function page_handler_file_takeout_download($page) {
	$file_guid = $page[0];
	$file_name = $file_guid.'.zip';
	$file_path = elgg_get_data_path();
	if (file_exists($file_path.$file_name)){
		$mime = "application/octet-stream";
		header("Pragma: public");
		header("Content-type: $mime");
		header("Content-Disposition: attachment; filename=\"$file_name\"");
		ob_clean();
		flush();
		readfile($file_path.$file_name);
		exit;
	} else {
		register_error(elgg_echo("file:downloadfailed"));
		forward('/file_takeout');
	}
}

/**
 * File Takeout user settings sidebar menu
 */
function file_takeout_plugin_pagesetup() {
	if (elgg_in_context("settings") && elgg_get_logged_in_user_guid()) {
		$user = elgg_get_page_owner_entity();
		if (!$user) {
			$user = elgg_get_logged_in_user_entity();
		}
		if (elgg_is_active_plugin('file_takeout')) {
			$params = array(
				'name' => 'file_takeout_link',
				'text' => elgg_echo('File Takeout'),
				'href' => "file_takeout",
				'section' => "file_takeout",
			);
			elgg_register_menu_item('page', $params);
		}
	}
}
?>
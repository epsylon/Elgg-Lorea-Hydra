<?php

namespace AU\GroupTagMenu;

$entity = $vars['entity'];
$page = $vars['page'];

if (!elgg_instanceof($entity, 'group') || $entity->au_group_tag_menu_enable == 'no') {
	return;
}

elgg_push_breadcrumb($entity->name, $entity->getURL());

//should be OK if this is empty
$tag = $page[2];
if ($tag) {
	elgg_push_breadcrumb($tag);
}

if ($tag == "all") {
	//show a tag cloud for all group tags
	//arbitrarily set to a max of 640 tags - should be enough for anyone :-)
	$title = elgg_echo("au_group_tag_menu:tagcloud");
	$options = array(
		'container_guid' => $entity->getGUID(),
		'type' => 'object',
		'threshold' => 0,
		'limit' => 640,
		'tag_names' => array('tags'),
			//			'order_by' => 'tag ASC',
	);
	$thetags = elgg_get_tags($options);
	//make it an alphabetical tag cloud, not with most popular first
	sort($thetags);
	//find the highest tag count for scaling the font

	$max = 0;
	foreach ($thetags as $key) {
		if ($key->total > $max) {
			$max = $key->total;
		}
	}
	$content = "  ";
	//loop through and generate tags so they display nicely
	//in the group, not as a dumb search page				
	foreach ($thetags as $key) {
		$url = "group_tag_menu/group/" . $entity->guid . "/" . urlencode($key->tag);

		//  get the font size for the tag (taken from elgg's own tagcloud code - not sure I love this)
		$size = round((log($key->total) / log($max + .0001)) * 100) + 30;
		if ($size < 100) {
			$size = 100;
		}
		// generate the link 
		$content .= elgg_view('output/url', array(
			'text' => $key->tag,
			'href' => $url,
			'style' => "font-size:{$size}%"
		)) . '&nbsp;';
	}
} else {
	//show the results for the selected tag
	$title = elgg_echo("au_group_tag_menu:title", array($tag));
	$options = array('type' => 'object',
		'metadata_name' => 'tags',
		'metadata_value' => $tag,
		'container_guid' => $entity->guid,
		'full_view' => false,);
	$content = elgg_list_entities_from_metadata($options);
}
//display the page
if (!$content) {
	$content = elgg_echo('au_group_tag_menu:noresults');
}

$layout = elgg_view_layout('content', array(
	'title' => $title,
	'content' => $content,
	'filter' => false
));

echo elgg_view_page($title, $layout);

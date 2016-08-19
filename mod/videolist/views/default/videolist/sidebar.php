<?php
/**
 * Videolist sidebar
 */

$show_comments = elgg_extract('show_comments', $vars, true);
$show_tags = elgg_extract('show_tags', $vars, true);
$show_videolist = elgg_extract('show_videolist', $vars, false);

if($show_videolist){
	echo elgg_view('page/elements/videolist_block', array(
		'container_guid' => elgg_get_page_owner_guid(),
	));
}

if($show_comments) {
	echo elgg_view('page/elements/comments_block', array(
		'subtypes' => 'videolist_item',
		'owner_guid' => elgg_get_page_owner_guid(),
	));
}

if($show_tags) {
	echo elgg_view('page/elements/tagcloud_block', array(
		'subtypes' => 'videolist_item',
		'owner_guid' => elgg_get_page_owner_guid(),
	));
}

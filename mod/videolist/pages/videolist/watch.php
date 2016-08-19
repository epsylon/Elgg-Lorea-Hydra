<?php
/**
 * View a file
 *
 * @package ElggFile
 */

$videolist_item = get_entity(get_input('guid'));

elgg_set_page_owner_guid($videolist_item->container_guid);

$page_owner = elgg_get_page_owner_entity();

elgg_push_breadcrumb(elgg_echo('videolist'), 'videolist/all');

$crumbs_title = $page_owner->name;
if (elgg_instanceof($page_owner, 'group')) {
	elgg_push_breadcrumb($crumbs_title, "videolist/group/$page_owner->guid/all");
} else {
	elgg_push_breadcrumb($crumbs_title, "videolist/owner/$page_owner->username");
}

$title = $videolist_item->title;

elgg_push_breadcrumb($title);

$content = elgg_view_entity($videolist_item, array('full_view' => true));
$content .= elgg_view_comments($videolist_item);

$sidebar = elgg_view('videolist/sidebar', array(
	'show_comments' => false,
	'show_videolist' => true,
));

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);

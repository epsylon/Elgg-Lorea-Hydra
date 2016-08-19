<?php
/**
 * Friends Videolist
 *
 * @package ElggVideolist
 */

$page_owner = elgg_get_page_owner_entity();

elgg_push_breadcrumb(elgg_echo('videolist'), "videolist/all");
elgg_push_breadcrumb($page_owner->name, "videolist/owner/$page_owner->username");
elgg_push_breadcrumb(elgg_echo('friends'));

elgg_register_title_button();

$title = elgg_echo("videolist:friends");

// offset is grabbed in list_user_friends_objects
$content = list_user_friends_objects($page_owner->guid, 'videolist_items', 10, false);
if (!$content) {
	$content = elgg_echo("videolist:none");
}

$sidebar = elgg_view('videolist/sidebar', array());

$body = elgg_view_layout('content', array(
	'filter_context' => 'friends',
	'content' => $content,
	'title' => $title,
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);

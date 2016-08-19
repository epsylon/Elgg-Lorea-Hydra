<?php
/**
 * Individual's or group's videolist
 *
 * @package ElggVideolist
 */

// access check for closed groups
group_gatekeeper();

$page_owner = elgg_get_page_owner_entity();

elgg_push_breadcrumb(elgg_echo('videolist'), "videolist/all");
elgg_push_breadcrumb($page_owner->name);

elgg_register_title_button();

$params = array();

if ($page_owner->guid == elgg_get_logged_in_user_guid()) {
	// user looking at own videolist
	$params['filter_context'] = 'mine';
} else if (elgg_instanceof($page_owner, 'user')) {
	// someone else's videolist
	// do not show select a tab when viewing someone else's posts
	$params['filter_context'] = 'none';
} else {
	// group videolist
	$params['filter'] = '';
}

$title = elgg_echo("videolist:owner", array($page_owner->name));

// List videolist
$content = elgg_list_entities(array(
	'types' => 'object',
	'subtypes' => 'videolist_item',
	'container_guid' => $page_owner->guid,
	'limit' => 10,
	'full_view' => FALSE,
));
if (!$content) {
	$content = elgg_echo("videolist:none");
}

$sidebar = elgg_view('videolist/sidebar');

$params['content'] = $content;
$params['title'] = $title;
$params['sidebar'] = $sidebar;

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);

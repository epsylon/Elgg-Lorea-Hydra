<?php
/**
 * Elgg messages inbox page
 *
 * @package ElggMessages
*/

gatekeeper();

$page_owner = elgg_get_page_owner_entity();
if (!$page_owner) {
	register_error(elgg_echo());
	forward();
}

// Get limit
$limit = elgg_get_plugin_user_setting( "limit", $page_owner->guid, "messages");
if (!$limit) {
	$limit = 15;
}

elgg_push_breadcrumb(elgg_echo('messages:inbox'));

elgg_register_title_button();

$title = elgg_echo('messages:user', array($page_owner->name));

$offset = (int) get_input('offset', 0);

$messages = elgg_get_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => 'messages',
	'metadata_name' => 'toId',
	'metadata_value' => $page_owner->guid,
	'owner_guid' => $page_owner->guid,
	'limit' => $limit,
	'offset' => $offset,
));
$count = elgg_get_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => 'messages',
	'metadata_name' => 'toId',
	'metadata_value' => $page_owner->guid,
	'owner_guid' => $page_owner->guid,
	'count' => true,
));

$body_vars = array(
	'folder' => 'inbox',
	'messages' => $messages,
	'count' => $count,
	'offset' => $offset,
	'limit' => $limit,
);

$content = elgg_view_form('messages/process', array(), $body_vars);

$sidebar = elgg_view('messages/sidebar');

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => elgg_echo('messages:inbox'),
	'filter' => '',
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);

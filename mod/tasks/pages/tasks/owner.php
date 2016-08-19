<?php
/**
 * List a user's or group's tasks
 *
 * @package ElggTasks
 */

$owner = elgg_get_page_owner_entity();
if (!$owner) {
	forward('tasks/all');
}

// access check for closed groups
group_gatekeeper();

$title = elgg_echo('tasks:lists:owner', array($owner->name));

elgg_push_breadcrumb($owner->name);

elgg_register_title_button('tasks', 'add');

$options = array(
	'type' => 'object',
	'subtypes' => 'task',
	'container_guid' => elgg_get_page_owner_guid(),
	'full_view' => false,
	'metadata_name' => 'list_guid',
	'metadata_value' => 0,
);

$content = elgg_list_entities_from_metadata($options);

if (!$content) {
	$content = '<p>' . elgg_echo('tasks:none') . '</p>';
}

$filter_context = '';
if (elgg_get_page_owner_guid() == elgg_get_logged_in_user_guid()) {
	$filter_context = 'mine';
}

$sidebar = elgg_view('tasks/sidebar/navigation');
$sidebar .= elgg_view('tasks/sidebar');

$params = array(
	'filter_context' => $filter_context,
	'content' => $content,
	'title' => $title,
	'sidebar' => $sidebar,
);

if (elgg_instanceof($owner, 'group')) {
	$params['filter'] = '';
}

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);

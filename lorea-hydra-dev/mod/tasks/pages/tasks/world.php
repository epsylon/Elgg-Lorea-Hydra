<?php
/**
 * List all tasks
 *
 * @package ElggTasks
 */

$title = elgg_echo('tasks:all');

elgg_pop_breadcrumb();
elgg_push_breadcrumb(elgg_echo('tasks'));

$lists = elgg_get_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => 'task',
	'count' => true,
	'metadata_name' => 'list_guid',
	'metadata_value' => 0,
));

elgg_register_title_button('tasks', 'add');

$content = elgg_list_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => 'task',
	'full_view' => false,
	'metadata_name' => 'list_guid',
	'metadata_value' => 0,
));
if (!$content) {
	$content = '<p>' . elgg_echo('tasks:none') . '</p>';
}

$body = elgg_view_layout('content', array(
	'filter_context' => 'all',
	'content' => $content,
	'title' => $title,
	'sidebar' => elgg_view('tasks/sidebar'),
));

echo elgg_view_page($title, $body);

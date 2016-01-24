<?php
/**
 * Elgg tasks widget
 *
 * @package ElggTasks
 */

elgg_load_library("elgg:tasks");

$num = (int) $vars['entity']->tasks_num;

// We show active first
$options = array(
	'type' => 'object',
	'subtype' => 'task',
	'relationship_guid' => $vars['entity']->owner_guid,
	'relationship' => 'subscribes',
	'metadata_name' => 'status',
	'metadata_value' => array('assigned', 'active'),
	'limit' => $num,
	'full_view' => FALSE,
	'pagination' => FALSE,
);
$content = elgg_get_entities_from_relationship($options);

echo elgg_view_entity_list($content, $options);

if ($content) {
	$url = "tasks/owner/" . elgg_get_page_owner_entity()->username;
	$more_link = elgg_view('output/url', array(
		'href' => $url,
		'text' => elgg_echo('tasks:more'),
		'is_trusted' => true,
	));
	echo "<span class=\"elgg-widget-more\">$more_link</span>";
} else {
	echo elgg_echo('tasks:none');
}

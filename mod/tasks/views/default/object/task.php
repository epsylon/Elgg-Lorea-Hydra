<?php
/**
 * View for task object
 *
 * @package ElggTasks
 *
 * @uses $vars['entity']    The task object
 * @uses $vars['full_view'] Whether to display the full view
 */

elgg_load_library('elgg:tasks');

$full = elgg_extract('full_view', $vars, FALSE);
$task = elgg_extract('entity', $vars, FALSE);

if (!$task) {
	return TRUE;
}

$options = array('metadata_name' => 'list_guid', 'metadata_value' => $task->guid, 'type' => 'object', 'subtype' => 'task');
$has_children = elgg_get_entities_from_metadata($options);
if ($has_children) {
   echo elgg_view('object/tasklist_top', $vars);
   return;
}


$icon = elgg_view_entity_icon($task, 'tiny');

$status = $task->status;

if(!in_array($status, array('new', 'assigned', 'unassigned', 'active', 'done', 'closed', 'reopened'))){
	$status = 'new';
}

$annotation = $task->getAnnotations('task_state_changed', 2, 0, 'desc');
$more_than_one = count($annotation) > 1;

if ($annotation) {
	$annotation = $annotation[0];
} else {
	$annotation = new stdClass();
	$annotation->owner_guid = $task->owner_guid;
	$annotation->time_created = $task->time_created;
}

if (in_array($status, array('assigned', 'active', 'done')) && $more_than_one) {
	$owner_link = elgg_view('tasks/participant_count', array('entity' => $task));
} else {
	$owner = get_entity($annotation->owner_guid);
	$owner_link = elgg_view('output/url', array(
		'href' => $owner->getURL(),
		'text' => $owner->name,
	));
}
$date = elgg_view_friendly_time($annotation->time_created);
$strapline = elgg_echo("tasks:strapline:$status", array($date, $owner_link));
$tags = elgg_view('output/tags', array('tags' => $task->tags));

$comments_count = $task->countComments();
//only display if there are commments
if ($comments_count != 0) {
	$text = elgg_echo("comments") . " ($comments_count)";
	$comments_link = elgg_view('output/url', array(
		'href' => $task->getURL() . '#task-comments',
		'text' => $text,
	));
} else {
	$comments_link = '';
}


$metadata = elgg_view_menu('entity', array(
	'entity' => $task,
	'handler' => 'tasks',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$subtitle = "$strapline $categories $comments_link";

// do not show the metadata and controls in widget view
if (elgg_in_context('widgets')) {
	$metadata = '';
}

if ($full) {
	$body = elgg_view('output/longtext', array('value' => $task->description));
	$new_task_form = elgg_view_form('tasks/inline', array(
		'id' => 'tasks-inline-form',
		'class' => 'hidden',
		'action' => 'action/tasks/edit',
	), array(
		'list' => $task,
	));

	$body .= elgg_view('tasks/info/extend', $vars);
	
	$body .= $new_task_form;

	$params = array(
		'entity' => $page,
		'title' => false,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'tags' => $tags,
	);
	$params = $params + $vars;
	$list_body = elgg_view('object/elements/summary', $params);

	$info = elgg_view_image_block($icon, $list_body);

	echo <<<HTML
$info
$body
HTML;

} else {
	// brief view

	$excerpt = elgg_get_excerpt($task->description);

	$params = array(
		'entity' => $task,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'tags' => false,
	);
	$params = $params + $vars;
	$list_body = elgg_view('object/elements/summary', $params);

	echo elgg_view_image_block($icon, $list_body);
}

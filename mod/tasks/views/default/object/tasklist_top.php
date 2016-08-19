<?php
/**
 * View for task object
 *
 * @package ElggTasks
 *
 * @uses $vars['entity']    The task list object
 * @uses $vars['full_view'] Whether to display the full view
 */


$full = elgg_extract('full_view', $vars, FALSE);
$tasklist = elgg_extract('entity', $vars, FALSE);

if (!$tasklist) {
	return TRUE;
}

$icon = elgg_view_entity_icon($tasklist, 'tiny');

$owner = get_entity($tasklist->owner_guid);
$owner_link = elgg_view('output/url', array(
	'href' => $owner->getURL(),
	'text' => $owner->name,
));

$date = elgg_view_friendly_time($tasklist->time_created);
$strapline = elgg_echo("tasks:lists:strapline", array($date, $owner_link));

if (isset($tasklist->enddate) && $tasklist->enddate) {
	$deadline = elgg_view_friendly_time(strtotime($tasklist->enddate));
	$strapline .= elgg_echo("tasks:lists:deadline", array($deadline));
}

$tags = elgg_view('output/tags', array('tags' => $tasklist->tags));

$comments_count = $tasklist->countComments();
//only display if there are commments
if ($comments_count != 0) {
	$text = elgg_echo("comments") . " ($comments_count)";
	$comments_link = elgg_view('output/url', array(
		'href' => $tasklist->getURL() . '#tasklist-comments',
		'text' => $text,
	));
} else {
	$comments_link = '';
}

$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
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
	$body = elgg_view('output/longtext', array('value' => $tasklist->description));

	$content = elgg_view('tasks/tasklist_graph', array(
		'entity' => $tasklist,
	));
	
	$params = array(
		'entity' => $tasklist,
		'title' => false,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'tags' => $tags,
		'content' => $content,
	);
	$params = $params + $vars;
	$list_body = elgg_view('object/elements/summary', $params);

	$info = elgg_view_image_block($icon, $list_body);
	
	$new_task_form = elgg_view_form('tasks/inline', array(
		'id' => 'tasks-inline-form',
		'class' => 'hidden',
		'action' => 'action/tasks/edit',
	), array(
		'list' => $tasklist,
	));
	
	$assigned_tasks = elgg_list_entities(array(
		'list_guid' => $tasklist->guid,
		'status' => array('assigned', 'active'),
		'full_view' => false,
		'offset' => (int) get_input('assigned_offset'),
		'offset_key' => 'assigned_offset',
	), 'tasks_get_entities');
	
	$info_vars = array(
		'id' => 'tasks-status-assigned',
		'class' => !$assigned_tasks ? 'hidden' : false,
	);
	$assigned_tasks = elgg_view_module('info', elgg_echo('tasks:assigned'), $assigned_tasks, $info_vars);
	
	$unassigned_tasks = elgg_list_entities(array(
		'list_guid' => $tasklist->guid,
		'status' => array('new', 'unassigned', 'reopened'),
		'full_view' => false,
		'offset' => (int) get_input('unassigned_offset'),
		'offset_key' => 'unassigned_offset',
	), 'tasks_get_entities');
	
	$info_vars = array(
		'id' => 'tasks-status-unassigned',
		'class' => !$unassigned_tasks ? 'hidden' : false,
	);
	$unassigned_tasks = elgg_view_module('info', elgg_echo('tasks:unassigned'), $unassigned_tasks, $info_vars);
	
	$closed_tasks = elgg_list_entities(array(
		'list_guid' => $tasklist->guid,
		'status' => array('done', 'closed'),
		'full_view' => false,
		'offset' => (int) get_input('closed_offset'),
		'offset_key' => 'closed_offset',
	), 'tasks_get_entities');
	
	$info_vars = array(
		'id' => 'tasks-status-closed',
		'class' => !$closed_tasks ? 'hidden' : false,
	);
	$closed_tasks = elgg_view_module('info', elgg_echo('tasks:closed'),	$closed_tasks, $info_vars);
	
		

	echo <<<HTML
<div class="elgg-item">
$info
</div>
$body
$new_task_form
<div class="mtl">
$assigned_tasks
$unassigned_tasks
$closed_tasks
</div>
HTML;

} else {
	// brief view

	$content = elgg_view('tasks/tasklist_graph', array(
		'entity' => $tasklist,
	));

	$params = array(
		'entity' => $tasklist,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'tags' => false,
		'content' => $content,
	);
	$params = $params + $vars;
	$list_body = elgg_view('object/elements/summary', $params);

	echo elgg_view_image_block($icon, $list_body);
}

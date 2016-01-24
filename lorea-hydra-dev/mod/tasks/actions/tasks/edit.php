<?php
/**
 * Create or edit a task
 *
 * @package ElggTasks
 */

$variables = elgg_get_config('tasks');
$input = array();
foreach ($variables as $name => $type) {
	$input[$name] = get_input($name);
	if ($name == 'title') {
		$input[$name] = strip_tags($input[$name]);
	}
	if ($type == 'tags') {
		$input[$name] = string_to_tag_array($input[$name]);
	}
}

// Get guids
$task_guid = (int)get_input('task_guid');
$container_guid = (int)get_input('container_guid');
$referer_guid = (int)get_input('referer_guid');

$container = get_entity($container_guid);

elgg_make_sticky_form('task');

if (!$input['title']) {
	register_error(elgg_echo('tasks:error:no_title'));
	forward(REFERER);
}

if (!$container) {
	forward(REFERER);
}

if ($input['priority'] == null) {
	$input['priority'] = '2'; // normal is default
}

if ($task_guid) {
	$task = get_entity($task_guid);
	if (!$task || !$task->canEdit()) {
		register_error(elgg_echo('tasks:error:no_save'));
		forward(REFERER);
	}
	$new_task = false;
} else {
	$task = new ElggObject();
	$task->subtype = 'task';
	$task->status = 'new';
	$task->time_status_changed = time();
	$new_task = true;
}

if (sizeof($input) > 0) {
	foreach ($input as $name => $value) {
		$task->$name = $value;
	}
}

$list_guid = $input['list_guid'];

if ($list_guid) {
	$task->list_guid = $list_guid;
}
else {
	$task->list_guid = 0;
}
$task->container_guid = $container_guid;

if ($task->save()) {

	elgg_clear_sticky_form('task');

	// Now save description as an annotation
	$task->annotate('task', $task->description, $task->access_id);

	system_message(elgg_echo('tasks:saved'));

	if ($new_task) {
		add_to_river('river/object/task/create', 'create', elgg_get_logged_in_user_guid(), $task->guid);
	}
	
	if ($new_task && $referer_guid && ($referer_entity = get_entity($referer_guid))) {
		$link = elgg_view('output/url', array(
			'href' => $task->getURL(),
			'text' => $task->title,
		));
		$annotation = create_annotation($referer_entity->guid,
										'generic_comment',
										elgg_echo('tasks:this:referer:comment', array($link)),
										"",
										elgg_get_logged_in_user_guid(),
										$referer_entity->access_id);
	}

	$task_json = array();
	foreach ($task->getExportableValues() as $v) {
		$task_json[$v] = $task->$v;
	}
	$task_json['list_guid'] = $task->list_guid;
	echo json_encode($task_json); 
	
	forward($task->getURL());
} else {
	register_error(elgg_echo('tasks:error:no_save'));
	forward(REFERER);
}

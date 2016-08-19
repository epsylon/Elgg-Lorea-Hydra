<?php
/**
 * Move text of first annotation to group forum topic object and delete annotation
 *
 * First determine if the upgrade is needed and then if needed, batch the update
 */

$tasks = elgg_get_entities(array(
	'type' => 'object',
	'subtype' => 'tasks',
	'limit' => 1,
));

// if not topics, no upgrade required
if (empty($tasks)) {
	return;
}

function tasks_2012100501($task) {
	require_once(elgg_get_plugins_path() . 'upgrade-tools/lib/upgrade_tools.php');
	if ($task->long_description) {
		$task->description = $task->long_description;
		$task->deleteMetadata('long_description');
		$task->save();
	}
	if ($task->parent_guid) {
		$task->list_guid = $task->parent_guid;
		$task->deleteMetadata('parent_guid');
	}
	else {
		$task->list_guid = 0;
	}
	/* Active was set as default, so it is not indicative of which tasks are
	really active */
	$task->deleteMetadata('active');

	if ($task->done) {
		$task->status = 'done';
		$task->deleteMetadata('done');
	} else {
		$task->status = 'new';
	}
	// reset priority since old system was a mess
	$task->priority = 2;
	upgrade_change_subtype($task, 'task');

	// update river
	$options = array('object_guid' => $task->guid);
	$items = elgg_get_river($options);
	foreach($items as $item) {
		if ($item->action_type == 'create') {
			upgrade_update_river($item->id, 'river/object/task/create', $task->guid, 0);
		}
		elseif(in_array($item->action_type, array('done', 'undone', 'subscribe', 'unsubscribe'))) {
			elgg_delete_river(array('id' => $item->id));
		}
	}

	return true;
}


/*
 * Run upgrade. First topics, then replies.
 */
$previous_access = elgg_set_ignore_access(true);
$options = array(
	'type' => 'object',
	'subtype' => 'tasks',
	'limit' => 0,
);
$batch = new ElggBatch('elgg_get_entities', $options, "tasks_2012100501", 100, false);
elgg_set_ignore_access($previous_access);

if ($batch->callbackResult) {
	error_log("Elgg Tasks upgrade (2012100501) succeeded");
} else {
	error_log("Elgg Tasks upgrade (2012100501) failed");
}

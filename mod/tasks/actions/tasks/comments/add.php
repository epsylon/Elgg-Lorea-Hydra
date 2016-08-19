<?php
/**
 * Tasks add comment action
 *
 * @package ElggTasks
 */

group_gatekeeper();

elgg_load_library('elgg:tasks');

$entity_guid = (int) get_input('entity_guid');
$comment_text = get_input('generic_comment');
$state_action = get_input('state_action', false);


// Let's see if we can get an entity with the specified GUID
$entity = get_entity($entity_guid);
if (!$entity) {
	register_error(elgg_echo("generic_comment:notfound"));
	forward(REFERER);
}

$user = elgg_get_logged_in_user_entity();

if($comment_text) {
	$annotation = create_annotation($entity->guid,
								'generic_comment',
								$comment_text,
								"",
								$user->guid,
								$entity->access_id);

	// tell user annotation posted
	if (!$annotation) {
		register_error(elgg_echo("generic_comment:failure"));
		forward(REFERER);
	}
}
switch ($state_action) {
	case 'assign':
		add_entity_relationship(elgg_get_logged_in_user_guid(), 'subscribes', $entity_guid);
		break;
	case 'activate':
		add_entity_relationship(elgg_get_logged_in_user_guid(), 'is_doing', $entity_guid);
		break;
	case 'assign_and_activate':
		add_entity_relationship(elgg_get_logged_in_user_guid(), 'subscribes', $entity_guid);
		add_entity_relationship(elgg_get_logged_in_user_guid(), 'is_doing', $entity_guid);
		break;
	case 'deactivate':
		remove_entity_relationship(elgg_get_logged_in_user_guid(), 'is_doing', $entity_guid);
		break;
	case 'leave':
		remove_entity_relationship(elgg_get_logged_in_user_guid(), 'is_doing', $entity_guid);
		remove_entity_relationship(elgg_get_logged_in_user_guid(), 'subscribes', $entity_guid);
		break;
	case 'reopen':
		remove_entity_relationships($entity_guid, 'is_doing', true);
		remove_entity_relationships($entity_guid, 'subscribes', true);
		break;
}

if (in_array($state_action, array('activate', 'assign_and_activate'))) {
	if($active_task = tasks_get_user_active_task($user->guid)) {
		$active_task->status = 'assigned';
		
		create_annotation($active_task->guid,
						'task_state_changed',
						'assigned',
						"",
						$user->guid,
						$active_task->access_id);
	}
}

$new_state = tasks_get_state_from_action($state_action);

if ($state_action == 'leave') {
	$have_participants_yet = elgg_get_entities_from_relationship(array(
		'relationship' => 'subscribes',
		'relationship_guid' => $entity->guid,
		'inverse_relationship' => true,
		'count' => true,
	));
	if ($have_participants_yet) {
		$new_state = $entity->status;
	}
}

if ($state_action == 'deactivate') {
	$have_participants_yet = elgg_get_entities_from_relationship(array(
		'relationship' => 'is_doing',
		'relationship_guid' => $entity->guid,
		'inverse_relationship' => true,
		'count' => true,
	));
	if ($have_participants_yet) {
		$new_state = $entity->status;
	}
}

if ($state_action == 'assign' && $entity->status == 'active') {
	$new_state = $entity->status;
}

if($new_state) {
	$entity->status = $new_state;	
	create_annotation($entity->guid,
					'task_state_changed',
					$state_action,
					"",
					$user->guid,
					$entity->access_id);
}

// notify if poster wasn't owner
if ($entity->owner_guid != $user->guid) {

	if($new_state) {
		notify_user($entity->owner_guid,
			$user->guid,
			elgg_echo('tasks:email:subject'),
			elgg_echo('tasks:email:body', array(
				$user->name,
				$entity->title,
				$new_state,
				$comment_text,
				$entity->getURL(),
				$user->name,
				$user->getURL()
			))
		);
	} else {
		notify_user($entity->owner_guid,
			$user->guid,
			elgg_echo('generic_comment:email:subject'),
			elgg_echo('generic_comment:email:body', array(
				$entity->title,
				$user->name,
				$comment_text,
				$entity->getURL(),
				$user->name,
				$user->getURL()
			))
		);
	}
}

if ($new_state) {
	system_message(elgg_echo("tasks:status:changed"));
	$action = $state_action;
} else {
	system_message(elgg_echo("generic_comment:posted"));
	$action = 'comment';
}

//add to river
if (!in_array($state_action, array('activate', 'deactivate'))) {
	$river = 'river/annotation/generic_comment/create';
	add_to_river($river, $action, $user->guid, $entity->guid, "", 0, $annotation);
}

if ($new_state) {
	echo "{\"new_state\": \"$new_state\"}";
}

// Forward to the page the action occurred on
forward(REFERER);

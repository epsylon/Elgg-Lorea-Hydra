<?php
/**
 * Enable selected notification methods for a batch of users
 */

$methods = get_input('methods');
$offset = get_input('offset');

if (empty($methods)) {
	register_error(elgg_echo('notification_tools:error:no_methods'));
	forward(REFERER);
}

$methods = explode(' ', $methods);

$users = elgg_get_entities(array(
	'types' => array('user'),
	'offset' => $offset,
));

foreach ($users as $user) {
	foreach ($methods as $method) {
		// Set default notification methods for collections
		$metadata_name = "collections_notifications_preferences_$method";
		$user->$metadata_name = -1;

		// Subscribe user to receive notifier notifications from each friend
		$batch = new ElggBatch('elgg_get_entities_from_relationship', array(
			'relationship' => 'friend',
			'relationship_guid' => $user->guid,
			'type' => 'user',
		));

		foreach ($batch as $friend) {
			add_entity_relationship($user->guid, "notify{$method}", $friend->guid);
		}
	}
}

$result = new stdClass;
$result->count = count($users);
echo json_encode($result);

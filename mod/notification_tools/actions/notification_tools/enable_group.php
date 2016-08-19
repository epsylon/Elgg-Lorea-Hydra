<?php
/**
 * Enables notification method for a batch of group members
 */

$methods = get_input('methods');
$offset = get_input('offset');

if (empty($methods)) {
	register_error(elgg_echo('notification_tools:error:no_methods'));
	forward(REFERER);
}

$methods = explode(' ', $methods);

// TODO Verify that notification methods are valid

$limit = 10;

$dbprefix = elgg_get_config('dbprefix');

$query = "SELECT r.guid_one as user_guid, r.guid_two as group_guid
FROM {$dbprefix}entity_relationships r
INNER JOIN {$dbprefix}entities ue ON ue.guid = r.guid_one
INNER JOIN {$dbprefix}entities ge ON ge.guid = r.guid_two
WHERE r.relationship = 'member'
AND ue.type = 'user'
AND ge.type = 'group'
LIMIT {$offset}, {$limit}";

// Get all group memberships
$memberships = get_data($query);

foreach ($memberships as $membership) {
	foreach ($methods as $method) {
		add_entity_relationship($membership->user_guid, "notify{$method}", $membership->group_guid);
	}
}

// Return the amount of processed items
$result = new stdClass;
$result->count = $limit;
echo json_encode($result);

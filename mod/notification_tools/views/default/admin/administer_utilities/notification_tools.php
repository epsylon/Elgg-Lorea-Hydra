<?php
/**
 * UI for forcing notification methods for all site users
 */

elgg_require_js('notification_tools/process');

$dbprefix = elgg_get_config('dbprefix');

$user_count = elgg_get_entities(array(
	'type' => 'user',
	'count' => true,
));

/**
 * Personal notifications
 */
echo elgg_view('admin/administer_utilities/enable_setting', array(
	'setting' => 'personal',
	'count' => $user_count,
));

/**
 * Friend collection notifications
 */
echo elgg_view('admin/administer_utilities/enable_setting', array(
	'setting' => 'collection',
	'count' => $user_count,
));

/**
 * Get count of group memberships
 */
$membership_count = get_data(
"SELECT COUNT(id) AS count
FROM {$dbprefix}entity_relationships r
INNER JOIN {$dbprefix}entities ue ON ue.guid = r.guid_one
INNER JOIN {$dbprefix}entities ge ON ge.guid = r.guid_two
WHERE r.relationship = 'member'
AND ue.type = 'user'
AND ge.type = 'group'
"
);

if ($membership_count) {
	echo elgg_view('admin/administer_utilities/enable_setting', array(
		'setting' => 'group',
		'count' => $membership_count[0]->count,
	));
}
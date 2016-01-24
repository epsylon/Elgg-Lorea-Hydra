<?php
/**
 * Resets container guids from all groups that aren't subgroups to owner guid
 */

$groups = elgg_get_entities(array(
	'type' => 'group',
	'limit' => 0,
));

foreach($groups as $group) {
	global $CONFIG;
	if (!elgg_instanceof($group->getContainerEntity(), 'group')) {
		$query = "UPDATE {$CONFIG->dbprefix}entities set"
				. " container_guid=0 where guid={$group->owner_guid}";
		update_data($query);
	}
}

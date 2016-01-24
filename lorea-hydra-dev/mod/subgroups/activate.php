<?php
/**
 * Unsets container guids from all groups that aren't subgroups
 */

$groups = elgg_get_entities(array(
	'type' => 'group',
	'limit' => 0,
));

foreach($groups as $group) {
	if (!elgg_instanceof($group->getContainerEntity(), 'group')) {
		$group->container_guid = 0;
		$group->save();
	}
}

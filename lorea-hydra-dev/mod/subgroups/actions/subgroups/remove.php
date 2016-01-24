<?php

$group_guid = get_input('group');
$othergroup_guid = get_input('othergroup');
$group = get_entity($group_guid);
$othergroup = get_entity($othergroup_guid);
if ($group instanceof ElggGroup && $group->canEdit()) {
	if ($othergroup instanceof ElggGroup && $othergroup->canEdit() && $othergroup->container_guid == $group_guid) {
		$othergroup->container_guid = $other_group->owner_guid;
		$othergroup->save();
	}
}
forward(REFERER);

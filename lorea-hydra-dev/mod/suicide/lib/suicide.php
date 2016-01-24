<?php

function suicide_find_inherator($object) {
	
	$owner_guid     = $object->getOwnerGUID();
	$container_guid = $object->getContainerGUID();
	$container      = get_entity($container_guid);
	
	// Everything that isn't in a group has no inherator
	if(!elgg_instanceof($object, 'group') && !elgg_instanceof($container, 'group')) {
		return null;
	}
	
	if(elgg_instanceof($object, 'group')) {
		$container_guid = $object->guid;
		$container      = $object;
	}
	
	// If the owner is also the owner of the container
	if($owner_guid == $container->owner_guid){
		// We'll find an operator
		if(elgg_is_active_plugin('group_operators')) {
			elgg_load_library('elgg:group_operators');
			$operators = get_group_operators($container);
			unset($operators[$owner_guid]);
		}
		if(!empty($operators)) {
			return $operators[0]->guid;
		} else {
			// And if not we'll find any member
			$members = $container->getMembers(2);
			foreach($members as $member) {
				if($member->guid != $owner_guid) {
					return $member->guid;
				}
			}
			return null;
		}
	} else {
		return $container->owner_guid;
	}
}

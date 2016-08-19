<?php

/*hooks for au group activity */

/**
 * Provide group owner_block link to activity page
 */
function aga_owner_block($hook, $type, $return, $params) {
	$group=$params['entity'];
	if (elgg_instanceof($group, 'group')) {
		//kill the activity menu
		foreach($return as $key=>$item){
	  	if($item->getName()=='activity'){
		  	unset($return[$key]);
	  	}
	  	
		}
		//add the menu item if activity is enabled
		if ($group->activity_enable != 'no'){
		$url = 'group_activity_plus/group/' . $params['entity']->guid . '/ingroup';
		$item = new ElggMenuItem('aga', elgg_echo('groups:activity'), $url);
		$return[] = $item;
	}
	}
	
	return $return;
}


// pluginhook to kill all the standard activity tabs called from activity page handler

function aga_kill_activity_tabs($hook,$type,$return,$params){
	//get rid of standard activity tabs
		foreach($return as $key=>$item){
			$tabs=array('all','mine','friend');
		  	if(in_array($item->getName(), $tabs)){
			  	unset($return[$key]);
		  	}
	  	}
	return $return;  		  	
}


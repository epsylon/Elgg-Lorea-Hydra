<?php
/**
 * Related groups helper functions
 *
 * @package ElggRelatedGroups
 */


/**
 * Gives the list of the group related groups
 *
 * @param ElggGroup $group
 * @return array
 */
function get_relatedgroups($group, $options = array()){
	if($group instanceof ElggGroup){
		
		$options['relationship'] = 'related';
		$options['relationship_guid'] = $group->guid;
		
		return elgg_get_entities_from_relationship(array($options));
		
	} else {
		return false;
	}
}

function list_relatedgroups($group, $options = array()){
	
	if($group instanceof ElggGroup){
		
		$defaults = array(
			'full_view' => false,
			'pagination' => true,
		);
		$options = array_merge($defaults, $options);
		
		$options['relationship'] = 'related';
		$options['relationship_guid'] = $group->guid;
	
		elgg_push_context('relatedgroups');
		$list = elgg_list_entities_from_relationship($options);
		elgg_pop_context();
		
		return $list;
		
	} else {
		return "";
	}
}

function relatedgroups_group_url_matches($url){
	$url = parse_url($url);
	$pattern1 = "/groups\/profile\/(?P<group_guid>\d+)/";
	$pattern2 = "/g\/(?P<group_alias>[^\/]+)/";
	
	$matches1 = array();
	$matches2 = array();
	
	preg_match($pattern1, $url['path'], $matches1);
	preg_match($pattern2, $url['path'], $matches2);
	
	if(!empty($matches1) || !empty($matches2)) {
		return array_merge($matches1, $matches2);
	} else {
		return false;
	}
}

function relatedgroups_get_group_from_url($group_url){
	$matches = relatedgroups_group_url_matches($group_url);
	$group_guid = $matches['group_guid'];
	$group_alias = $matches['group_alias'];
	
	$group = get_entity($group_guid);
	if(!$group && elgg_is_active_plugin('group_alias')) {
		$group = get_group_from_group_alias($group_alias);
	}
	
	if($group && $group->getURL() == $group_url){
		return $group;
	} else {
		return false;
	}
}

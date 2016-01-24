<?php

elgg_register_event_handler('init', 'system', 'members_extended_init');

function members_extended_init() {
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'members_extended_users_setup_entity_menu');
	elgg_register_page_handler('member-locations', "members_extended_location_pagehandler");	
}

function members_extended_location_pagehandler($page) {
	require_once elgg_get_plugins_path() . 'members_extended/pages/members_extended/member-locations.php';
	return true;
}

function members_extended_users_setup_entity_menu($hook, $type, $return, $params) {
	if (elgg_in_context('widgets')) {
		return $return;
	}
	$entity = $params['entity'];
	if (!elgg_instanceof($entity, 'user')) {
		return $return;
	}
	$to_remove = array('banned','location');
	foreach ($return as $index => $item) {
		$name = $item->getName();
		if (in_array($name, $to_remove)) {
			unset($return[$index]);
		}
	}	
	if ($entity->isBanned()) {
		$banned = elgg_echo('banned');
		$options = array(
			'name' => 'banned',
			'text' => "<span>$banned</span>",
			'href' => false,
			'priority' => 0,
		);
		$return = array(ElggMenuItem::factory($options));
	} else {
		$return = array();
		$url_params = array();
		$menu = array();

		if (isset($entity->location)) {
			$page_owner = elgg_get_page_owner_entity();
			if (elgg_instanceof($page_owner, 'group')) {
				$url_params['group_guid'] = $page_owner->guid;
			}
		
			$user_location = htmlspecialchars($entity->location, ENT_QUOTES, 'UTF-8', false);
			$locations = explode(",", $user_location);		
			
			foreach($locations as $location){
				$q = strtolower(trim($location));
				$url_params['q'] = $q;
				$url = elgg_http_add_url_query_elements(elgg_get_site_url()."member-locations/", $url_params);
				
				$menu[] = elgg_view('output/url', array('href' => $url, 'text' => $location, 'is_safe' => true));
			}	
			$menu = implode(", ",$menu);				
			$options = array(
				'name' => 'location',
				'text' => "<span>$menu</span>",
				'href' => false,
				'priority' => 150,
			);
			$return[] = ElggMenuItem::factory($options);
		}
	}
	return $return;
}

function members_extended_search($options = array()){

	$db_prefix = elgg_get_config('dbprefix');
	$query = sanitise_string($options['query']);
	$options['joins'] = array(
		"JOIN {$db_prefix}users_entity ue ON e.guid = ue.guid",
		"JOIN {$db_prefix}metadata md on e.guid = md.entity_guid",
		"JOIN {$db_prefix}metastrings msv ON n_table.value_id = msv.id",
	);

	$r_where = "";
	$group_guid = $options['group_guid'];
	if($group_guid){
		$group = get_entity($group_guid);
		if (elgg_instanceof($group, 'group')) {
			elgg_set_page_owner_guid($group_guid);
			
			$options['joins'][] = "JOIN {$db_prefix}entity_relationships r ON e.guid = r.guid_one";
			$r_where = "AND (r.relationship = 'member' AND r.guid_two = '$group_guid')";		
		}
	}

	// username and display name
	$fields = array('username', 'name');
	$where = search_get_where_sql('ue', $fields, $options, FALSE);

	// get the where clauses for the md names
	// can't use egef_metadata() because the n_table join comes too late.
	$clauses = _elgg_entities_get_metastrings_options('metadata', array(
		'metadata_names' => $options['metadata_names'],
	));

	$options['joins'] = array_merge($clauses['joins'], $options['joins']);
	// no fulltext index, can't disable fulltext search in this function.
	// $md_where .= " AND " . search_get_where_sql('msv', array('string'), $options, FALSE);
	$md_where = "(({$clauses['wheres'][0]}) AND msv.string LIKE '%$query%')";

	$options['wheres'] = array("(($where) OR ($md_where) $r_where)");

	// override subtype -- All users should be returned regardless of subtype.
	$options['subtype'] = ELGG_ENTITIES_ANY_VALUE;
	$options['count'] = true;
	$count = elgg_get_entities($options);

	// no need to continue if nothing here.
	if (!$count) {
		return array('entities' => array(), 'count' => $count);
	}

	$options['count'] = FALSE;
	$options['order_by'] = search_get_order_by_sql('e', 'ue', $options['sort'], $options['order']);

	$entities = elgg_get_entities($options);

	return array(
		'entities' => $entities,
		'count' => $count,
	);
}
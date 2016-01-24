<?php
/**
 * Elgg subgroups plugin
 *
 * @package ElggSubgroups
 * 
 * TODO:
 *       * ElggSubgroup class with getMetaContainerGUID() ?
 *       * Subgroup graphs
 * 
 */

elgg_register_event_handler('init', 'system', 'subgroups_init');

/**
 * Subgroups plugin initialization functions.
 */
function subgroups_init() {
	// register a library of helper functions
	elgg_register_library('elgg:subgroups', elgg_get_plugins_path() . 'subgroups/lib/subgroups.php');
	// override groups library
	elgg_register_library('elgg:groups', elgg_get_plugins_path() . 'subgroups/lib/groups.php');

	// Register actions
	$actions_path = elgg_get_plugins_path() . 'subgroups/actions/subgroups';
	elgg_register_action("subgroups/add", $actions_path."/add.php");
	elgg_register_action("subgroups/remove", $actions_path."/remove.php");

	// Register page handler
	elgg_register_page_handler('subgroups', 'subgroups_page_handler');
	
	// Register pagesetup event handler	
	elgg_register_event_handler('pagesetup', 'system', 'subgroups_setup_sidebar_menus');
	
	// Register unsetter container_guid handler
	elgg_register_event_handler('update', 'group', 'subgroups_unset_group_container');
	
	// Register an unrelate link to entity menu (max priority to run the last)
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'subgroups_menu_setup', 9999);
	
	// Extend group fields
	elgg_register_plugin_hook_handler('profile:fields', 'group', 'subgroups_add_container_field');

	// Access permissions
	elgg_register_plugin_hook_handler('access:collections:write', 'all', 'subgroups_read_acl_plugin_hook');

	// Extending views
	elgg_extend_view('groups/sidebar/members', 'groups/sidebar/subgroups', 300);
	//TODO elgg_extend_view('groups/forum_latest', 'subgroups/frontpage');

	// Extending CSS
	elgg_extend_view('css/elements/components', 'groups/css/elements/components');

	elgg_register_ajax_view('subgroups/groups_i_can_edit');

	// Add group tool
	add_group_tool_option('subgroups', elgg_echo('subgroups:in_frontpage'), false);
	elgg_extend_view('groups/tool_latest', 'subgroups/group_module');
}

/**
 * Configure the groups sidebar menu. Triggered on page setup
 *
 */
function subgroups_setup_sidebar_menus() {

	elgg_unregister_menu_item('page', 'groups:member');

	// Get the page owner entity
	$page_owner = elgg_get_page_owner_entity();

	if (elgg_get_context() == 'group_profile' || elgg_get_context() == 'groups') {
		if ($page_owner instanceof ElggGroup) {
			if (elgg_is_logged_in() && $page_owner->canEdit() || elgg_is_admin_logged_in()) {
				$url = elgg_get_site_url() . "subgroups/edit/{$page_owner->getGUID()}";
				elgg_register_menu_item('page', array(
					'name' => 'subgroups',
					'text' => elgg_echo('subgroups:add'),
					'href' => $url,
				));
			}
		}
	}
}

/**
 * Dispatches subgroups pages.
 * URLs take the form of
 *  
 *  Group view subgroups:      subgroups/owner/<group_guid>
 *  Group manage subgroups:    subgroups/manage/<group_guid>
 *
 * @param array $page
 * @return NULL
 */
function subgroups_page_handler($page){
	$pages_path = elgg_get_plugins_path() . "subgroups/pages";
	
	switch($page[0]) {
		case 'add':
		case 'edit':
			elgg_set_page_owner_guid($page[1]);
			include($pages_path."/subgroups/edit.php");
			break;
		case 'owner':
			elgg_set_page_owner_guid($page[1]);
			include($pages_path."/subgroups/owner.php");
			break;
		case 'new':
			$group = new ElggGroup((int)$page[1]);
		
			if (!$group->guid) {
				register_error(elgg_echo('error:default'));
				return false;
			}
		
			elgg_load_library('elgg:groups');
			$title = elgg_echo('subgroups:new:of', array($group->name));
			
			elgg_push_breadcrumb(elgg_echo('groups'), "groups/all");
			elgg_push_breadcrumb($group->name, $group->getURL());
			elgg_push_breadcrumb(elgg_echo('subgroups:new'));
			
			set_input('container_guid', $group->guid);
			
			$body = elgg_view_layout('content', array(
				'content' => elgg_view('groups/edit'),
				'title' => $title,
				'filter' => '',
			));
			echo elgg_view_page($title, $body);
			
			break;
		default:
			return false;
	}
	return true;
}

function subgroups_menu_setup($hook, $type, $return, $params){
	
	$group = elgg_get_page_owner_entity();
	$othergroup = $params['entity'];
	
	if($group instanceof ElggGroup && $group->canEdit() &&
					$othergroup instanceof ElggGroup &&
									elgg_in_context('subgroups')){
		
		// Delete all previous links
		$return = array();
		
		$url = elgg_http_add_url_query_elements('action/subgroups/remove', array(
			'group' => $group->guid,
			'othergroup' => $othergroup->guid,
		));

		$options = array(
			'name' => 'delete',
			'href' => $url,
			'text' => "<span class=\"elgg-icon elgg-icon-delete\"></span>",
			'confirm' => elgg_echo('deleteconfirm'),
			'text_encode' => false,
		);
		$return[] = ElggMenuItem::factory($options);
	}
	return $return;
}

/**
 * Unset container guid when a group is created. Triggered on group save.
 * Using SQL since event is triggered on save() function and we can't do
 * call the function again.
 *
 */
function subgroups_unset_group_container($event, $object_type, $entity) {
	global $CONFIG;
	if (!elgg_instanceof($entity->getContainerEntity(), 'group')) {
		$query = "UPDATE {$CONFIG->dbprefix}entities set"
			. " container_guid=0 where guid={$entity->guid}";
		return !!(update_data($query));
	}
	return true;
}

function subgroups_add_container_field($hook, $type, $return, $params) {
	$return['container_guid'] = 'hidden';
	return $return;
}

/**
 * Hook to listen to read access control requests and return parent groups.
 */
function subgroups_read_acl_plugin_hook($hook, $entity_type, $returnvalue, $params) {
	$page_owner = elgg_get_page_owner_entity();
	$user_guid = $params['user_id'];
	$user = get_entity($user_guid);
	if (!$user) {
		return $returnvalue;
	}

	// only insert group access for current group
	if ($page_owner instanceof ElggGroup) {
		$parent_group = $page_owner->getContainerEntity();
		while ($parent_group) {
			$returnvalue[$parent_group->group_acl] = elgg_echo('groups:group') . ': ' . $parent_group->name;
			$parent_group = $parent_group->getContainerEntity();
		}
	}

	return $returnvalue;
}

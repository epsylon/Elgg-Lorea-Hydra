<?php
/**
 * Elgg related groups plugin
 *
 * @package ElggRelatedGroups
 */

elgg_register_event_handler('init', 'system', 'relatedgroups_init');

/**
 * Related groups plugin initialization functions.
 */
function relatedgroups_init() {
	// register a library of helper functions
	elgg_register_library('elgg:relatedgroups', elgg_get_plugins_path() . 'relatedgroups/lib/relatedgroups.php');

	// Register actions
	$actions_path = elgg_get_plugins_path() . 'relatedgroups/actions/relatedgroups';
	elgg_register_action("relatedgroups/add", $actions_path."/add.php");
	elgg_register_action("relatedgroups/remove", $actions_path."/remove.php");

	// Register page handler
	elgg_register_page_handler('relatedgroups', 'relatedgroups_page_handler');
	
	// Register pagesetup event handler	
	elgg_register_event_handler('pagesetup', 'system', 'relatedgroups_setup_sidebar_menus');
	
	// Register an unrelate link to entity menu (max priority to run the last)
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'relatedgroups_related_menu_setup', 9999);

	// Extending views
	elgg_extend_view('groups/sidebar/members', 'groups/sidebar/relatedgroups');
	//TODO elgg_extend_view('groups/forum_latest', 'relatedgroups/frontpage');

	// Extending CSS
	elgg_extend_view('css/elements/components', 'groups/css/elements/components');

	// Add group tool
	add_group_tool_option('relatedgroups', elgg_echo('relatedgroups:in_frontpage'), false);
	elgg_extend_view('groups/tool_latest', 'relatedgroups/group_module');
}

/**
 * Configure the groups sidebar menu. Triggered on page setup
 *
 */
function relatedgroups_setup_sidebar_menus() {

	// Get the page owner entity
	$page_owner = elgg_get_page_owner_entity();

	if (elgg_get_context() == 'groups' || elgg_get_context() == 'group_profile') {
		if ($page_owner instanceof ElggGroup) {
			if (elgg_is_logged_in() && $page_owner->canEdit() || elgg_is_admin_logged_in()) {
				$url = elgg_get_site_url() . "relatedgroups/edit/{$page_owner->getGUID()}";
				elgg_register_menu_item('page', array(
					'name' => 'relatedgroups',
					'text' => elgg_echo('relatedgroups:add'),
					'href' => $url,
				));
			}
		}
	}
}

/**
 * Dispatches related groups pages.
 * URLs take the form of
 *  
 *  Group view related groups:      relatedgroups/owner/<group_guid>
 *  Group manage related groups:    relatedgroups/manage/<group_guid>
 *
 * @param array $page
 * @return NULL
 */
function relatedgroups_page_handler($page){
	$pages_path = elgg_get_plugins_path() . "relatedgroups/pages";
	
	switch($page[0]) {
		case 'add':
		case 'edit':
			elgg_set_page_owner_guid($page[1]);
			include($pages_path."/relatedgroups/edit.php");
			break;
		case 'owner':
			elgg_set_page_owner_guid($page[1]);
			include($pages_path."/relatedgroups/owner.php");
			break;
	}
}

function relatedgroups_related_menu_setup($hook, $type, $return, $params){
	
	$group = elgg_get_page_owner_entity();
	$othergroup = $params['entity'];
	
	if($group instanceof ElggGroup && $group->canEdit() &&
					$othergroup instanceof ElggGroup &&
									elgg_in_context('relatedgroups')){
		
		// Delete all previous links
		$return = array();
		
		$url = elgg_http_add_url_query_elements('action/relatedgroups/remove', array(
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

?>

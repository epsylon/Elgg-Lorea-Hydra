<?php
/**
 * whoviewedme plugin intialization
 */

elgg_register_event_handler('init', 'system', 'whoviewedme_init');

/**
 * Initialize page handler and site menu item
 */
function whoviewedme_init() {
	elgg_register_page_handler('whoviewedme', 'whoviewedme_page_handler');
        
        elgg_extend_view("profile/wrapper", "whoviewedme/record");
        elgg_extend_view("resume/page/elements/intro", "whoviewedme/record");
        elgg_register_plugin_hook_handler('register', 'menu:entity', 'wvm_menu_setup');

        if(elgg_is_logged_in()){
            $item = new ElggMenuItem('whoviewedme', elgg_echo('whoviewedme'), 'whoviewedme');
            elgg_register_menu_item('site', $item);
        }
        
	// register actions
	$action_path = elgg_get_plugins_path() . 'whoviewedme/actions';
	elgg_register_action('whoviewedme/delete', "$action_path/delete.php");        
}

/**
 * whoviewedme page handler
 *
 * @param array $page url segments
 * @return bool
 */
function whoviewedme_page_handler($page) {
    
    gatekeeper();
	$base = elgg_get_plugins_path() . 'whoviewedme/pages/whoviewedme';

	require_once "$base/index.php";
	
	return true;
}


function wvm_menu_setup($hook, $type, $return, $params) {
	
	if (elgg_in_context('widgets')) {
		return $return;
	}
        
	if (!elgg_in_context('whoviewedme')) {
		return $return;
	}        
	
	$entity = $params['entity'];

			$options = array(
				'name' => 'delete_view',
				'text' => elgg_echo('deleterecord'),
				'title' => 'Delete the record of this view',
				'href' => "action/whoviewedme/delete?guid={$entity->getGUID()}",
				'confirm' => elgg_echo('deleteconfirm'),
			);
		
			$return[] = ElggMenuItem::factory($options);			

	return $return;
	
}

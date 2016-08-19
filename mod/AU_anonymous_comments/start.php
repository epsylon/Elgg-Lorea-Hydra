<?php

namespace AU\AnonymousComments;

const PLUGIN_ID = 'AU_anonymous_comments';
const PLUGIN_VERSION = 20150918;

require_once __DIR__ . '/lib/hooks.php';
require_once __DIR__ . '/lib/events.php';
require_once __DIR__ . '/lib/functions.php';

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init');

function init() {
	
	// Extend system CSS with our own styles
	elgg_extend_view('css/elgg','anonymous_comments/css');
	
	// extend the form view to present a comment form to a logged out user
	elgg_extend_view('page/elements/comments', 'anonymous_comments/pre_comments', 0);
	elgg_extend_view('page/elements/comments', 'anonymous_comments/post_comments');
	
	//add override for anonymous user profile
	elgg_extend_view('profile/details', 'profile/anon_user_details', 501);
	
	elgg_register_plugin_hook_handler('register', 'menu:user_hover', __NAMESPACE__ . '\\hover_menu_hook', 1000);
	elgg_register_plugin_hook_handler('view_vars', 'icon/user/default', __NAMESPACE__ . '\\user_icon_vars');
	elgg_register_plugin_hook_handler('email', 'system', __NAMESPACE__ . '\\anon_email_hook', 0);
	elgg_register_plugin_hook_handler('register', 'menu:entity', __NAMESPACE__ . '\\comment_entity_menu', 1000);
	
	// override permissions for the specific context
	elgg_register_plugin_hook_handler('permissions_check', 'all', __NAMESPACE__ . '\\permissions_check');	
	
	// register plugin hook to monitor comment counts - return only the count of approved comments
	elgg_register_plugin_hook_handler('comments:count', 'all', __NAMESPACE__ . '\\comment_count_hook', 1000); 
	
	 //register action to approve/delete comments
	elgg_register_action("comments/moderate", __DIR__ . "/actions/comments/moderate.php"); 
	
	//register action to save our anonymous comments
	elgg_register_action("comments/anon_add", __DIR__ . "/actions/comments/anon_add.php", 'public');
	
	elgg_register_event_handler('pagesetup', 'system', __NAMESPACE__ . '\\pagesetup');
	
	elgg_register_page_handler('auac', __NAMESPACE__ . '\\auac_pagehandler');
}


function auac_pagehandler($page) {
	switch ($page[0]) {
		case 'approve':
			echo elgg_view('resources/anonymous_comments/approve', array(
				'page' => $page
			));
			break;
		
		case 'delete':
			echo elgg_view('resources/anonymous_comments/delete', array(
				'page' => $page
			));
			break;
	}
	
	return false;
}

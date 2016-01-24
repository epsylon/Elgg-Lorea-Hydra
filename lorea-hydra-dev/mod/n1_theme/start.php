<?php

elgg_register_event_handler('init', 'system', 'n1_theme_init');

function n1_theme_init() {
	elgg_unregister_menu_item('topbar','elgg_logo');
	$item =  new ElggMenuItem('site_logo', elgg_get_site_entity()->name, elgg_get_site_url());
	elgg_register_menu_item('topbar', $item);
	elgg_register_plugin_hook_handler('register', 'menu:topbar', 'n1_theme_topbar_menu');
	
	elgg_register_simplecache_view('n1_theme/landing');
	elgg_register_css('n1:landing_page', elgg_get_simplecache_url('css', 'n1_theme/landing'));
	
	elgg_extend_view('css/elgg', 'n1_theme/css');
	elgg_extend_view('js/elgg', 'n1_theme/js');
	elgg_extend_view('page/elements/title', 'n1_theme/header', 0);
	// custom index widgets
	foreach(array("custom_index", "edit_widgets", "index_2rbhh", "index_2rhhb", 
		      "index",  "index_2rbms", "index_2rmsb",
		      "index_1rsss", "index_2rbsm", "index_2rsmb") as $layout) {
		elgg_extend_view('page/layouts/'.$layout, 'n1_theme/landing', 0);
	}
	
	if (elgg_is_active_plugin('pages')) {
		// pages icon url override
		elgg_register_plugin_hook_handler('entity:icon:url', 'object', 'n1_theme_pages_icon_url_override');
	}
}

function n1_theme_topbar_menu($hook, $type, $returnvalue, $params){
	$user = elgg_get_logged_in_user_entity();

	if (elgg_is_active_plugin('groups')) {

		$ia = elgg_set_ignore_access(TRUE);
		$num_invitations = elgg_get_entities_from_relationship(array(
			'relationship' => 'invited',
			'relationship_guid' => $user->guid,
			'inverse_relationship' => TRUE,
			'limit' => 0,
			'count' => TRUE,
		));
		elgg_set_ignore_access($ia);

		if ($num_invitations) {
			$num_invitations = elgg_view('output/url', array(
				'text' => "<span class=\"messages-new\">$num_invitations</span>",
				'href' => "groups/invitations/$user->username",
			));
		}

		$returnvalue[] = ElggMenuItem::factory(array(
			'name' => 'groups',
			'href' => "groups/member/$user->username",
			'text' => elgg_view_icon('groups') . $num_invitations,
			'title' => elgg_echo('groups'),
			'priority' => 500,
		));
	}

	if (elgg_is_admin_logged_in()) {
		$returnvalue[] = ElggMenuItem::factory(array(
			'name' => 'administration',
			'href' => "admin",
			'text' => elgg_view_icon('settings'),
			'title' => elgg_echo('admin'),
			'priority' => 100,
			'section' => 'alt',
		));
	}
	
	if (elgg_is_active_plugin('dashboard')) {
		$returnvalue[] = ElggMenuItem::factory(array(
			'name' => 'dashboard',
			'href' => "dashboard",
			'text' => elgg_view_icon('home'),
			'title' => elgg_echo('dashboard'),
			'priority' => 200,
			'section' => 'alt',
		));
	}

	$returnvalue[] = ElggMenuItem::factory(array(
		'name' => 'usersettings',
		'href' => "settings/user/{$user->username}",
		'text' => elgg_view_icon('settings-alt'),
		'title' => elgg_echo('settings'),
		'priority' => 500,
		'section' => 'alt',
	));

	$returnvalue[] = ElggMenuItem::factory(array(
		'name' => 'logout',
		'href' => "action/logout",
		'text' => elgg_echo('logout'),
		'title' => elgg_echo('logout'),
		'is_action' => TRUE,
		'priority' => 1000,
		'section' => 'alt',
	));
	return $returnvalue;
}

/**
 * Override the default entity icon for pages and pads
 *
 * @return string Relative URL
 */
function n1_theme_pages_icon_url_override($hook, $type, $returnvalue, $params) {
	$entity = $params['entity'];
	if (elgg_instanceof($entity, 'object', 'page_top') ||
		elgg_instanceof($entity, 'object', 'page')) {
		$icon = 'pages';
	} elseif (elgg_instanceof($entity, 'object', 'etherpad') ||
			  elgg_instanceof($entity, 'object', 'subpad')) {
		$icon = 'pad';
	} else {
		return $returnvalue;
	}
	switch ($params['size']) {
		case 'topbar':
		case 'tiny':
			return "mod/n1_theme/_graphics/icons/{$icon}_tiny.gif";
			break;
		case 'small':
			return "mod/n1_theme/_graphics/icons/{$icon}_small.gif";
			break;
		default:
			return "mod/n1_theme/_graphics/icons/{$icon}_lrg.gif";
			break;
	}
}

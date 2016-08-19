<?php

namespace AU\LikedContent;

const PLUGIN_ID = 'liked_content';

require_once __DIR__ . '/lib/hooks.php';

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init');

function init() {

	elgg_register_plugin_hook_handler('register', 'menu:owner_block', __NAMESPACE__ . '\\owner_block');
	elgg_register_plugin_hook_handler('register', 'menu:entity', __NAMESPACE__ . '\\entity_menu', 1000);
	elgg_register_page_handler('liked_content', __NAMESPACE__ . '\\liked_content_page_handler');

	if (elgg_is_active_plugin('au_widgets')) {
		elgg_register_widget_type(
				'liked_content', elgg_echo('liked_content:widget:your_likes:title'), elgg_echo('liked_content:widget:your_likes:description'), array(
			'profile',
			'dashboard',
			'groups',
			'index'
				), TRUE
		);
	}
	
//	elgg_register_menu_item('site', array(
//		'name' => 'liked_content',
//		'text' => elgg_echo('liked_content:liked_content'),
//		'href' => 'liked_content/all'
//	));

	add_group_tool_option('liked_content', elgg_echo('liked_content:group:enable'), true);
}

function liked_content_page_handler($page) {

	switch ($page[0]) {
		case 'group':
			$entity = get_entity($page[1]);
			if (!elgg_instanceof($entity, 'group') || $entity->liked_content_enable == 'no') {
				return false;
			}
			elgg_set_page_owner_guid($entity->guid);

			$content = elgg_view('resources/liked_content/group', array(
				'group' => $entity
			));

			if ($content) {
				echo $content;
				return true;
			}

			break;
		case 'user':
			$entity = get_user_by_username($page[1]);
			if (!elgg_instanceof($entity, 'user')) {
				return false;
			}
			elgg_set_page_owner_guid($entity->guid);

			$content = elgg_view('resources/liked_content/user', array(
				'user' => $entity
			));

			if ($content) {
				echo $content;
				return true;
			}

			break;
		// provide page showing all visible likes
		case 'all':

			$content = elgg_view('resources/liked_content/all');

			if ($content) {
				echo $content;
				return true;
			}

			break;
	}

	return false;
}

/**
 * set default settings for widget based on old metadata values
 * see au_widgets for details
 * 
 * @param type $widget
 * @return type
 */
function liked_content_set_defaults($widget) {
	if ($widget->defaults_set == 1) {
		return;
	}

	$widget->eligo_sortby = 'mostliked';
	$widget->eligo_sortby_dir = 'desc';

	// set defaults depending on what kind of widget it is
	$container = $widget->getContainerEntity();

	if (!elgg_instanceof($container, 'group')) {
		// profile/dashboard/index
		$widget->eligo_owners = 'all';
	} else {
		// groups
		$widget->eligo_owners = 'thisgroup';
	}

	if (elgg_instanceof($container, 'user')) {
		$widget->my_likes = 0;
	}

	$widget->defaults_set = 1;
}

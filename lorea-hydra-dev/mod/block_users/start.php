<?php

namespace MFP\BlockUsers;

/**
 * Block users
 *
 * Blocked users are stored as private settings on the blocking user entity.
 * When a user accesses a page that is owned by someone who blocked him, the list of blocked users
 * is pulled from the 'blocked' relationship and checked. If the user is blocked, it redirects to a
 * message page. The redirect is necessary because we don't want to fire the pagesetup events on
 * the blocked page again.
 */

const PLUGIN_ID = 'block_users';

require_once __DIR__ . '/lib/functions.php';

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init');

/**
 * Init
 */
function init() {
	
	elgg_register_page_handler('block_users', __NAMESPACE__ . '\\page_handler');

	// settings menu
	$menu_item = \ElggMenuItem::factory(array(
		'name' => 'blocked_users',
		'text' => elgg_echo('block_users:manage_blocked_users'),
		'href' => 'block_users/blocked_users',
		'context' => 'settings'
	));
	elgg_register_menu_item('page', $menu_item);

	// user hover menu
	elgg_register_plugin_hook_handler('register', 'menu:user_hover', __NAMESPACE__ . '\\setup_hover_menu');
	elgg_register_plugin_hook_handler('action', 'messages/send', __NAMESPACE__ . '\\messages_send_action');

	// actions
	elgg_register_action('block_users/block', __DIR__ . "/actions/block_users/block.php");
	elgg_register_action('block_users/unblock', __DIR__ . "/actions/block_users/unblock.php");

	// check page owners
	elgg_register_event_handler('pagesetup', 'system', __NAMESPACE__ . '\\check_page_owner', 1000);

	// check actions
	elgg_register_plugin_hook_handler('action', 'all', __NAMESPACE__ . '\\check_action');
	
	// register default actions
	elgg_register_plugin_hook_handler('block_users', 'get_actions', __NAMESPACE__ . '\\default_actions');
}

/**
 * Serve pages. URLs in the form:
 *
 * pg/block_users/blocked_users/<username> - Users blocked by <username>. If not set, defaults to logged in.
 * pg/block_users/blocked - The page to display when a user is blocked. 
 *
 * @param array $page
 * @return bool Depending on success
 */
function page_handler($page) {
	gatekeeper();

	if (!isset($page[0])) {
		$page[0] = 'blocked_users';
	}

	switch($page[0]) {
		case 'blocked_user_content':
			$site = elgg_get_site_entity();
			elgg_set_page_owner_guid($site->guid);
			include dirname(__FILE__) . '/pages/block_users/blocked_user_content.php';
			break;

		case 'blocked_content':
			$site = elgg_get_site_entity();
			elgg_set_page_owner_guid($site->guid);
			include dirname(__FILE__) . '/pages/block_users/blocked_content.php';
			break;
			
		default:
		case 'blocked_users':
			$logged_in_user = elgg_get_logged_in_user_entity();

			if (!isset($page[1])) {
				$page[1] = $logged_in_user->username;
			}

			set_input('blocking_username', $page[1]);

			// only admins can see another user's block list
			if ($page[1] != $logged_in_user->username) {
				admin_gatekeeper();
			}

			include dirname(__FILE__) . '/pages/block_users/blocked_users.php';
	}

	return true;
}

/**
 * Disallows blocked users from performing actions on the users who blocked them.
 * Also disallows blocking users from performing the same actions so they can't troll.
 *
 * @param type $hook
 * @param type $type
 * @param type $value
 * @param type $params
 */
function check_action($hook, $type, $value, $params) {
	$actions = elgg_trigger_plugin_hook('block_users', 'get_actions', null, array());

	if (isset($actions[$type])) {
		$target_user = get_entity(get_input($actions[$type]));
		$viewing_user = elgg_get_logged_in_user_entity();
		if ($target_user instanceof \ElggUser) {
			// viewing user is blocked by target_user
			if (is_blocked($viewing_user, $target_user)) {
				// @todo should this emit a error then forward to referrer?
				forward('block_users/blocked_content');
			}
			
			// viewing user has blocked target user
			if (is_blocked($target_user, $viewing_user)) {
				// redirect to the REFERRING PAGE if unblocked.
				if (isset($_SERVER['HTTP_REFERER'])) {
					$next = '&next=' . urlencode($_SERVER['HTTP_REFERER']);
				} else {
					$next = '';
				}

				// @todo should this emit a error then forward to referrer?
				forward('block_users/blocked_user_content?blocked_username=' . $target_user->username . $next);
			}
		}
	}
}

/**
 * Returns a set of default blocked actions for the core plugins
 *
 * @param type $hook
 * @param type $type
 * @param type $value
 * @param type $params
 */
function default_actions($hook, $type, $value, $params) {
	if (!is_array($value)) {
		$value = array();
	}
	$value['messageboard/add'] = 'pageOwner';
	$value['messages/send'] = 'send_to';
	$value['friends/add'] = 'friend';
	
	return $value;
}

/**
 * Intercept pages and check the page owner.
 *
 * @param type $event
 * @param type $type
 * @param type $return
 * @return type
 */
function check_page_owner($event, $type, $return) {
	$page_owner = elgg_get_page_owner_entity();
	if (!$page_owner) {
		return null;
	}
	
	$viewing_user = elgg_get_logged_in_user_entity();

	if (!$viewing_user) {
		return null;
	}

	// viewing user is blocked by content owner.
	if (is_blocked($viewing_user, $page_owner)) {
		forward('block_users/blocked_content');
	}

	// viewing user has blocked the content owner
	if (is_blocked($page_owner, $viewing_user)) {

		// redirect to THIS PAGE if unblocked.
		$url = current_page_url();
		if ($url) {
			$next = '&next=' . urlencode($url);
		} else {
			$next = '';
		}
		forward('block_users/blocked_user_content?blocked_username=' . $page_owner->username . $next);
	}
}

/**
 * Add a menu item to block users to the user hover menu.
 *
 * @param type $hook
 * @param type $type
 * @param type $return
 * @param type $params
 * @return \ElggMenuItem
 */
function setup_hover_menu($hook, $type, $return, $params) {
	$user = $params['entity'];

	if (!elgg_is_logged_in() || elgg_get_logged_in_user_guid() == $user->guid) {
		return $return;
	}

	$logged_in_user = elgg_get_logged_in_user_entity();
	if (elgg_in_context('profile') && !elgg_in_context('widgets')) {
		$class = 'elgg-button elgg-button-action';
	}

	if (is_blocked($user, $logged_in_user)) {
		$link = elgg_view('output/url', array(
			'href' => 'action/block_users/unblock?blocked_user_guid=' . $user->getGUID(),
			'text' => elgg_echo('block_users:unblock_user'),
			'confirm' => true,
			'class' => $class
		));
	} else {
		$link = elgg_view('output/url', array(
			'href' => 'action/block_users/block?blocked_user_guid=' . $user->getGUID(),
			'text' => elgg_echo('block_users:block_user'),
			'confirm' => true,
			'class' => $class
		));
	}

	$item = new \ElggMenuItem('block', $link, false);
	$item->setSection('action');
	$return[] = $item;

	return $return;
}


function messages_send_action($hook, $type, $return, $params) {
	$user = get_user_by_username(get_input('recipient_username'));
	if (is_blocked(elgg_get_logged_in_user_entity(), $user)) {
		elgg_make_sticky_form('messages');
		register_error(elgg_echo('block_users:blocked_content_notice'));
		return false;
	}
}
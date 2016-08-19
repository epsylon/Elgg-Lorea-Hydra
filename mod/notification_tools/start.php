<?php
/**
 * Notification tools
 */

elgg_register_event_handler('init', 'system', 'notification_tools_init');

/**
 * Initialize the plugin
 */
function notification_tools_init () {
	$plugin_dir = elgg_get_plugins_path() . 'notification_tools/';

	elgg_register_action('notification_tools/enable_personal',  "{$plugin_dir}actions/notification_tools/enable_personal.php", 'admin');
	elgg_register_action('notification_tools/enable_collection',  "{$plugin_dir}actions/notification_tools/enable_collection.php", 'admin');
	elgg_register_action('notification_tools/enable_group',  "{$plugin_dir}actions/notification_tools/enable_group.php", 'admin');

	// This overrides the default save action
	elgg_register_action('notification_tools/settings/save',  "{$plugin_dir}actions/notification_tools/settings/save.php", 'admin');

	elgg_register_admin_menu_item('administer', 'notification_tools', 'administer_utilities');

	elgg_register_event_handler('join', 'group', 'notification_tools_enable_for_new_group_member');
	elgg_register_event_handler('create', 'user', 'notification_tools_enable_for_new_user');
}

/**
 * Enable personal and friend notifications for new users
 *
 * We do this using 'create, user' event instead of 'register, user' plugin
 * hook so that it affects also users created by an admin.
 *
 * @param  string   $event 'create'
 * @param  string   $type  'user'
 * @param  ElggUser $user
 * @return boolean
 */
function notification_tools_enable_for_new_user ($event, $type, $user) {
	$personal = elgg_get_plugin_setting('default_personal_methods', 'notification_tools');

	// Set methods for personal notifications
	if ($personal) {
		$personal_methods = explode(',', $personal);

		foreach ($personal_methods as $method) {
			$prefix = "notification:method:{$method}";
			$user->$prefix = true;
		}
	}

	$collection = elgg_get_plugin_setting('default_collection_methods', 'notification_tools');

	// Set methods for notifications about friends' activity
	if ($collection) {
		$collection_methods = explode(',', $collection);

		// Here we just mark the default methods. The core notification plugin
		// will take care of creating the actual 'notify<method>' relationships
		// between user and each friends.
		foreach ($collection_methods as $method) {
			$setting_name = "collections_notifications_preferences_{$method}";
			// The -1 seems like a weird value but that's what the core
			// is using for whatever reason.
			$user->$setting_name = '-1';
		}
	}

	$user->save();

	return true;
}

/**
 * Enable default notification methods when user joins a group
 *
 * @param string $event  'join'
 * @param string $type   'group'
 * @param array  $params Array containing ElggUser and ElggGroup
 */
function notification_tools_enable_for_new_group_member($event, $type, $params) {
	$group = $params['group'];
	$user = $params['user'];

	$methods = elgg_get_plugin_setting('default_group_methods', 'notification_tools');

	if (empty($methods)) {
		return true;
	}

	if (!$group instanceof ElggGroup) {
		return true;
	}

	if (!$user instanceof ElggUser) {
		return true;
	}

	$methods = explode(',', $methods);

	foreach ($methods as $method) {
		add_entity_relationship($user->guid, "notify{$method}", $group->guid);
	}

	return true;
}

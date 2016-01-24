<?php

elgg_register_event_handler('init', 'system', 'personal_actitivy_init');

/**
 * Initalize the plugin
 */
function personal_actitivy_init() {
	elgg_register_plugin_hook_handler('register', 'menu:user_hover', 'personal_activity_user_hover_menu_setup');
	elgg_register_plugin_hook_handler('route', 'activity', 'personal_activity_page_handler');
}

/**
 * Add personal activity link to user_hover menu
 * 
 * @param string         $hook   Hook name
 * @param string         $type   Hook type
 * @param ElggMenuItem[] $return Array of ElggMenuItem objects
 * @param array          $params
 * @return ElggMenuItem[] $return Array of ElggMenuItem objects
 */
function personal_activity_user_hover_menu_setup($hook, $type, $return, $params) {
	if (!elgg_is_logged_in()) {
		return $return;
	}

	$user = $params['entity'];

	$return[] = ElggMenuItem::factory(array(
		'name' => 'personal_activity',
		'text' => elgg_echo('personal_activity'),
		'href' => "activity/owner/{$user->username}",
	));

	return $return;
}

/**
 * Handle requests to activity/owner/<username>
 *
 * @param string $hook   Hook name
 * @param string $type   Hook type
 * @param array  $return Array of url segments
 * @param array  $params
 * @return boolean False if the request was handled
 */
function personal_activity_page_handler($hook, $type, $return, $params) {
	$segments = $return['segments'];

	if (isset($segments[0]) && $segments[0] == 'owner') {
		$user = get_user_by_username($segments[1]);

		// Use default page handler if no user or user is looking at own activity
		if (!$user || $user->guid == elgg_get_logged_in_user_guid()) {
			return $return;
		}

		$params['title'] = elgg_echo('personal_activity:owner', array($user->name));
		$params['filter_context'] = '';
		$params['content'] = elgg_list_river(array(
			'subject_guids' => $user->guid,
		));

		if (!$params['content']) {
			$params['content'] = elgg_echo('river:none');
		}

		$body = elgg_view_layout('content', $params);
		echo elgg_view_page($params['title'], $body);

		return false;
	}

	return $return;
}
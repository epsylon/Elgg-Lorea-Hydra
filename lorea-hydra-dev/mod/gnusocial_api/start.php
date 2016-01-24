<?php
/**
 * Elgg GNUSocial Service
 * This service plugin allows users to authenticate their Elgg account with GNUSocial.
 *
 * @package GNUSocialAPI
 */

elgg_register_event_handler('init', 'system', 'gnusocial_api_init');

function gnusocial_api_init() {

	// require libraries
	$base = elgg_get_plugins_path() . 'gnusocial_api';
	elgg_register_class('GNUSocialOAuth', "$base/vendors/gnusocialoauth/gnusocialOAuth.php");
	elgg_register_library('gnusocial_api', "$base/lib/gnusocial_api.php");
	elgg_load_library('gnusocial_api');

	// extend site views
	//elgg_extend_view('metatags', 'gnusocial_api/metatags');
	elgg_extend_view('css/elgg', 'gnusocial_api/css');
	elgg_extend_view('css/admin', 'gnusocial_api/css');
	elgg_extend_view('js/elgg', 'gnusocial_api/js');

	// sign on with gnusocial
	if (gnusocial_api_allow_sign_on_with_gnusocial()) {
		elgg_extend_view('login/extend', 'gnusocial_api/login');
	}

	// register page handler
	elgg_register_page_handler('gnusocial_api', 'gnusocial_api_pagehandler');
	// backward compatibility
	elgg_register_page_handler('gnusocialservice', 'gnusocial_api_pagehandler_deprecated');

	// register Walled Garden public pages
	elgg_register_plugin_hook_handler('public_pages', 'walled_garden', 'gnusocial_api_public_pages');

	// push wire post messages to gnusocial
	if (elgg_get_plugin_setting('wire_posts', 'gnusocial_api') == 'yes') {
		elgg_register_plugin_hook_handler('status', 'user', 'gnusocial_api_tweet');
	}

	$actions = dirname(__FILE__) . '/actions/gnusocial_api';
	elgg_register_action('gnusocial_api/interstitial_settings', "$actions/interstitial_settings.php", 'logged_in');
}

/**
 * Handles old pg/gnusocialservice/ handler
 *
 * @param array $page
 * @return bool
 */
function gnusocial_api_pagehandler_deprecated($page) {
	$url = elgg_get_site_url() . 'pg/gnusocial_api/authorize';
	$msg = elgg_echo('gnusocial_api:deprecated_callback_url', array($url));
	register_error($msg);

	return gnusocial_api_pagehandler($page);
}


/**
 * Serves pages for gnusocial.
 *
 * @param array $page
 * @return bool
 */
function gnusocial_api_pagehandler($page) {
	if (!isset($page[0])) {
		return false;
	}

	switch ($page[0]) {
		case 'authorize':
			gnusocial_api_authorize();
			break;
		case 'revoke':
			gnusocial_api_revoke();
			break;
		case 'forward':
			gnusocial_api_forward();
			break;
		case 'login':
			gnusocial_api_login();
			break;
		case 'interstitial':
			elgg_gatekeeper();
			// only let gnusocial users do this.
			$guid = elgg_get_logged_in_user_guid();
			$gnusocial_name = elgg_get_plugin_user_setting('gnusocial_name', $guid, 'gnusocial_api');
			if (!$gnusocial_name) {
				register_error(elgg_echo('gnusocial_api:invalid_page'));
				forward();
			}
			$pages = dirname(__FILE__) . '/pages/gnusocial_api';
			include "$pages/interstitial.php";
			break;
		default:
			return false;
	}
	return true;
}

/**
 * Push a status update to gnusocial.
 *
 * @param string $hook
 * @param string $type
 * @param null   $returnvalue
 * @param array  $params
 */
function gnusocial_api_tweet($hook, $type, $returnvalue, $params) {

	if (!$params['user'] instanceof ElggUser) {
		return;
	}

	// @todo - allow admin to select origins?

	// check user settings
	$user_guid = $params['user']->getGUID();
	$access_key = elgg_get_plugin_user_setting('access_key', $user_guid, 'gnusocial_api');
	$access_secret = elgg_get_plugin_user_setting('access_secret', $user_guid, 'gnusocial_api');
	if (!($access_key && $access_secret)) {
		return;
	}

	$api = gnusocial_api_get_api_object($access_key, $access_secret);
	if (!$api) {
		return;
	}

	$api->post('statuses/update', array('status' => $params['message']));
}

/**
 * Get tweets for a user.
 *
 * @param int   $user_guid The Elgg user GUID
 * @param array $options
 * @return array
 */
function gnusocial_api_fetch_tweets($user_guid, $options = array()) {

	// check user settings
	$access_key = elgg_get_plugin_user_setting('access_key', $user_guid, 'gnusocial_api');
	$access_secret = elgg_get_plugin_user_setting('access_secret', $user_guid, 'gnusocial_api');
	if (!($access_key && $access_secret)) {
		return FALSE;
	}

	$api = gnusocial_api_get_api_object($access_key, $access_secret);
	if (!$api) {
		return FALSE;
	}

	return $api->get('statuses/user_timeline', $options);
}

/**
 * Register as public pages for walled garden.
 *
 * @param string $hook
 * @param string $type
 * @param array  $return_value
 * @param array  $params
 * @return array
 */
function gnusocial_api_public_pages($hook, $type, $return_value, $params) {
	$return_value[] = 'gnusocial_api/forward';
	$return_value[] = 'gnusocial_api/login';

	return $return_value;
}

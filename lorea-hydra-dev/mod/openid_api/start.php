<?php
/**
 * OpenID API Library
 */

elgg_register_event_handler('init', 'system', 'openid_api_init');

function openid_api_init() {
	$dir = elgg_get_plugins_path() . 'openid_api/lib';
	elgg_register_library('openid_consumer', "$dir/openid_consumer.php");
	elgg_register_library('openid_server', "$dir/openid_server.php");

	elgg_register_plugin_hook_handler('cron', 'daily', 'openid_api_cleanup');
}

/**
 * Cleanup data related to the OpenID Elgg store for associations
 */
function openid_api_cleanup() {
	$store = new OpenID_ElggStore();
	$store->cleanup();
}

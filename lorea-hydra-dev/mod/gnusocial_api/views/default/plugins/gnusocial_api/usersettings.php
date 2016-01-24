<?php
/**
 * User settings for GNUSocial API
 */

$user = elgg_get_logged_in_user_entity();
$user_guid = $user->getGUID();
$gnusocial_name = elgg_get_plugin_user_setting('gnusocial_name', $user_guid, 'gnusocial_api');
$access_key = elgg_get_plugin_user_setting('access_key', $user_guid, 'gnusocial_api');
$access_secret = elgg_get_plugin_user_setting('access_secret', $user_guid, 'gnusocial_api');

$site_key = elgg_get_plugin_setting('consumer_key', 'gnusocial_api');
$site_secret = elgg_get_plugin_setting('consumer_secret', 'gnusocial_api');

if (!($site_key && $site_secret)) {
	echo '<div>' . elgg_echo('gnusocial_api:usersettings:site_not_configured') . '</div>';
	return true;
}

$site_name = elgg_get_site_entity()->name;
echo '<div>' . elgg_echo('gnusocial_api:usersettings:description', array($site_name)) . '</div>';

if (!$access_key || !$access_secret) {
	// send user off to validate account
	$request_link = gnusocial_api_get_authorize_url(null, false);
	echo '<div>' . elgg_echo('gnusocial_api:usersettings:request', array($request_link, $site_name)) . '</div>';
} else {
	// if this user logged in through gnusocial and never set up an email address, don't
	// let them disassociate their account.
	if ($user->email) {
		$url = elgg_get_site_url() . "gnusocial_api/revoke";
		echo '<div>' . elgg_echo('gnusocial_api:usersettings:authorized', array($site_name, $gnusocial_name)) . '</div>';
		echo '<div>' . sprintf(elgg_echo('gnusocial_api:usersettings:revoke'), $url) . '</div>';
	} else {
		echo elgg_echo('gnusocial_api:usersettings:cannot_revoke', array(elgg_normalize_url('gnusocial_api/interstitial')));
	}
}

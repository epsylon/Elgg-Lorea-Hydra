<?php
/**
 * Common library of functions used by GNUSocial Services.
 *
 * @package gnusocial_api
 */

/**
 * Get the API wrapper object
 * 
 * @param string $oauth_token        User's OAuth token
 * @param string $oauth_token_secret User's OAuth secret
 * @return GNUSocialOAuth|null
 */
function gnusocial_api_get_api_object($oauth_token = null, $oauth_token_secret = null) {
	$consumer_key = elgg_get_plugin_setting('consumer_key', 'gnusocial_api');
	$consumer_secret = elgg_get_plugin_setting('consumer_secret', 'gnusocial_api');
	if (!($consumer_key && $consumer_secret)) {
		return null;
	}

	$api = new GNUSocialOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);
	if ($api) {
		$api->host = "https://quitter.se/api/";
	}
	return $api;
}

/**
 * Tests if the system admin has enabled Sign-On-With-GNUSocial
 *
 * @param void
 * @return bool
 */
function gnusocial_api_allow_sign_on_with_gnusocial() {
	$consumer_key = elgg_get_plugin_setting('consumer_key', 'gnusocial_api');
	if (!$consumer_key) {
		return false;
	}

	$consumer_secret = elgg_get_plugin_setting('consumer_secret', 'gnusocial_api');
	if (!$consumer_secret) {
		return false;
	}

	return elgg_get_plugin_setting('sign_on', 'gnusocial_api') == 'yes';
}

/**
 * Forwards the user to gnusocial to authenticate
 *
 * This includes the login URL as the callback
 */
function gnusocial_api_forward() {
	// sanity check
	if (!gnusocial_api_allow_sign_on_with_gnusocial()) {
		forward();
	}

	$callback = elgg_normalize_url("gnusocial_api/login");
	$request_link = gnusocial_api_get_authorize_url($callback);

	// capture metadata about login to persist through redirects
	$login_metadata = array(
		'persistent' => (bool) get_input("persistent"),
	);
	// capture referrer if in site, but not the gnusocial_api

	$session = elgg_get_session();
	$server = _elgg_services()->request->server;
	$ref = $server->get('HTTP_REFERER', '');

	if ($session->has('last_forward_from')) {
		$login_metadata['forward'] = $session->get('last_forward_from');
	} elseif (0 === strpos($ref, elgg_get_site_url())
			&& 0 !== strpos($ref, elgg_get_site_url() . 'gnusocial_api/')) {
		$login_metadata['forward'] = $ref;
	}
	$session->set('gnusocial_api_login_metadata', $login_metadata);

	forward($request_link, 'gnusocial_api');
}

/**
 * Log in a user referred from GNUSocial's OAuth API
 *
 * If the user has already linked their account with GNUSocial, it is a seamless
 * login. If this is a first time login (or a user from deprecated gnusocial login
 * plugin), we create a new account (update the account).
 *
 * If a plugin wants to be notified when someone logs in with gnusocial or a new
 * gnusocial user signs up, register for the standard login or create user events
 * and check for 'gnusocial_api' context.
 *
 * The user has to be redirected from GNUSocial for this to work. It depends on
 * the GNUSocial OAuth data.
 */
function gnusocial_api_login() {
	// sanity check
	if (!gnusocial_api_allow_sign_on_with_gnusocial()) {
		forward();
	}

	$session = elgg_get_session();
	$token = gnusocial_api_get_access_token(get_input('oauth_verifier'));

	$persistent = false;
	$forward = '';

	// fetch login metadata from session
	$login_metadata = $session->get('gnusocial_api_login_metadata');
	$session->remove('gnusocial_api_login_metadata');
	if (!empty($login_metadata['persistent'])) {
		$persistent = true;
	}
	if (!empty($login_metadata['forward'])) {
		$forward = $login_metadata['forward'];
	}

	if (!isset($token['oauth_token']) || !isset($token['oauth_token_secret'])) {
		register_error(elgg_echo('gnusocial_api:login:error'));
		forward();
	}

	// attempt to find user and log them in.
	// else, create a new user.
	$options = array(
		'type' => 'user',
		'plugin_id' => 'gnusocial_api',
		'plugin_user_setting_name_value_pairs' => array(
			'access_key' => $token['oauth_token'],
			'access_secret' => $token['oauth_token_secret'],
		),
		'limit' => 0,
	);

	$users = elgg_get_entities_from_plugin_user_settings($options);

	if ($users) {
		if (count($users) == 1 && login($users[0], $persistent)) {
			system_message(elgg_echo('gnusocial_api:login:success'));
			forward($forward);
		} else {
			register_error(elgg_echo('gnusocial_api:login:error'));
			forward();
		}
	} else {
		$api = gnusocial_api_get_api_object($token['oauth_token'], $token['oauth_token_secret']);
		$gnusocial = $api->get('account/verify_credentials');

		// backward compatibility for deprecated GNUSocial Login plugin
		$user = FALSE;
		if ($gnusocial_user = get_user_by_username($token['screen_name'])) {
			if (($screen_name = $gnusocial_user->gnusocial_screen_name) && ($screen_name == $token['screen_name'])) {
				// convert existing account
				$user = $gnusocial_user;
				$forward = '';
			}
		}

		// create new user
		if (!$user) {
			$user = gnusocial_api_create_user($gnusocial);
			$site_name = elgg_get_site_entity()->name;
			system_message(elgg_echo('gnusocial_api:login:email', array($site_name)));
			$forward = "gnusocial_api/interstitial";
		}

		// set gnusocial services tokens
		elgg_set_plugin_user_setting('gnusocial_name', $token['screen_name'], $user->guid, 'gnusocial_api');
		elgg_set_plugin_user_setting('access_key', $token['oauth_token'], $user->guid, 'gnusocial_api');
		elgg_set_plugin_user_setting('access_secret', $token['oauth_token_secret'], $user->guid, 'gnusocial_api');

		// pull in GNUSocial icon
		gnusocial_api_update_user_avatar($user, $gnusocial->profile_image_url);

		// login new user
		if (login($user)) {
			system_message(elgg_echo('gnusocial_api:login:success'));
		} else {
			system_message(elgg_echo('gnusocial_api:login:error'));
		}

		forward($forward, 'gnusocial_api');
	}

	// register login error
	register_error(elgg_echo('gnusocial_api:login:error'));
	forward();
}

/**
 * Create a new user from GNUSocial information
 * 
 * @param object $gnusocial GNUSocial OAuth response
 * @return ElggUser
 */
function gnusocial_api_create_user($gnusocial) {
	// check new registration allowed
	if (!gnusocial_api_allow_new_users_with_gnusocial()) {
		register_error(elgg_echo('registerdisabled'));
		forward();
	}

	// Elgg-ify GNUSocial credentials
	$username = $gnusocial->screen_name;
	while (get_user_by_username($username)) {
		// @todo I guess we just hope this is good enough
		$username = $gnusocial->screen_name . '_' . rand(1000, 9999);
	}

	$password = generate_random_cleartext_password();
	$name = $gnusocial->name;

	$user = new ElggUser();
	$user->username = $username;
	$user->name = $name;
	$user->access_id = ACCESS_PUBLIC;
	$user->setPassword($password);
	$user->owner_guid = 0;
	$user->container_guid = 0;

	if (!$user->save()) {
		register_error(elgg_echo('registerbad'));
		forward();
	}

	return $user;
}

/**
 * Pull in the latest avatar from gnusocial.
 *
 * @param ElggUser $user
 * @param string   $file_location
 */
function gnusocial_api_update_user_avatar($user, $file_location) {
	// gnusocial's images have a few suffixes:
	// _normal
	// _reasonably_small
	// _mini
	// the gnusocial app here returns _normal.  We want standard, so remove the suffix.
	// @todo Should probably check that it's an image file.
	$file_location = str_replace('_normal.jpg', '.jpg', $file_location);

	$icon_sizes = elgg_get_config('icon_sizes');

	$filehandler = new ElggFile();
	$filehandler->owner_guid = $user->getGUID();
	foreach ($icon_sizes as $size => $dimensions) {
		$image = get_resized_image_from_existing_file(
			$file_location,
			$dimensions['w'],
			$dimensions['h'],
			$dimensions['square']
		);

		$filehandler->setFilename("profile/$user->guid$size.jpg");
		$filehandler->open('write');
		$filehandler->write($image);
		$filehandler->close();
	}
	
	// update user's icontime
	$user->icontime = time();
}

/**
 * User-initiated GNUSocial authorization
 *
 * Callback action from GNUSocial registration. Registers a single Elgg user with
 * the authorization tokens. Will revoke access from previous users when a
 * conflict exists.
 *
 * Depends upon {@link gnusocial_api_get_authorize_url} being called previously
 * to establish session request tokens.
 */
function gnusocial_api_authorize() {
	$token = gnusocial_api_get_access_token(get_input('oauth_verifier'));
	if (!isset($token['oauth_token']) || !isset($token['oauth_token_secret'])) {
		register_error(elgg_echo('gnusocial_api:authorize:error'));
		forward('settings/plugins', 'gnusocial_api');
	}

	// make sure no other users are registered to this gnusocial account.
	$options = array(
		'type' => 'user',
		'plugin_id' => 'gnusocial_api',
		'plugin_user_setting_name_value_pairs' => array(
			'access_key' => $token['oauth_token'],
			'access_secret' => $token['oauth_token_secret'],
		),
		'limit' => 0
	);
	$users = elgg_get_entities_from_plugin_user_settings($options);
	/* @var ElggUser[] $users */

	if ($users) {
		foreach ($users as $user) {
			// revoke access
			elgg_unset_plugin_user_setting('gnusocial_name', $user->getGUID(), 'gnusocial_api');
			elgg_unset_plugin_user_setting('access_key', $user->getGUID(), 'gnusocial_api');
			elgg_unset_plugin_user_setting('access_secret', $user->getGUID(), 'gnusocial_api');
		}
	}

	// register user's access tokens
	elgg_set_plugin_user_setting('gnusocial_name', $token['screen_name'], 0, 'gnusocial_api');
	elgg_set_plugin_user_setting('access_key', $token['oauth_token'], 0, 'gnusocial_api');
	elgg_set_plugin_user_setting('access_secret', $token['oauth_token_secret'], 0, 'gnusocial_api');
	
	// trigger authorization hook
	elgg_trigger_plugin_hook('authorize', 'gnusocial_api', array('token' => $token));

	system_message(elgg_echo('gnusocial_api:authorize:success'));
	forward('settings/plugins', 'gnusocial_api');
}

/**
 * Remove gnusocial access for the currently logged in user.
 */
function gnusocial_api_revoke() {
	// unregister user's access tokens
	elgg_unset_plugin_user_setting('gnusocial_name', 0, 'gnusocial_api');
	elgg_unset_plugin_user_setting('access_key', 0, 'gnusocial_api');
	elgg_unset_plugin_user_setting('access_secret', 0, 'gnusocial_api');

	system_message(elgg_echo('gnusocial_api:revoke:success'));
	forward('settings/plugins', 'gnusocial_api');
}

/**
 * Gets the url to authorize a user.
 *
 * @param string $callback The callback URL
 */
function gnusocial_api_get_authorize_url($callback = NULL, $login = true) {
	$session = elgg_get_session();

	// request tokens from GNUSocial
	$gnusocial = gnusocial_api_get_api_object();
	$token = $gnusocial->getRequestToken($callback);

	// save token in session for use after authorization
	$session->set('gnusocial_api', array(
		'oauth_token' => $token['oauth_token'],
		'oauth_token_secret' => $token['oauth_token_secret'],
	));

	return $gnusocial->getAuthorizeURL($token['oauth_token'], $login);
}

/**
 * Returns the access token to use in gnusocial calls.
 *
 * @param bool $oauth_verifier
 * @return array
 */
function gnusocial_api_get_access_token($oauth_verifier = FALSE) {
	$session = elgg_get_session();

	// retrieve stored tokens
	$api_settings = $session->get('gnusocial_api');

	$oauth_token = $api_settings['oauth_token'];
	$oauth_token_secret = $api_settings['oauth_token_secret'];
	$session->remove('gnusocial_api');

	// fetch an access token
	$api = gnusocial_api_get_api_object($oauth_token, $oauth_token_secret);
	return $api->getAccessToken($oauth_verifier);
}

/**
 * Checks if this site is accepting new users.
 * Admins can disable manual registration, but some might want to allow
 * gnusocial-only logins.
 */
function gnusocial_api_allow_new_users_with_gnusocial() {
	$site_reg = elgg_get_config('allow_registration');
	$gnusocial_reg = elgg_get_plugin_setting('new_users', 'gnusocial_api');

	if ($site_reg || (!$site_reg && $gnusocial_reg == 'yes')) {
		return true;
	}

	return false;
}

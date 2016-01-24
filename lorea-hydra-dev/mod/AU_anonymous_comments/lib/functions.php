<?php

namespace AU\AnonymousComments;

/**
 * get our anonymous user
 * 
 * @staticvar type $anon_user
 * @return \ElggUser
 */
function get_anon_user() {
	static $anon_user;

	if ($anon_user) {
		return $anon_user;
	}

	$anon_guid = elgg_get_plugin_setting('anon_guid', PLUGIN_ID);
	$anon_user = get_user($anon_guid);
	if (!$anon_user) {
		$anon_user = set_anonymous_user();
	}

	return $anon_user;
}

/**
 * 
 * @return string ip | null
 */
function get_ip() {
	if (filter_var(getenv('HTTP_CLIENT_IP'), FILTER_VALIDATE_IP)) {
		$ip_address = getenv('HTTP_CLIENT_IP');
	} elseif (filter_var(getenv('HTTP_X_FORWARDED_FOR'), FILTER_VALIDATE_IP)) {
		$ip_address = getenv('HTTP_X_FORWARDED_FOR');
	} elseif (filter_var(getenv('HTTP_X_FORWARDED'), FILTER_VALIDATE_IP)) {
		$ip_address = getenv('HTTP_X_FORWARDED');
	} elseif (filter_var(getenv('HTTP_FORWARDED_FOR'), FILTER_VALIDATE_IP)) {
		$ip_address = getenv('HTTP_FORWARDED_FOR');
	} elseif (filter_var(getenv('HTTP_FORWARDED'), FILTER_VALIDATE_IP)) {
		$ip_address = getenv('HTTP_FORWARDED');
	} else {
		$ip_address = $_SERVER['REMOTE_ADDR'];
	}

	return $ip_address;
}

/*
 *  This function will check to see if there is a user already created by the plugin (possibly from a 
 *  previous installation).  If so, it will get the ID of that user and save it for the plugin to use.
 *  If there is no user created already, it will create a fake user and save the ID for the plugin.
 *  A piece of metadata ($user->AU_anonymous_comments = true) is set to differentiate just in case someone decided
 *  to take our username.
 */
function set_anonymous_user() {

	//first see if a user has been created previously
	$users = elgg_get_entities_from_metadata(array(
		'types' => 'user',
		'metadata_name' => 'AU_anonymous_comments',
		'value' => true,
	));

	if (!$users) {
		//no previous user - create a new one
		//find available username
		$i = 1;
		$username = "AU_anonymous_comments_user1";
		$basename = "AU_anonymous_comments_user";
		while (get_user_by_username($username)) {
			$i++;
			$username = $basename . $i;
		}

		//let's make a user
		$anon_user = new \ElggUser();
		$anon_user->username = $username;
		$anon_user->email = "AU_anonymous_comments_user" . $i . "@example.com";
		$anon_user->name = elgg_echo('AU_anonymous_comments:display_name');
		$anon_user->access_id = ACCESS_PUBLIC;
		$anon_user->salt = '';
		$anon_user->password = ''; // doesn't need to match, we don't want people logging in anyway
		$anon_user->owner_guid = 0; // Users aren't owned by anyone, even if they are admin created.
		$anon_user->container_guid = 0; // Users aren't contained by anyone, even if they are admin created.
		$anon_user->save();

		// set the plugin-identifiable metadata
		$anon_user->AU_anonymous_comments = true;
	} else {
		// we found our user through metadata
		$anon_user = $users[0];
	}

	elgg_set_plugin_setting('anon_guid', $anon_user->guid, PLUGIN_ID);

	return $anon_user;
}

/**
 * this function returns true if the entity is being moderated
 * 
 * @param type $id
 * @return boolean
 */
function is_moderated($entity) {
	if (!elgg_instanceof($entity)) {
		return false;
	}

	if ($entity->is_moderated) {
		return true;
	}

	// this check is necessary in case there's a way to set public content as unmoderated
	// then is_moderated can === 0
	if ($entity->access_id == ACCESS_PUBLIC && is_null($entity->is_moderated)) {
		return true;
	}

	return false;
}

/**
 * generate a hard-to-guess token for offline approval/rejection
 * 
 * @param type $comment
 * @return type
 */
function get_token($comment) {
	if ($comment->__anonymous_comment_token) {
		return $comment->__anonymous_comment_token;
	}
	
	// generate a token for this comment
	$token = sha1(uniqid('auac' . $comment->guid));
	$comment->__anonymous_comment_token = $token;
	return $token;
}

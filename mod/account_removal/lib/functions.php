<?php
/**
 * All helper functions are bundled here
 */

/**
 * Generate a validation token
 *
 * @param string $type      what kind of token
 * @param int    $user_guid the user_guid to generate for
 *
 * @return bool|string
 */
function acount_removal_generate_confirm_token($type, $user_guid) {
	$result = false;
	
	if (!empty($user_guid) && ($user = get_user($user_guid)) && in_array($type, array("remove", "disable"))) {
		$site_secret = get_site_secret();
		$user_salt = $user->salt;
		
		$result = md5($site_secret . $user_guid . $type . $user_salt);
	}
	
	return $result;
}

/**
 * Validate a token for account removal
 *
 * @param string $token     the token to validate
 * @param string $type      what kind of token
 * @param int    $user_guid the user_guid to validate for
 *
 * @return bool
 */
function acount_removal_validate_confirm_token($token, $type, $user_guid) {
	$result = false;
	
	if (!empty($user_guid) && !empty($token) && in_array($type, array("remove", "disable"))) {
		$new_token = acount_removal_generate_confirm_token($type, $user_guid);
		
		if ($token === $new_token) {
			$result = true;
		}
	}
	
	return $result;
}

/**
 * Send a notification to the user for confirmation of account removal
 *
 * @param string $type      what kind of removal
 * @param int    $user_guid the user_guid to send the notification to
 *
 * @return bool
 */
function account_removal_send_notification($type, $user_guid) {
	$result = false;
	
	$site = elgg_get_site_entity();
	
	if (!empty($user_guid) && ($user = get_user($user_guid)) && in_array($type, array("remove", "disable"))) {
		$token = acount_removal_generate_confirm_token($type, $user_guid);
		$url = elgg_get_site_url() . "account_removal/" . $type . "/?confirm_token=" . $token;
		
		$subject = elgg_echo("account_removal:message:" . $type . ":subject", array($site->name));
		$message = elgg_echo("account_removal:message:" . $type . ":body", array($user->name, $url));
		
		notify_user($user_guid, $site->getGUID(), $subject, $message, null, "email");
		
		$result = true;
	}
	
	return $result;
}

/**
 * Send a thank you notification after account removal
 *
 * @param string $type      what kind of removal
 * @param int    $user_guid the user_guid to send the notification to
 *
 * @return bool
 */
function account_removal_send_thank_notification($type, $user_guid) {
	$result = false;
	
	$site = elgg_get_site_entity();
	
	if (!empty($user_guid) && ($user = get_user($user_guid)) && in_array($type, array("remove", "disable"))) {
		$subject = elgg_echo("account_removal:message:thank_you:" . $type . ":subject", array($site->name));
		$message = elgg_echo("account_removal:message:thank_you:" . $type . ":body", array($user->name, $site->name));
		
		notify_user($user_guid, $site->getGUID(), $subject, $message, null, "email");
		
		$result = true;
	}
	
	return $result;
}

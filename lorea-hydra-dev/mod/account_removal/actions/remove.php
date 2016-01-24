<?php

$user_guid = (int) get_input("user_guid");
$type = get_input("type");
$reason = get_input("reason");
$confirm_token = get_input("confirm_token");

$forward_url = REFERER;

if (($user_guid == elgg_get_logged_in_user_guid()) && elgg_is_admin_logged_in()) {
	register_error(elgg_echo("account_removal:actions:remove:error:user_guid:admin"));
} elseif (($user_guid != elgg_get_logged_in_user_guid()) && !elgg_is_admin_logged_in()) {
	register_error(elgg_echo("account_removal:actions:remove:error:user_guid:user"));
} elseif ($user = get_user($user_guid)) {
	$group_admins_allowed = elgg_get_plugin_setting("groupadmins_allowed", "account_removal");
	$user_options = elgg_get_plugin_setting("user_options", "account_removal");
	$reason_required = elgg_get_plugin_setting("reason_required", "account_removal");
	
	$group_options = array(
		"type" => "group",
		"owner_guid" => $user->getGUID(),
		"count" => true
	);
	
	if (($group_admins_allowed != "yes") && elgg_get_entities($group_options)) {
		register_error(elgg_echo("account_removal:actions:remove:error:group_owner"));
	} elseif (($reason_required == "yes") && empty($reason)) {
		register_error(elgg_echo("account_removal:actions:remove:error:reason"));
	} else {
		// make sure the given action is allowed
		switch ($user_options) {
			case "remove":
				$action = "remove";
				break;
			case "disable_and_remove":
				if ($type == "remove") {
					$action = "remove";
				} else {
					$action = "disable";
				}
				break;
			case "disable":
			default:
				$action = "disable";
				break;
		}
		
		// is the user removal type the same as the system removal type
		if ($type == $action) {
			
			// check if we can do the user action
			if (!empty($confirm_token) && acount_removal_validate_confirm_token($confirm_token, $type, $user_guid)) {
				// prepend the reason with users own request
				$reason = elgg_echo("account_removal:disable:default") . ". " . $reason;
				
				// send a thank you e-mail
				account_removal_send_thank_notification($action, $user_guid);
				
				// user has supplied a token, so we can do the action
				if ($action == "disable") {
					$user->ban($reason, false);
					logout();
				} elseif ($action == "remove") {
					delete_entity($user->getGUID(), false);
				}
				
				system_message(elgg_echo("account_removal:actions:remove:success:" . $action));
				
				$forward_url = "";
			} elseif (!empty($confirm_token) && !acount_removal_validate_confirm_token($confirm_token, $action, $user_guid)) {
				// token mismatch
				register_error(elgg_echo("account_removal:actions:remove:error:token_mismatch"));
			} else {
				// user requests removal, generate token and sent confirm mail
				account_removal_send_notification($action, $user_guid);
				
				system_message(elgg_echo("account_removal:actions:remove:success:request"));
				
				$forward_url = "settings/user/" . $user->username;
			}
		} else {
			register_error(elgg_echo("account_removal:actions:remove:error:type_match"));
		}
	}
} else {
	register_error(elgg_echo("account_removal:actions:remove:error:user_guid:unknown"));
}

forward($forward_url);

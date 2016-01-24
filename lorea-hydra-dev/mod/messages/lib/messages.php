<?php
/**
 * Messages helper functions
 *
 * @package ElggMessages
 */

/**
 * Prepare the compose form variables
 *
 * @return array
 */
function messages_prepare_form_vars($recipient_guid = 0) {

	// input names => defaults
	$values = array(
		'subject' => '',
		'body' => '',
		'recipient_guid' => $recipient_guid,
	);

	if (elgg_is_sticky_form('messages')) {
		foreach (array_keys($values) as $field) {
			$values[$field] = elgg_get_sticky_value('messages', $field);
		}
	}

	elgg_clear_sticky_form('messages');

	return $values;
}

/**
 * Make sure non-friends messages can't be sent to people who has selected
 * to receive messages from friends only
 *
 * uses $recipient_guid
 * @return bool
 */
function messages_gatekeeper($recipient_guid) {
	$loggedin_guid = elgg_get_logged_in_user_guid();
	$result = "ok";
	if (!$send_to = get_user($recipient_guid)) {
		return "error";
	}
	if (!$send_to instanceof ElggUser) {
		return "error";
	}

	// Only relevant if you have activated friendsonly option in plugin settings
	if (elgg_get_plugin_setting('enableprivacy', 'messages') == 'yes'){
		if (elgg_get_plugin_user_setting('friendsonly', $loggedin_guid, 'messages') == 'yes') {
			if($recipient_guid){
				if(!$send_to->isFriend()){
					$result = "warning";
				}
			}
		}
		if (elgg_get_plugin_user_setting('friendsonly', $send_to->guid, 'messages') == 'yes') {
			if($recipient_guid){
				if(!$send_to->isFriend()){
					$result = "reject";
				}
			}
		}
	}

	// Only relevant if you have notfriends plugin enabled
	if (elgg_is_active_plugin('notfriends')) {
		if (notfriends_check($send_to->guid)) {
			$result = "blocked";
		}
		if (notfriends_check_inverse($send_to->guid)) {
			$result = "blocked";
		}
	}
	
	// Admin override
	if (elgg_is_admin_logged_in()) {
		if ($result != 'ok') {
			$result = 'override';
		}
	}
	return $result; 		
}
/**
 * Send an internal message
 *
 * @param string $subject The subject line of the message
 * @param string $body The body of the mesage
 * @param int $send_to The GUID of the user to send to
 * @param int $from Optionally, the GUID of the user to send from
 * @param int $reply The GUID of the message to reply from (default: none)
 * @param true|false $notify Send a notification (default: true)
 * @param true|false $add_to_sent If true (default), will add a message to the sender's 'sent' tray
 * @return bool
 */
function messages_send($subject, $body, $send_to, $from = 0, $reply = 0, $notify = true, $add_to_sent = true) {

	global $messagesendflag;
	$messagesendflag = 1;

	global $messages_pm;
	if ($notify) {
		$messages_pm = 1;
	} else {
		$messages_pm = 0;
	}

	// If $from == 0, set to current user
	if ($from == 0) {
		$from = (int) elgg_get_logged_in_user_guid();
	}

	// Initialise 2 new ElggObject
	$message_to = new ElggObject();
	$message_sent = new ElggObject();
	$message_to->subtype = "messages";
	$message_sent->subtype = "messages";
	$message_to->owner_guid = $send_to;
	$message_to->container_guid = $send_to;
	$message_sent->owner_guid = $from;
	$message_sent->container_guid = $from;
	$message_to->access_id = ACCESS_PUBLIC;
	$message_sent->access_id = ACCESS_PUBLIC;
	$message_to->title = $subject;
	$message_to->description = $body;
	$message_sent->title = $subject;
	$message_sent->description = $body;
	$message_to->toId = $send_to; // the user receiving the message
	$message_to->fromId = $from; // the user receiving the message
	$message_to->readYet = 0; // this is a toggle between 0 / 1 (1 = read)
	$message_to->hiddenFrom = 0; // this is used when a user deletes a message in their sentbox, it is a flag
	$message_to->hiddenTo = 0; // this is used when a user deletes a message in their inbox
	$message_sent->toId = $send_to; // the user receiving the message
	$message_sent->fromId = $from; // the user receiving the message
	$message_sent->readYet = 0; // this is a toggle between 0 / 1 (1 = read)
	$message_sent->hiddenFrom = 0; // this is used when a user deletes a message in their sentbox, it is a flag
	$message_sent->hiddenTo = 0; // this is used when a user deletes a message in their inbox

	$message_to->msg = 1;
	$message_sent->msg = 1;

	// Save the copy of the message that goes to the recipient
	$success = $message_to->save();

	// Save the copy of the message that goes to the sender
	if ($add_to_sent) {
		$success2 = $message_sent->save();
	}

	$message_to->access_id = ACCESS_PRIVATE;
	$message_to->save();

	if ($add_to_sent) {
		$message_sent->access_id = ACCESS_PRIVATE;
		$message_sent->save();
	}

	// Add a releationship between the two messages, so sender can see if message has been read
	$message_to->sentMsgId = $message_sent->guid;
	$message_sent->toMsgId = $message_to->guid;
	add_entity_relationship($message_to->guid, "notread", $message_sent->guid);

	// if the new message is a reply then create a relationship link between the new message
	// and the message it is in reply to
	if ($reply && $success) {
		$create_relationship = add_entity_relationship($message_sent->guid, "reply", $reply);
	}

	$message_contents = strip_tags($body);
	if ($send_to != elgg_get_logged_in_user_entity() && $notify) {
		$subject = elgg_echo('messages:email:subject');
		$body = elgg_echo('messages:email:body', array(
			elgg_get_logged_in_user_entity()->name,
			$message_contents,
			elgg_get_site_url() . "messages/inbox/" . $user->username,
			elgg_get_logged_in_user_entity()->name,
			elgg_get_site_url() . "messages/compose?send_to=" . elgg_get_logged_in_user_guid()
		));

		notify_user($send_to, elgg_get_logged_in_user_guid(), $subject, $body);
	}

	$messagesendflag = 0;
	return $success;
}



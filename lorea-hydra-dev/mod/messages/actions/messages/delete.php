<?php
/**
 * Delete message
 */

$guid = (int) get_input('guid');

$message = get_entity($guid);
$user = elgg_get_logged_in_user_entity();
$page = get_input('page');

$referer = REFERRER;
if ($page == 'read') {
	$referer = elgg_get_site_url() . "messages/{$box}/{$user->username}";
}

$box = 'sent';
if ($user->guid == $message->toId) {
	$box = 'inbox';
}

if (!$message || !$message->canEdit()) {
	register_error(elgg_echo('messages:error:delete:single'));
	forward(REFERER);
}

if ($box == 'sent') {
	$attachments = unserialize($message->attachments);
	if (count($attachments) > 0) {
		foreach ($attachments as $attachment) {
			$file = new MessagePluginFile($attachment);
			if (!$file->guid) {
				register_error(elgg_echo("messages:deleteattacmentfailed"));
			}
			if (!$file->canEdit()) {
				register_error(elgg_echo("messages:deleteattacmentfailed"));
			}
			if (!$file->delete()) {
				register_error(elgg_echo("messages:deleteattacmentfailed"));
			}
		}
	}
}

if (!$message->delete()) {
	register_error(elgg_echo('messages:error:delete:single'));
} else {
	system_message(elgg_echo('messages:success:delete:single'));
}

forward($referer);

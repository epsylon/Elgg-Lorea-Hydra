<?php

namespace MFP\BlockUsers;

/**
 * Block a user
 */

$blocked_user = get_entity(get_input('blocked_user_guid'));
$blocking_user = get_entity(get_input('blocking_user_guid', elgg_get_logged_in_user_guid()));

if ($blocked_user == $blocking_user) {
	register_error(elgg_echo('block_users:block:cannot_block'));
	forward(REFERRER);
}

if (block_user($blocked_user, $blocking_user)) {
	// unfriend
	remove_entity_relationship($blocked_user->getGUID(), 'friend', $blocking_user->getGUID());
	remove_entity_relationship($blocking_user->getGUID(), 'friend', $blocked_user->getGUID());
	system_message(elgg_echo('block_users:block:blocked_user'));
} else {
	register_error(elgg_echo('block_users:block:cannot_block'));
}

forward(REFERRER);
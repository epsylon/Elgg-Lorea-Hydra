<?php

namespace MFP\BlockUsers;

/**
 * Unblock a user
 */

$blocked_user = get_entity(get_input('blocked_user_guid'));
$blocking_user = get_entity(get_input('blocking_user_guid', elgg_get_logged_in_user_guid()));

if (!is_blocked($blocked_user, $blocking_user)) {
	register_error(elgg_echo('block_users:unblock:cannot_unblock'));
	forward(REFERRER);
}

if (unblock_user($blocked_user, $blocking_user)) {
	system_message(elgg_echo('block_users:unblock:unblocked_user'));
} else {
	register_error(elgg_echo('block_users:unblock:cannot_unblock'));
}

$next = get_input('next', REFERRER);
forward($next);
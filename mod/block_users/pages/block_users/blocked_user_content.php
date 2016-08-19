<?php

namespace MFP\BlockUsers;

/**
 * Shows a blocked notice when viewing user has blocked content owner.
 */

$title = elgg_echo('block_users:blocked_user_notice');
$content = elgg_view_title($title);

$user = get_user_by_username(get_input('blocked_username'));
if ($user instanceof \ElggUser) {
	// don't show if not blocked
	if (!is_blocked($user, elgg_get_logged_in_user_entity())) {
		forward();
	}
	$next = get_input('next', '/block_users/blocked_users');
	$message = elgg_view('output/url', array(
		'href' => 'action/block_users/unblock?blocked_user_guid=' 
				. $user->getGUID() . '&next=' . urlencode($next),
		'text' => elgg_echo('block_users:unblock_user_name', array($user->name)),
		'confirm' => true
	));
} else {
	$url = '/block_users/blocked_users';
	$message = elgg_view('output/url', array(
		'href' => $url,
		'text' => elgg_echo('block_users:manage_blocked_users')
	));
}

$body = elgg_view_layout('one_column', array(
	'content' => $content . $message
));

echo elgg_view_page($title, $body);

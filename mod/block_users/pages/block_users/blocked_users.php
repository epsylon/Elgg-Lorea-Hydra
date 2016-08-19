<?php

namespace MFP\BlockUsers;

/**
 * Shows all users blockd by get_input('blocking_username');
 */

$blocking_user = get_user_by_username(get_input('blocking_username'));
if (!$blocking_user) {
	forward();
}

$title = elgg_echo('block_users:blocked_users');
$content = elgg_view_title($title);

$options = array(
	'type' => 'user',
	'relationship' => 'blocked',
	'relationship_guid' => $blocking_user->getGUID(),
	'limit' => 0,
	'count' => true
);

$count = elgg_get_entities_from_relationship($options);

if ($count) {
	unset ($options['count']);
	$options['full_view'] = false;
	
	$content .= elgg_list_entities_from_relationship($options);
} else {
	$content .= elgg_echo('block_users:no_blocked_users');
}

$body = elgg_view_layout('one_sidebar', array(
	'content' => $content
));

echo elgg_view_page($title, $body);

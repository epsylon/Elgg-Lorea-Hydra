<?php

namespace MFP\BlockUsers;

/**
 * Shows a blocked notice when viewing user has been blocked by content owner.
 */

$title = elgg_echo('block_users:blocked_content_notice');

$content = elgg_view_title($title);

$body = elgg_view_layout('one_column', array(
	'content' => $content
));

echo elgg_view_page($title, $body);

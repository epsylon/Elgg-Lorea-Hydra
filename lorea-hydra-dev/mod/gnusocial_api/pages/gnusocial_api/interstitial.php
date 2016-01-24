<?php
/**
 * An interstitial page for newly created GNUSocial users.
 *
 * This prompts them to enter an email address and set a password in case GNUSocial goes down or they
 * want to disassociate their account from gnusocial.
 */

$title = elgg_echo('gnusocial_api:interstitial:settings');

$content = elgg_view_form('gnusocial_api/interstitial_settings');

$params = array(
	'content' => $content,
	'title' => $title,
);
$body = elgg_view_layout('one_sidebar', $params);

echo elgg_view_page($title, $body);

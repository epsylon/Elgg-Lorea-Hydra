<?php
/**
* Compose a message
*
* @package ElggMessages
*/

gatekeeper();

$send_to = (int)get_input('send_to');
$recipient = get_user($send_to);

$page_owner = elgg_get_logged_in_user_entity();
elgg_set_page_owner_guid($page_owner->getGUID());

$title = elgg_echo('messages:add');

elgg_push_breadcrumb($title);

$params = messages_prepare_form_vars($send_to);
$params['friends'] = $page_owner->getFriends('', 50);
$params['collections'] = get_user_access_collections($page_owner->getGUID());

$form = elgg_view_form('messages/send', array('enctype' => 'multipart/form-data'), $params);

$result = messages_gatekeeper($send_to);
if ($result == "reject") {
	$content = "<div class='messages-warning'>" . elgg_echo('messages:reject', array($recipient->name)) . "</div>";
} elseif ($result == "blocked") {
	$content = "<div class='messages-warning'>" . elgg_echo('messages:blocked', array($recipient->name)) . "</div>";
} elseif ($result == "warning") {
	$content = "<div class='messages-warning'>" . elgg_echo('messages:warning', array($recipient->name)) . "</div>";
	$content .= $form;
} elseif ($result == "override") {
	$content = "<div class='messages-warning'>" . elgg_echo('messages:override', array($recipient->name)) . "</div>";
	$content .= $form;
} else {
	$content = $form;
}

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
));

echo elgg_view_page($title, $body);

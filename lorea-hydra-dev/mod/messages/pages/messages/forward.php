<?php
/**
* Compose a message
*
* @package ElggMessages
*/

gatekeeper();

$message = get_entity(get_input('guid'));
if (!$message) {
	forward();
}

$page_owner = elgg_get_logged_in_user_entity();

elgg_set_page_owner_guid($page_owner->getGUID());

$title = elgg_echo('messages:forward');

elgg_push_breadcrumb($title);

$params = messages_prepare_form_vars((int)get_input('send_to'));
$params['friends'] = $page_owner->getFriends('', 50);
$params['collections'] = get_user_access_collections($page_owner->getGUID());
$params['message'] = $message;
$content = elgg_view_form('messages/forward', array(), $params);

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
));

echo elgg_view_page($title, $body);

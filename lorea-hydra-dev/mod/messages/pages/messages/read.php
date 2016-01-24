<?php
/**
* Read a message page
*
* @package ElggMessages
*/

gatekeeper();

$message = get_entity(get_input('guid'));
if (!$message) {
	forward();
}

elgg_set_page_owner_guid($message->getOwnerGUID());
$page_owner = elgg_get_page_owner_entity();

$title = $message->title;

$inbox = false;
if ($page_owner->getGUID() == $message->toId) {
	$inbox = true;
	elgg_push_breadcrumb(elgg_echo('messages:inbox'), 'messages/inbox/' . $page_owner->username);
} else {
	elgg_push_breadcrumb(elgg_echo('messages:sent'), 'messages/sent/' . $page_owner->username);
}
elgg_push_breadcrumb($title);

$content = elgg_view_entity($message, array('full_view' => true));

if ($inbox) {

	// mark the message as read
	$message->readYet = true;

	// remove relationship to sent message making it read in users sentbox
	remove_entity_relationship($message->guid, "notread", $message->sentMsgId);			

	$form_params = array(
		'id' => 'messages-reply-form',
		'class' => 'hidden mtl mbl elgg-divide-bottom',
		'action' => 'action/messages/send',
	);

	$body_params = array('message' => $message);

	$replyform = elgg_view_form('messages/reply', $form_params, $body_params);

	if (elgg_get_logged_in_user_guid() == elgg_get_page_owner_guid()) {
		elgg_register_menu_item('title', array(
			'name' => 'delete',
			'href' => "action/messages/delete?guid={$message->getGUID()}&page=read",
			'text' => elgg_echo('delete'),
			'confirm' => elgg_echo('deleteconfirm'),
			'link_class' => 'elgg-button elgg-button-delete',
		));
		elgg_register_menu_item('title', array(
			'name' => 'forward',
			'href' => "messages/forward/{$message->getGUID()}",
			'text' => elgg_echo('messages:forward'),
			'link_class' => 'elgg-button elgg-button-action srm',
		));
		elgg_register_menu_item('title', array(
			'name' => 'reply',
			'href' => '#messages-reply-form',
			'text' => elgg_echo('messages:answer'),
			'link_class' => 'elgg-button elgg-button-action srm',
			'rel' => 'toggle',
		));

		if ($find_user = get_user($message->fromId)) {
			elgg_register_menu_item('title', array(
				'name' => 'find',
				'href' => "messages/find/{$find_user->username}",
				'text' => elgg_echo('messages:find:button', array($find_user->name)),
				'link_class' => 'elgg-button elgg-button-submit srm',
			));
		}
	}

} else {
	if (elgg_get_logged_in_user_guid() == elgg_get_page_owner_guid()) {

		elgg_register_menu_item('title', array(
			'name' => 'delete',
			'href' => "action/messages/delete?guid={$message->getGUID()}",
			'text' => elgg_echo('delete'),
			'confirm' => elgg_echo('deleteconfirm'),
			'link_class' => 'elgg-button elgg-button-delete',
		));

		if ($find_user = get_user($message->toId)) {
			elgg_register_menu_item('title', array(
				'name' => 'find',
				'href' => "messages/find/{$find_user->username}",
				'text' => elgg_echo('messages:find:button', array($find_user->name)),
				'link_class' => 'elgg-button elgg-button-submit srm',
			));
		}
	}
}

$sidebar = elgg_view('messages/sidebar');

$body = elgg_view_layout('content', array(
	'content' => $replyform . $content,
	'title' => ' ',
	'filter' => '',
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);

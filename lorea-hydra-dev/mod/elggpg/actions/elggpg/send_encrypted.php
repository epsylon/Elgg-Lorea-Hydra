<?php
/**
 * ElggPG -- Send message action
 *
 * @package        Lorea
 * @subpackage     ElggPG
 * @override mod/messages/actions/messages/send.php
 *
 * Copyright 2011-2013 Lorea Faeries <federation@lorea.org>
 *
 * This file is part of the ElggPG plugin for Elgg.
 *
 * ElggPG is free software: you can redistribute it and/or modify it
 * under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * ElggPG is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this program. If not, see
 * <http://www.gnu.org/licenses/>.
 */

$subject = strip_tags(get_input('subject'));
$body = get_input('body');
$recipient_guid = get_input('recipient_guid');

elgg_make_sticky_form('messages');

//$reply = get_input('reply',0); // this is the guid of the message replying to

if (!$recipient_guid) {
	register_error(elgg_echo("messages:user:blank"));
	forward("messages/compose");
}

$user = get_user($recipient_guid);
if (!$user) {
	register_error(elgg_echo("messages:user:nonexist"));
	forward("messages/compose");
}

// Make sure the message field, send to field and title are not blank
if (!$body || !$subject) {
	register_error(elgg_echo("messages:blank"));
	forward("messages/compose");
}

// Otherwise, encrypt and 'send' the message 

elgg_load_library('elggpg');
elgg_load_library('elggpg:send:override');

if (elgg_get_plugin_user_setting('encrypt_site_messages', elgg_get_logged_in_user_guid(), 'elggpg') == 'yes') {
	$body_from = elggpg_encrypt($body, elgg_get_logged_in_user_entity(), false);
}
if (!$body_from) {
	$body_from = $body;
}
if (elgg_get_plugin_user_setting('encrypt_site_messages', $user->guid, 'elggpg') == 'yes') {
	$body_to = elggpg_encrypt($body, $user, false);
}
if (!$body_to) {
	$body_to = $body;
}

// override of messages send to be able to save versions encrypted for both users
$result = messages_send_override($subject, $body_to, $body_from, $recipient_guid, 0, $reply);

// Save 'send' the message
if (!$result) {
	register_error(elgg_echo("messages:error"));
	forward("messages/compose");
}

elgg_clear_sticky_form('messages');
	
system_message(elgg_echo("messages:posted"));

forward('messages/inbox/' . elgg_get_logged_in_user_entity()->username);

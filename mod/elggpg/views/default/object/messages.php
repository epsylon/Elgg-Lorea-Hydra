<?php
/**
 * ElggPG -- Display encrypted message
 *
 * @package        Lorea
 * @subpackage     ElggPG
 * @override mod/messages/views/object/messages.php
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

$full = elgg_extract('full_view', $vars, false);
$message = elgg_extract('entity', $vars, false);

if (!$message) {
	return true;
}

if ($message->toId == elgg_get_page_owner_guid()) {
	// received
	$user = get_entity($message->fromId);
	if ($user) {
		$icon = elgg_view_entity_icon($user, 'tiny');
		$user_link = elgg_view('output/url', array(
			'href' => "messages/compose?send_to=$user->guid",
			'text' => $user->name,
			'is_trusted' => true,
		));
	} else {
		$icon = '';
		$user_link = elgg_echo('messages:deleted_sender');
	}

	if ($message->readYet) {
		$class = 'message read';
	} else {
		$class = 'message unread';
	}

} else {
	// sent
	$user = get_entity($message->toId);

	if ($user) {
		$icon = elgg_view_entity_icon($user, 'tiny');
		$user_link = elgg_view('output/url', array(
			'href' => "messages/compose?send_to=$user->guid",
			'text' => elgg_echo('messages:to_user', array($user->name)),
			'is_trusted' => true,
		));
	} else {
		$icon = '';
		$user_link = elgg_echo('messages:deleted_sender');
	}

	$class = 'message read';
}

$timestamp = elgg_view_friendly_time($message->time_created);

$subject_info = '';
if (!$full) {
	$subject_info .= "<input type='checkbox' name=\"message_id[]\" value=\"{$message->guid}\" />";
}
$subject_info .= elgg_view('output/url', array(
	'href' => $message->getURL(),
	'text' => $message->title,
	'is_trusted' => true,
));

$delete_link = elgg_view("output/confirmlink", array(
	'href' => "action/messages/delete?guid=" . $message->getGUID(),
	'text' => "<span class=\"elgg-icon elgg-icon-delete float-alt\"></span>",
	'confirm' => elgg_echo('deleteconfirm'),
	'encode_text' => false,
));

$body = <<<HTML
<div class="messages-owner">$user_link</div>
<div class="messages-subject">$subject_info</div>
<div class="messages-timestamp">$timestamp</div>
<div class="messages-delete">$delete_link</div>
HTML;

if ($full) {
	echo elgg_view_image_block($icon, $body, array('class' => $class));

	if (strpos($message->description, "-----BEGIN PGP MESSAGE-----") !== false) {
		echo "<pre class=\"pgparmor\">" . $message->description . "</pre>";
	} else {
		echo elgg_view('output/longtext', array('value' => $message->description));
	}

} else {
	echo elgg_view_image_block($icon, $body, array('class' => $class));
}

<?php
/**
 * File renderer.
 *
 * @package ElggFile
 */

$full = elgg_extract('full_view', $vars, false);
$message = elgg_extract('entity', $vars, false);
$owner = elgg_get_page_owner_entity();

if (!$message) {
	return true;
}

if ($message->toId == $owner->guid) {
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
		$class = 'message-read';
	} else {
		$class = 'message-unread';
		$msg_icon = elgg_view_icon('star-alt');
	}

} else {
	// sent
	if ($vars['folder'] == 'find') {
		$user = get_entity($message->fromId);
	} else {
		$user = get_entity($message->toId);
	} 

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

	// check to see if the message has been read by the reciever
	if(check_entity_relationship($message->toMsgId, "notread", $message->guid)) {
		$class = 'message-unread';
		$msg_icon = elgg_view_icon('star-alt');
	} else {
		$class = 'message-read';
	}

}

$timestamp = date('d/m-Y@H:i', $message->time_created);

$subject_info = '';

$subject_info .= elgg_view('output/url', array(
	'href' => $message->getURL(),
	'text' => $message->title,
	'is_trusted' => true,
	'class' => $class,
));

if ($full) {

	$icon_full = elgg_view_entity_icon($user, 'small');
	$from = elgg_echo('messages:from');
	$subject = elgg_echo('messages:title');
	$date = elgg_echo('messages:date');

	$body = "<h3 class='mlm'>{$subject}: {$message->title}</h3>";
	$body .= "<p class='messages-head-info'>{$from}: {$user_link}<br>";
	$body .= "{$date}: {$timestamp}";
	$body .= "</p>";
	echo "<div class='messages-head'>";
	echo elgg_view_image_block($icon_full, $body, array('class' => $class));
	echo "</div>";
	echo elgg_view('output/longtext', array(
					'value' => $message->description,
					'class' => 'messages-body'
					));
} else {

	$excerpt = elgg_extract('excerpt', $vars, false);
	if ($excerpt) {
		$teaser = "<div class='elgg-subtext'>";
		$teaser .= elgg_get_excerpt($message->description);
		$teaser .= "</div>";
	}

	$delete_link = elgg_view("output/confirmlink", array(
						'href' => "action/messages/delete?guid=" . $message->getGUID(),
						'text' => "<span class=\"elgg-icon elgg-icon-delete float-alt\"></span>",
						'confirm' => elgg_echo('deleteconfirm'),
						'encode_text' => false,
						));
	$checkbox = "<input type='checkbox' name='message_id[]' value='{$message->guid}' />";

	echo "<tr>";
	echo "<td>" . elgg_view_image_block($icon, $user_link) . "</td>";
	echo "<td>$msg_icon $subject_info $teaser</td>";
	echo "<td>$timestamp</td>";
	echo "<td>$delete_link $checkbox</td>";
	echo "</tr>";
}

<?php
/**
 * Reply form
 *
 * @uses $vars['message']
 */

// fix for RE: RE: RE: that builds on replies
$reply_title = $vars['message']->title;
if (strncmp($reply_title, "RE:", 3) != 0) {
	$reply_title = "RE: " . $reply_title;
}

$send_to = $vars['message']->fromId;
$recipient = get_user($send_to);
$message = autop($vars['message']->description);
if ($vars['message']->description) {
	$message = "<p></p><hr>";
	$message .= autop($vars['message']->description);
}

$form = "<div><label>" . elgg_echo("messages:title") . ": <br /></label>";
$form .= elgg_view('input/text', array(
							'name' => 'subject',
							'value' => $reply_title,
							));
$form .= "</div>";

$form .= "<div><label>" . elgg_echo("messages:message") . ":</label>";
$form .= elgg_view("input/longtext", array(
							'name' => 'body',
							'value' => $message,
							));
$form .= "</div>";
$form .= "<div class='elgg-foot'>";
$form .= elgg_view('input/hidden', array('name' => 'recipient_guid', 'value' => $send_to));
$form .= elgg_view('input/submit', array('value' => elgg_echo('messages:send')));
$form .= "</div>";

$result = messages_gatekeeper($send_to);
if ($result == "reject") {
	$content .= "<div class='messages-warning'>" . elgg_echo('messages:reject', array($recipient->name)) . "</div>";
} elseif ($result == "blocked") {
		$content .= "<div class='messages-warning'>" . elgg_echo('messages:blocked', array($recipient->name)) . "</div>";
	} elseif ($result == "warning") {
		$content .= "<div class='messages-warning'>" . elgg_echo('messages:warning', array($recipient->name)) . "</div>";
		$content .= $form;
	} elseif ($result == "override") {
		$content .= "<div class='messages-warning'>" . elgg_echo('messages:override', array($recipient->name)) . "</div>";
		$content .= $form;
	} elseif ($result == "error") {
		$content .= "<div class='messages-error'>" . elgg_echo('error:default') . "</div>";
	} else {
		$content .= $form;
	}
	
echo $content;


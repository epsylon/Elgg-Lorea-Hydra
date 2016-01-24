<?php
/**
 * Compose message form
 *
 * @package ElggMessages
 * @uses $vars['friends']
 * @uses $vars['groups']
 * @uses $vars['collections']
 */

$recipient_guid = elgg_extract('recipient_guid', $vars, 0);
$subject = elgg_extract('subject', $vars, '');
$body = elgg_extract('body', $vars, '');

if (elgg_is_active_plugin('autocomplete')) {
	$recipient_drop_down = elgg_view('input/selectfriend', array(
							'name' => 'recipient_guid',
							'internalid' => 'recipient_guid',
							'value' => $recipient_guid,
							'friends' => $vars['friends'],
							));
} else {
	$recipients_options = array();
	foreach ($vars['friends'] as $friend) {
		$recipients_options[$friend->guid] = $friend->name;
	}

	// Sort by natural case (eg. A, a, b, C, d)
	natcasesort($recipients_options); // this is a PHP (not Elgg) function

	// Put Select friend in top of array
	$recipients_options = array_reverse($recipients_options, true); 
	$recipients_options[''] = elgg_echo('messages:choose:friend'); 
	$recipients_options = array_reverse($recipients_options, true); 

	if (!array_key_exists($recipient_guid, $recipients_options)) {
		$recipient = get_entity($recipient_guid);
		if (elgg_instanceof($recipient, 'user')) {
			$recipients_options[$recipient_guid] = $recipient->name;
		}
	}

	$recipient_drop_down = elgg_view('input/dropdown', array(
							'name' => 'recipient_guid',
							'value' => $recipient_guid,
							'options_values' => $recipients_options,
							));
}

if (empty($recipient_guid)) {
	foreach ($vars['collections'] as $collection) {
		$collections_options[$collection->id] = $collection->name;
	}
	if (!empty($collections_options)) {
		$collections_options[''] = elgg_echo('messages:choose:collection');
		$collection_drop_down = elgg_view('input/dropdown', array(
							'name' => 'collection_guid',
							'value' => '',
							'options_values' => $collections_options,
							));
	}
}

if (elgg_is_admin_logged_in()) {
	$siteadmin_guid = elgg_get_plugin_setting('siteadmin', 'messages');
	if ($siteadmin_guid != 0 && $siteadmin_guid != elgg_get_logged_in_user_guid()) {
		$siteadmin = get_user($siteadmin_guid);
		$send_as_admin = "<br><br><div class='messages-error'>";
		$send_as_admin .= elgg_view('input/checkbox', array(
							'name' => 'siteadmin_guid',
							'value' => $siteadmin->guid,
							));
		$send_as_admin .= elgg_echo('messages:adminsend:label', array($siteadmin->name)) . "</div>";

	}
}

// Build send form fields
$send_form = "<div><label>" . elgg_echo('messages:to') . ": </label>";
$send_form .= $recipient_drop_down;
$send_form .= $collection_drop_down;
$send_form .= $send_as_admin;
$send_form .= "</div>";

$send_form .= "<div><label>" . elgg_echo('messages:title') . ": <br /></label>";
$send_form .= elgg_view('input/text', array(
					'name' => 'subject',
					'value' => $subject,
					));
$send_form .= "</div>";
$send_form .= "<div><label>" . elgg_echo('messages:message') . ":</label>";
$send_form .= elgg_view("input/longtext", array(
					'name' => 'body',
					'value' => $body,
					));
$send_form .= "</div>";
$send_form .= "<div class='elgg-foot'>" . elgg_view('input/submit', array('value' => elgg_echo('messages:fly'))) . "</div>";

echo $send_form;


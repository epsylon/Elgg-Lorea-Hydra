<?php
/**
 * Compose message form
 *
 * @package ElggMessages
 * @uses $vars['message']
 * @uses $vars['friends']
 * @uses $vars['collections']
 */

// fix for FWD: FWD: FWD: that builds on forwards
$subject = $vars['message']->title;
if (strncmp($subject, "FWD:", 4) != 0) {
	$subject = "FWD: " . $subject;
}

//$body = $vars['message']->description;
$body = "<br><br><hr>" . $vars['message']->description;

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

// Build send form fields
$send_form = "<div><label>" . elgg_echo('messages:to') . ": </label>";
$send_form .= $recipient_drop_down;
$send_form .= $collection_drop_down;
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




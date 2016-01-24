<?php
/**
 * Messages folder view (inbox, sent)
 *
 * Provides form body for mass deleting messages
 *
 * @uses $vars['messages'] List of messages
 * @uses $vars['count'] Count of messages
 * @uses $vars['offset'] Offset on queries of messages
 * @uses $vars['limit'] Limit on queries of messages
 * 
 */

$messages = $vars['messages'];

// Show excerpt
$excerpt = elgg_get_plugin_user_setting("excerpt", $user_guid, "messages");
if (!$excerpt) {
	$excerpt = false;
}

// Set up pagination
$pagination = elgg_view('navigation/pagination',array(
						'base_url' => $_SERVER['REQUEST_URI'],
						'offset' => $vars['offset'],
						'count' => $vars['count'],
						'limit' => $vars['limit'],
						));


echo $pagination;

echo '<table class="elgg-table">';
echo '<tr>';
if ($vars['folder'] == "inbox") {
	echo "<th class='msg-list-owner'>" . elgg_echo('messages:from') . "</th>";
} elseif ($vars['folder'] == "find") {
	echo "<th class='msg-list-owner'>" . elgg_echo('messages:who') . "</th>";
} else {
	echo "<th class='msg-list-owner'>" . elgg_echo('messages:to') . "</th>";
}
echo "<th class='msg-list-subject'>" . elgg_echo('messages:title') . "</th>";
echo "<th class='msg-list-timestamp'>" . elgg_echo('messages:date') . "</th>";
echo "<th class='msg-list-delete'></th>";
echo '</tr>';
if ($messages) {
	foreach ($messages as $message) {
		echo elgg_view_entity($message, array('full_view' => false, 'folder' => $vars['folder'], 'excerpt' => $excerpt));
	}
	echo '</table>';
} else {
	echo '</table>';
	echo elgg_echo('messages:nomessages');
}

echo $pagination;
echo "<br>";

echo elgg_view('input/hidden', array(
	'value' => 'process',
	'name' => 'page',
));

echo '<div class="elgg-foot messages-buttonbank">';

echo elgg_view('input/submit', array(
	'value' => elgg_echo('delete'),
	'name' => 'delete',
	'class' => 'elgg-button-delete',
	'js' => "OnClick=\"return confirm(elgg.echo('messages:delete'));\"",
));

if ($vars['folder'] == "inbox") {
	echo elgg_view('input/submit', array(
		'value' => elgg_echo('messages:markread'),
		'name' => 'read',
	));
}

echo elgg_view('input/button', array(
	'value' => elgg_echo('messages:toggle'),
	'class' => 'elgg-button elgg-button-cancel',
	'id' => 'messages-toggle',
));

echo '</div>';


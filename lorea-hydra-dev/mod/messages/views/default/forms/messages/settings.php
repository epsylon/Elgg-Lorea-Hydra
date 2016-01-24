<?php

/**
 * Elgg change user settings
 */

$user_guid = elgg_get_logged_in_user_guid();

$params_limit = array(
	'name' => 'limit',
	'options' => array(10, 15, 20, 25, 50),
);

// Get limit
$params_limit['value'] = elgg_get_plugin_user_setting("limit", $user_guid, "messages");
if (!$params_limit['value']) {
	$params_limit['value'] = 15;
}

echo "<div>";
echo elgg_view('input/dropdown', $params_limit);
echo elgg_echo('messages:settings:limit');
echo "</div>";

// Get checkbox value
$excerpt_checked = elgg_get_plugin_user_setting("excerpt", $user_guid, "messages");
if (!$excerpt_checked) {
	$excerpt_checked = false;
}
echo "<div>";
echo elgg_view('input/checkbox', array(
						'name' => 'excerpt',
						'value' => 1,
						'default' => false,
						'checked' => $excerpt_checked
						));
echo elgg_echo('messages:settings:excerpt');
echo "</div>";


echo elgg_view('input/submit', array('value' => elgg_echo('save')));
?>

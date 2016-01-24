<?php
/**
* Ssend a message action
* 
* @package ElggMessages
*/

$limit = get_input('limit');
$excerpt = get_input('excerpt');


$user_guid = elgg_get_logged_in_user_guid();

if (!elgg_set_plugin_user_setting('limit', $limit, $user_guid, 'messages')) {
	register_error(elgg_echo("messages:settings:failed"));
	forward(REFERER);
}

if ($excerpt == 1) {
	if (!elgg_set_plugin_user_setting('excerpt', 1, $user_guid, 'messages')) {
		register_error(elgg_echo("messages:settings:failed"));
		forward(REFERER);
	}
} else {
	elgg_set_plugin_user_setting('excerpt', 0, $user_guid, 'messages');
}

system_message(elgg_echo('messages:settings:saved'));

forward(REFERER);

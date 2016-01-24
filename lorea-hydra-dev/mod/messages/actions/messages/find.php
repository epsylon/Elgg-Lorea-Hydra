<?php
/**
* Ssend a message action
* 
* @package ElggMessages
*/

$username = get_input('username');

if (!$username) {
	register_error(elgg_echo("messages:find:blank"));
	forward(REFERER);
}

$user = get_user_by_username($username);
if (!$user) {
	register_error(elgg_echo("messages:user:nonexist"));
	forward(REFERER);
}

forward("messages/find/{$user->username}");

<?php
/**
 * Enable selected notification methods for a batch of users
 */

$methods = get_input('methods');
$offset = get_input('offset');

if (empty($methods)) {
	register_error(elgg_echo('notification_tools:error:no_methods'));
	forward(REFERER);
}

$methods = explode(' ', $methods);

$users = elgg_get_entities(array(
    'types' => array('user'),
    'offset' => $offset,
));

foreach ($users as $user) {
	foreach ($methods as $method) {
		$metastring_name = "notification:method:{$method}";
		$user->$metastring_name = true;
	}
}

$result = new stdClass;
$result->count = count($users);
echo json_encode($result);

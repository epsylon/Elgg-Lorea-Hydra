<?php

require_once('openid_server_include.php');
require_once 'lib/session.php';
require_once 'lib/actions.php';

if (elgg_get_viewtype() == 'xrds') {
	echo elgg_view_page($title, $body);
	exit(0);
}

$store = getOpenIDServerStore();

$server =& getServer();

$request = $server->decodeRequest();
setRequestInfo($request);

$action = getAction();
if (!function_exists($action)) {
    $action = 'action_default';
}

$resp = $action();
if (!empty($resp)) {
	writeResponse($resp);
} else {
	echo elgg_view_page($title, $body);
        exit(0);

}
?>

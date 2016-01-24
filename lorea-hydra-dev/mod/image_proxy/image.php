<?php

namespace image_proxy;

error_reporting(0); // we don't want notices etc to break the image data passthrough

// Get DB settings pre 2.0
$settings = dirname(dirname(dirname(__FILE__))) . '/engine/settings.php';
if (!file_exists($settings)) {
	// try from root location
	$settings = dirname(dirname(dirname(__FILE__))) . '/settings.php';
}

if (!file_exists($settings)) {
	header('Content-Type: image/png');
	readfile('graphics/proxyfail.png');
	exit;
}

require_once($settings);

global $CONFIG;

$url = urldecode($_GET['url']);
$token = $_GET['token'];

if ($CONFIG->image_proxy_secret) {
	$site_secret = $CONFIG->image_proxy_secret;
} else {
	$mysql_dblink = @mysql_connect($CONFIG->dbhost, $CONFIG->dbuser, $CONFIG->dbpass, true);
	if ($mysql_dblink) {
		if (@mysql_select_db($CONFIG->dbname, $mysql_dblink)) {
			$result = mysql_query("select name, value from {$CONFIG->dbprefix}datalists where name = '__site_secret__'", $mysql_dblink);
			if ($result) {
				$row = mysql_fetch_object($result);
				while ($row) {
					if ($row->name == '__site_secret__') {
						$site_secret = $row->value;
					}
					$row = mysql_fetch_object($result);
				}
			}

			@mysql_close($mysql_dblink);
		}
	}
}

if (!$site_secret) {
	header('Content-Type: image/png');
	readfile('graphics/proxyfail.png');
	exit;
}

if ($token !== sha1($site_secret . $url)) {
	header('Content-Type: image/png');
	readfile('graphics/proxyfail.png');
	exit;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5); // in seconds
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$headers = curl_exec($ch);

if ($headers === false) {
	// we couldn't get the headers from the remote url
	header('Content-Type: image/png');
	readfile('graphics/proxyfail.png');
	exit;
}

foreach (explode("\r\n", $headers) as $header) {
	header($header);
}

readfile($url);
exit;

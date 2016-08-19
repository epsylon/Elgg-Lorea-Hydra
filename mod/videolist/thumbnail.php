<?php
/**
 * Elgg profile icon cache/bypass
 * 
 * 
 * @package ElggProfile
 */

// Get DB settings
require_once(dirname(dirname(dirname(__FILE__))). '/engine/settings.php');

global $CONFIG;

// won't be able to serve anything if no joindate or guid
if (!isset($_GET['joindate']) || !isset($_GET['guid'])) {
	header("HTTP/1.1 404 Not Found");
	exit;
}

$join_date = (int)$_GET['joindate'];
$owner_guid = (int)$_GET['owner_guid'];
$guid = (int)$_GET['guid'];

$mysql_dblink = @mysql_connect($CONFIG->dbhost, $CONFIG->dbuser, $CONFIG->dbpass, true);
if ($mysql_dblink) {
	if (@mysql_select_db($CONFIG->dbname, $mysql_dblink)) {
		$result = mysql_query("select name, value from {$CONFIG->dbprefix}datalists where name='dataroot'", $mysql_dblink);
		if ($result) {
			$row = mysql_fetch_object($result);
			while ($row) {
				if ($row->name == 'dataroot') {
					$data_root = $row->value;
				}
				$row = mysql_fetch_object($result);
			}
		}

		@mysql_close($mysql_dblink);

		if (isset($data_root)) {

			// this depends on ElggDiskFilestore::makeFileMatrix()
			$user_path = date('Y/m/d/', $join_date) . $owner_guid;

			$filename = "$data_root$user_path/videolist/{$guid}.jpg";
			$size = @filesize($filename);
			if ($size) {
				header("Content-type: image/jpeg");
				header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', strtotime("+6 months")), true);
				header("Pragma: public");
				header("Cache-Control: public");
				header("Content-Length: $size");
				readfile($filename);
				exit;
			}
		}
	}

}

// something went wrong so load engine and try to forward to default icon
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
elgg_log("Profile icon direct failed.", "WARNING");
forward("mod/videolist/graphics/videolist_icon_{$size}.png");

<?php
/**
 * OpenID library loader for consumers
 */

$openid_path = dirname(dirname(__FILE__)) . '/vendors/php-openid/';
$path = ini_get('include_path');
$path = $openid_path . PATH_SEPARATOR . $path;
ini_set('include_path', $path);

require_once 'Auth/OpenID.php';
require_once 'Auth/OpenID/Consumer.php';
require_once 'Auth/OpenID/SReg.php';
require_once 'Auth/OpenID/AX.php';
require_once 'Auth/OpenID/Interface.php';

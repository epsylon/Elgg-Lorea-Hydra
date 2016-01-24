<?php

/**
 * Elgg openid server plugin
 * 
 * @package ElggOpenID
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Kevin Jardine <kevin@radagast.biz>
 * @copyright Curverider Ltd 2008-2009
 * @link http://elgg.com/
 */
 
global $CONFIG;
if (get_include_path())
	set_include_path(get_include_path() . PATH_SEPARATOR . $CONFIG->path . 'mod/openid_api/vendors/php-openid/' . PATH_SEPARATOR . $CONFIG->path . 'mod/openid_server/');
else
	set_include_path($CONFIG->path . 'mod/openid_api/vendors/php-openid/' . PATH_SEPARATOR . $CONFIG->path . 'mod/openid_server/');

elgg_register_event_handler('init','system','openid_server_init',1);

function openid_server_init() {

	global $CONFIG;
	elgg_register_event_handler('login','user','openid_server_handle_login');
	elgg_register_event_handler('logout','user','openid_server_handle_logout');
 
	elgg_set_view_location("openid_server/forms/trust", $CONFIG->path.'mod/openid_server/views/');
    
	$base = elgg_get_plugins_path() . 'openid_server/actions';
	elgg_register_action('openid_server/trust', "$base/trust.php", 'public');

        elgg_extend_view("page/elements/head", "openid_server/metatags");
        elgg_extend_view("xrds/services", "openid_server/service");
        elgg_extend_view("user/default", "openid_server/profile");
}


function openid_server_handle_login($event, $object_type, $object) {
    global $CONFIG;
    
    require_once('openid_server_include.php');
    
    $store = getOpenIDServerStore();
    
    if ($store->getAutoLoginSites()) {    
        forward($CONFIG->wwwroot.'mod/openid_server/actions/autologin.php');
    }
    
    return true;
}

function openid_server_handle_logout($event, $object_type, $object) {
    global $CONFIG;
    
    /*$store = getOpenIDServerStore();
    
    if ($store->getAutoLogoutSites()) {    
        forward($CONFIG->wwwroot.'mod/openid_server/actions/autologout.php');
    }*/
    
    return true;
}

 
?>

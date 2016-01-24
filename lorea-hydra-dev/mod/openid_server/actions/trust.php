<?php

/**
 * Elgg openid_server: handle trust form
 * 
 * @package ElggOpenID
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Kevin Jardine <kevin@radagast.biz>
 * @copyright Curverider Ltd 2008-2009
 * @link http://elgg.org/
 */
 
//error_log("in trust.php");

require_once(dirname(dirname(__FILE__)).'/openid_server_include.php');

require_once ('lib/common.php');
require_once ('lib/session.php');

$info = getRequestInfo();
$trusted = get_input('trust');
$remember = get_input('remember');
$trust_root = get_input('trust_root');

$store = getOpenIDServerStore();
if ($remember) {
      $store->setTrustedSite($info);
      //$store->setTrustedSite($info->trust_root);
}

if (!$info) {
        // There is no authentication information, so bail
        system_message(elgg_echo("openid_server:cancelled"));
        forward();
} else {

    if ($idpSelect = $info->idSelect()) {
        if ($idpSelect) {
	    $identity = getLoggedInUser();
            //$req_url = idURL($idpSelect);
	    $req_url = $info->identity;
	    //XXX fixing dirty https stuff
	    //$req_url = str_replace('http', 'https', $req_url);
        } else {
            $trusted = false;
        }
    } else {
        $req_url = normaliseUsername($info->identity);
    }
    
    
    $user = getLoggedInUser();
    $identity = $user;

    setRequestInfo($info);
    $req_url_path = substr($req_url, strpos($req_url, ":"));
    $user_path = substr($user, strpos($user, ":"));

    if ($info->message->isOpenID1() && $req_url_path != $user_path) {
        register_error(sprintf(elgg_echo("openid_server:loggedin_as_wrong_user"),$req_url, $user));
        forward();
    } else {
        $trust_root = $info->trust_root;
        $trusted = isset($trusted) ? $trusted : isTrusted($identity, $trust_root);
        if ($trusted) {
            setRequestInfo();
            $server =& getServer();
	    if ($info->message->isOpenID1())
	            $response =& $info->answer(true, null, $req_url);
	    else
	            $response =& $info->answer(true, null, getServerURL(), $identity);
            
            addSregFields($response, $info, $identity);
            $webresponse =& $server->encodeResponse($response);
        
            $new_headers = array();
        
            foreach ($webresponse->headers as $k => $v) {
                $new_headers[] = $k.": ".$v;
            }
        
            writeResponse( array($new_headers, $webresponse->body));
	    exit(0);
        } elseif ($fail_cancels) {
            setRequestInfo();
            forward($info->getCancelURL());
        } else {
            writeResponse(trust_render($info));
        }
    }
}

?>

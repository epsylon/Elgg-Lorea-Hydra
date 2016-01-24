<?php

/**
 * Elgg openid_server trust page
 * 
 * @package openid_server
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Kevin Jardiner <kevin@radagast.biz>
 * @copyright Curverider Ltd 2008-2009
 * @link http://elgg.com/
 * 
 * @uses the following values in $vars:
 *
 * 'openid'               the user's OpenID
 * 'trust_root'           the trust root for the OpenID client requesting authentication
 */

$user = elgg_get_logged_in_user_entity();
$openid_trust_root = elgg_extract('openid_trust_root', $vars);

echo '<div>' . elgg_echo('openid_server:trust_question', array($openid_trust_root, elgg_get_site_entity()->name . ":" .  $user->username));

/*echo '<div class="mll">'.elgg_view('input/checkbox', array(
	'name' => 'name',
*/

echo '<div class="elgg-footer">';
echo elgg_view('input/hidden', array('name' => 'trust_root', 'value' => $openid_trust_root));
echo elgg_view('input/submit', array('name' => 'trust', 'value' => elgg_echo('openid_server:confirm_trust')));
echo elgg_view('input/submit', array('name' => 'reject', 'value' => elgg_echo('openid_server:reject_trust')));
echo '</div>';

echo '<div>'.elgg_view('input/checkbox', array('name' => 'remember', 'id' => 'remember', 'checked' => true));
echo '<label for="remember">'.elgg_echo('openid_server:remember_trust') .'</label></div>';

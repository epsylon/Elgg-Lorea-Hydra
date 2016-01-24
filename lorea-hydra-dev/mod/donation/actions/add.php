<?php
/**
 * Elgg Donation plugin
 * @license: GPL v 2.
 * @author slyhne
 * @copyright Tiger Inc I/S
 * @link tiger-inc.eu
 */


// block non-admin users
admin_gatekeeper();
action_gatekeeper();

// Get the user
$user_guid = (int) get_input('guid');
$user = get_user($user_guid);

if (($user instanceof ElggUser) && ($user->canEdit())) {
	$valid_period = elgg_get_plugin_setting('expires', 'donation')*2629743;
	$user->donation = time() + $valid_period;
	system_message(elgg_echo('donation:added'));
	donation_add_to_river($user, 'donation');
} else {
	register_error(elgg_echo('donation:add:error'));
}

forward($_SERVER['HTTP_REFERER']);


<?php
/**
 * Elgg Donation plugin
 * @license: GPL v 2.
 * @author slyhne
 * @copyright Tiger-Inc I/S
 * @link http://tiger-inc.eu
 */

elgg_register_event_handler('init','system','donation_init');


function donation_footer_menu_hook($hook, $type, $return_value, $params) {

        //if (elgg_get_plugin_setting("add_donation_footer_menu_item", "donation") == "yes") {
                $return_value[] = ElggMenuItem::factory(array(
                        "name" => "donations",
                        "text" => elgg_echo("donation"),
                        "href" => "donation"
                ));
        //}

        return $return_value;
}


function donation_init() {

	elgg_extend_view('css/elgg','donation/css');

	// Show donation status on profile
	if (elgg_get_plugin_setting('profile_donation', 'donation') == 'yes' && elgg_in_context('profile')) {
		elgg_extend_view('profile/status', 'donation/profile_donation');
	}
		
	if (elgg_get_plugin_setting('sidebar_donation', 'donation') != 'no') {
		elgg_extend_view('page/elements/sidebar', 'donation/sidebar');
	}

	// Register a page handler, so we can have nice URLs
        elgg_register_page_handler('donation', 'donation_page_handler');

        elgg_register_plugin_hook_handler("register", "menu:footer", "donation_footer_menu_hook");

	if (elgg_is_admin_logged_in()) {

		// user hover menu
		elgg_register_plugin_hook_handler('register', 'menu:user_hover', 'donation_user_hover_menu');

		// register actions
		elgg_register_action("donation/add", elgg_get_plugins_path() . "donation/actions/add.php");

	}

}

function donation_page_handler($page) {
			
	// gatekeeper();

	$title = elgg_echo('donation:title:everyone', array(elgg_get_config('sitename')));

        if (elgg_is_logged_in()) {
	  $content = elgg_view('donation/everyone');
	} else {
          $content = elgg_echo('donation:page1');
        }

	if (elgg_get_plugin_setting('sidebar_donation', 'donation') != 'yes') {
		$sidebar = elgg_view("donation/sidebar");
	}

	$params = array(
		'content' => $content,
		'title' => $title,
		'sidebar' => $sidebar,
	);
	$body = elgg_view_layout('one_sidebar', $params);

	echo elgg_view_page($title, $body);
			
}

// Donations are announced to the river
function donation_add_to_river($user, $type) {
	if (elgg_get_plugin_setting('useriver', 'donation') == 'yes') {
		add_to_river('river/donation/donation',$type, $user->guid, $user->guid);
	}
}

// Add to the user hover menu
function donation_user_hover_menu($hook, $type, $return, $params) {
	$user = $params['entity'];

	$url = "action/donation/add?guid={$user->guid}";
	$url = elgg_add_action_tokens_to_url($url);
	$item = new ElggMenuItem('donation', elgg_echo('donation:add'), $url);
	$item->setSection('admin');
	$return[] = $item;

	return $return;
}

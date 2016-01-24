<?php
/**
 * Collaborative Pages
 *
 * @package PadPages
 *
 */

elgg_register_event_handler('init', 'system', 'pad_pages_init');

/**
 * Init pad plugin.
 */
function pad_pages_init() {
	// Register some libraries of helper functions
	elgg_register_library('pad_pages', elgg_get_plugins_path() . 'pad_pages/lib/pad_pages.php');
	elgg_register_library('pad_pages:etherpad_lite', elgg_get_plugins_path() . 'pad_pages/lib/etherpad_lite.php');

	// Register vendors
	elgg_register_library('vendors:etherpad-lite-client', elgg_get_plugins_path() . 'pad_pages/vendors/etherpad-lite-client/etherpad-lite-client.php');
	elgg_register_js('vendors:etherpad-lite-jquery', 'mod/pad_pages/vendors/etherpad-lite-jquery/js/etherpad.js');

	// Register pad actions
	$action_base = elgg_get_plugins_path() . 'pad_pages/actions/pad_pages';
	elgg_register_action("pages/make-collaborative", "$action_base/make_collaborative.php");
	elgg_register_action("pages/make-non-collaborative", "$action_base/colaborative_undo.php");

	// Override page actions
	$action_base = elgg_get_plugins_path() . 'pad_pages/actions/pages';
	elgg_register_action("pages/edit", "$action_base/edit.php");
	elgg_register_action("pages/delete", "$action_base/delete.php");

}

<?php
/**
 * Elgg demo custom index page plugin
 * 
 */

elgg_register_event_handler('init', 'system', 'custom_index_hydra_init');

function custom_index_hydra_init() {

	// Extend system CSS with our own styles
	elgg_extend_view('css/elgg', 'custom_index_hydra/css');

	// Replace the default index page
	elgg_register_page_handler('', 'custom_index_hydra');
}

/**
 * Serve the front page
 * 
 * @return bool Whether the page was sent.
 */
function custom_index_hydra() {
	if (!include_once(dirname(__FILE__) . "/index.php")) {
		return false;
	}

	return true;
}

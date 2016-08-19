<?php 
/**
 * Start file for the Rounded Avatars plugin
 */

/**
 * Initializes the Rounded Avatars plugin
 * 
 * @return void
 */
function rounded_avatars_init() {
	elgg_extend_view("css/elgg", "css/rounded_avatars.css");
}

elgg_register_event_handler('init', 'system', 'rounded_avatars_init');

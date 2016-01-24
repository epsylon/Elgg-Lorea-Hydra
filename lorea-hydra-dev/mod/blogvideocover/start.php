<?php
/**
 * Blog Video Cover
 *
 * @package Demyx
 * @author Cim
 */

elgg_register_event_handler('init','system','blogvideocover_init');

function blogvideocover_init() {
	// Extend CSS & JS
	elgg_extend_view('css/elgg', 'blogvideocover/css');
	elgg_extend_view('js/elgg', 'blogvideocover/js');

	// Register necessary functions
	elgg_register_action('blogvideocover/save', elgg_get_plugins_path() . 'blogvideocover/actions/save.php');
	elgg_register_action('blogvideocover/delete', elgg_get_plugins_path() . 'blogvideocover/actions/delete.php');
	elgg_register_library('videoconverter', elgg_get_plugins_path() . 'blogvideocover/lib/convert.php');
	elgg_load_library('videoconverter');

	// Extending views to avoid overriding views from core and custom themes/plugins
	elgg_extend_view('forms/blog/save', 'blogvideocover/form', 0);
	elgg_extend_view('object/blog', 'blogvideocover/cover', 0);
	elgg_extend_view('river/object/blog/create', 'blogvideocover/river', 0);
}
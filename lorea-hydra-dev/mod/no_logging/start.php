<?php

/**
 * No Logging for Elgg 1.9 - 1.12 and Elgg 2.X
 *
 * This plugin disables the Elgg system log
 *
 * (C) iionly 2013
 * GNU Public License version 2
 *
 * https://github.com/iionly
 * Contact: iionly@gmx.de
 */

elgg_register_event_handler('init','system','no_logging_init');

function no_logging_init(){

	// disable the system log
	elgg_unregister_event_handler('log', 'systemlog', 'system_log_default_logger');
	elgg_unregister_event_handler('all', 'all', 'system_log_listener');
}
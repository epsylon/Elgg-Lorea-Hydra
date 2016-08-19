<?php
/**
 * Saves plugin settings
 *
 * Input array is in form:
 *   array(
 *     'personal' => array(
 *        'method1',
 *        'method2',
 *     ),
 *     'collection' => array(
 *        'method1',
 *        'method2',
 *        'method3',
 *     ),
 *     'group' => array(
 *        'method3',
 *     ),
 *   )
 *
 * The values get saved as comma separated values in three separate settings:
 *   $plugin->default_personal_methods = 'method1,method2';
 *   $plugin->default_collection_methods = 'method1,method2,method3';
 *   $plugin->default_group_methods = 'method3';
 */

$params = get_input('params');
$plugin_id = get_input('plugin_id');
$plugin = elgg_get_plugin_from_id($plugin_id);

if (!($plugin instanceof ElggPlugin)) {
	register_error(elgg_echo('plugins:settings:save:fail', array($plugin_id)));
	forward(REFERER);
}

$plugin_name = $plugin->getManifest()->getName();

$methods = _elgg_services()->notifications->getMethods();

$types = array(
	'personal',
	'collection',
	'group',
);

foreach ($params as $type => $selected_methods) {
	// Compare available ones and selected ones
	$selected = array_intersect($methods, $selected_methods);

	if ($selected) {
		// Save the methods as a comma separated string
		$result = $plugin->setSetting("default_{$type}_methods", implode(',', $selected));
	} else {
		// Remove value completely
		$plugin->setSetting("default_{$type}_methods", null);
	}
}

system_message(elgg_echo('plugins:settings:save:ok', array($plugin_name)));
forward(REFERER);

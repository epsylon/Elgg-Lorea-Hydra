<?php

/* settings for au group activity 

*/

$plugin = $vars["entity"];


// set default value for member tab visibility
if (!isset($plugin->aga_defaultmembervisibility)) {
	$plugin->aga_defaultmembervisibility = 'yes';
}

// set default value for stats tab visibility
if (!isset($plugin->aga_defaultstatsvisibility)) {
	$plugin->aga_defaultstatsvisibility = 'yes';
}

// set stats tab on
if (!isset($plugin->aga_stats)) {
	$plugin->aga_stats = 'yes';
}

// set members tab on
if (!isset($plugin->aga_members)) {
	$plugin->aga_members = 'yes';
}

// side-wide on/off switch for member tab
echo '<div>';
echo elgg_echo('aga:settings:membertab');
echo ' ';
echo elgg_view('input/dropdown', array(
	'name' => 'params[aga_members]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $plugin->aga_members,
));
echo '</div>';

// default group setting for members tab visibility
echo '<div>';
echo elgg_echo('aga:settings:defaultmembersvisibility');
echo ' ';
echo elgg_view('input/dropdown', array(
	'name' => 'params[aga_defaultmembervisibility]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $plugin->aga_defaultmembervisibility,
));
echo '</div>';


// side-wide on/off switch for stats tab
echo '<div>';
echo elgg_echo('aga:settings:statstab');
echo ' ';
echo elgg_view('input/dropdown', array(
	'name' => 'params[aga_stats]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $plugin->aga_stats,
));
echo '</div>';

// default group setting for stats tab visibility
echo '<div>';
echo elgg_echo('aga:settings:defaultstatsvisibility');
echo ' ';
echo elgg_view('input/dropdown', array(
	'name' => 'params[aga_defaultstatsvisibility]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $plugin->agadefaultstatsvisibility,
));
echo '</div>';
<?php

/**
 * File Takeout plugin user settings
 */

$user = elgg_get_logged_in_user_entity();
$user_guid = $user->getGUID();
$file_takeout_export_type = elgg_get_plugin_user_setting('file_takeout_export_type', $user_guid, 'file_takeout');
$file_takeout_file_meta_export_type = elgg_get_plugin_user_setting('file_takeout_file_meta_export_type', $user_guid, 'file_takeout');

// set default values
if (!isset($file_takeout_export_type)) {
	$file_takeout_export_type = 'html';
}
if (!isset($file_takeout_file_meta_export_type)) {
	$file_takeout_file_meta_export_type = 'html';
}

echo '<div>';
echo elgg_echo('Exportar ficheros en Blogs/Páginas/Marcadores:');
echo ' ';
echo elgg_view('input/dropdown', array(
	'name' => 'params[file_takeout_export_type]',
	'options_values' => array(
		'html' => elgg_echo('html'),
		'aspx' => elgg_echo('aspx'),
		'docx' => elgg_echo('docx'),
	),
	'value' => $file_takeout_export_type,
));
echo '</div>';

echo '<div>';
echo elgg_echo('Exportar metadatos de ficheros:');
echo ' ';
echo elgg_view('input/dropdown', array(
	'name' => 'params[file_takeout_file_meta_export_type]',
	'options_values' => array(
		'html' => elgg_echo('html'),
		'aspx' => elgg_echo('aspx'),
	),
	'value' => $file_takeout_file_meta_export_type,
));
echo '</div>';

?>

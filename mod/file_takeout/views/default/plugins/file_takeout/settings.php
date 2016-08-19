<?php
/**
 * File Takeout plugin settings
 */

// set default value
if (!isset($vars['entity']->file_takeout_site_menu)) {
	$vars['entity']->file_takeout_site_menu = 'no';
}

echo '<div>';
echo '<p>Ésta herramienta te permite llevarte todos tus ficheros al disco duro de tu ordenador, comprimidos en formato ZIP. Puedes usar éste fichero ZIP resultante para salvar tu contenido y restaurarlo si fuera necesario, tanto en la misma red como en otras ;-)</p>';
echo '<p style="font-style: italic;">NOTA: Las habitantes puedes acceder a File Takeout desde la configuración de la página en el menú lateral. Puedes elegir <b>Mostrar en menú</b> a SI para remarcarlo en el menú principal.</p>';
echo elgg_echo('Mostrar en el meńu de la red?');
echo ' ';
echo elgg_view('input/select', array(
	'name' => 'params[file_takeout_site_menu]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $vars['entity']->file_takeout_site_menu,
));
echo '</div>';

?>

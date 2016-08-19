<?php 
	
$plugin = $vars["entity"];


echo '<div>';
echo elgg_echo('gallery_field:enable_blog');
echo ' ';
echo elgg_view('input/select', array(
	'name' => 'params[enable_blog]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $vars['entity']->enable_blog,
));
echo '</div>';

echo '<div>';
echo elgg_echo('gallery_field:enable_pages');
echo ' ';
echo elgg_view('input/select', array(
	'name' => 'params[enable_pages]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $vars['entity']->enable_pages,
));
echo '</div>';


/*
// Map width
$map_width = elgg_view('input/text', array('name' => 'params[map_width]', 'value' => $plugin->map_width));
$map_width .= "<div class='elgg-subtext'>" . elgg_echo('routes:settings:map_width:how') . "</div>";

echo elgg_view_module("inline", elgg_echo('routes:settings:map_width'), $map_width);	

// Map height
$map_height = elgg_view('input/text', array('name' => 'params[map_height]', 'value' => $plugin->map_height));
$map_height .= "<div class='elgg-subtext'>" . elgg_echo('routes:settings:map_height:how') . "</div>";

echo elgg_view_module("inline", elgg_echo('routes:settings:map_height'), $map_height);	        
	*/
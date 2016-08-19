<?php

namespace AU\GroupTagMenu;

// group_tag_menu default settings
// can choose whether defaults to on or off

if (!isset($vars['entity']->tagmenu_defaulton)){
	$vars['entity']->tagmenu_defaulton = 'yes';
}

echo '<div>';
echo elgg_echo('au_group_tag_menu:defaulton').' ';
echo elgg_view('input/dropdown', array(
	'name' => 'params[tagmenu_defaulton]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $vars['entity']->tagmenu_defaulton,
));
echo '</div>';

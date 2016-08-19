<?php

namespace AU\AnonymousComments;

echo '<div class="pas">';
echo "<label>" . elgg_echo("AU_anonymous_comments:setting:add_to_river") . "</label><br>";
echo elgg_view('input/dropdown', array(
	'name' => 'params[add_to_river]',
	'value' => $vars['entity']->add_to_river ? $vars['entity']->add_to_river : 'yes',
	'options_values' => array(
		'yes' => elgg_echo('option:yes'),
		'no' => elgg_echo('option:no')
	)
));
echo '</div>';
<?php
/*
 * 
 */
echo '<h3>'.elgg_echo('tasks:add').'</h3>';
echo elgg_view('input/text', array(
	'name' => 'title',
	'class' => 'elgg-autofocus',
));
echo elgg_view('input/access', array(
	'name' => 'access_id',
	'value' => $vars['list']->access_id,
));
echo elgg_view('input/hidden', array(
	'name' => 'tags',
	'value' => '',
));
echo '<div class="elgg-foot mtm">';
echo elgg_view('input/hidden', array(
	'name' => 'list_guid',
	'value' => $vars['list']->guid,
));
echo elgg_view('input/hidden', array(
	'name' => 'container_guid',
	'value' => $vars['list']->container_guid,
));
echo elgg_view('input/submit', array(
	'value' => elgg_echo('save'),
));
echo elgg_view('output/url', array(
	'text' => elgg_echo('tasks:add:gofull'),
	'href' => "tasks/add/{$vars['list']->guid}",
	'class' => 'elgg-button elgg-button-special'
));
echo '</div>';
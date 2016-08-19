<?php

$container_guid = get_input('container_guid', elgg_get_page_owner_guid());

$entities = elgg_get_entities(array(
	'type' => 'object',
	'subtype' => 'tasklist_top',
	'container_guid' => $container_guid,
	'limit' => 0,
));

if ($entities) {
	$options_values = array();
	foreach ($entities as $entity) {
		$options_values[$entity->guid] = $entity->title;
	}
} else {
	$container_name = get_entity($container_guid)->name;
	$options_values = array(0 => elgg_echo('tasks:owner', array($container_name)));
}

/*echo elgg_view('input/dropdown', array(
	'name' => $vars['name'],
	'options_values' => $options_values,
	'value' => $vars['value'],
));*/
echo elgg_view('input/hidden', array('name' => $vars['name'], 'value' => $vars['value']));

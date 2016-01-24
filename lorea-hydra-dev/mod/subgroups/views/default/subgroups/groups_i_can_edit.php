<?php

if (!elgg_is_logged_in()) {
	exit();
}

$q = sanitise_string(get_input('term'));

// replace mysql vars with escaped strings
$q = str_replace(array('_', '%'), array('\_', '\%'), $q);

$user_guid = elgg_get_logged_in_user_guid();
$entities = elgg_get_entities(array(
	'type' => 'group',
	'owner_guid' => $user_guid,
	'limit' => 0,
));
$entities = array_merge(
	$entities,
	elgg_get_entities_from_relationship(array(
		'type' => 'group',
		'relationship' => 'operator',
		'relationship_guid' => $user_guid,
		'limit' => 0,
	))
);

$all_entities = array();
while (!empty($entities)) {
	$entity = array_pop($entities);
	$childs = elgg_get_entities(array(
		'type' => 'group',
		'container_guid' => $entity->guid,
	));
	foreach ($childs as $child) {
		array_push($entities, $child);
	}
	$all_entities[] = $entity;
}

$results = array();
foreach ($all_entities as $entity) {

	if (!preg_match("/^{$q}/i", $entity->name)) {
		continue;
	}

	$output = elgg_view_list_item($entity, array(
		'use_hover' => false,
		'class' => 'elgg-autocomplete-item',
	));

	$icon = elgg_view_entity_icon($entity, 'tiny', array(
		'use_hover' => false,
	));
	$results[$entity->name . $entity->guid] = array(
		'type' => 'group',
		'name' => $entity->name,
		'desc' => strip_tags($entity->description),
		'guid' => $entity->guid,
		'label' => $output,
		'value' => $entity->guid,
		'icon' => $icon,
		'url' => $entity->getURL(),
	);
}

ksort($results);
header("Content-Type: application/json");
echo json_encode(array_values($results));
exit;

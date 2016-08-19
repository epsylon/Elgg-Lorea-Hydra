<?php
/**
 * Display the latest videolist items
 *
 * Generally used in a sidebar.
 *
 * @uses $vars['container_guid'] The videolist container
 * @uses $vars['limit']          The number of comments to display
 */

$entity_guid = get_input('guid', ELGG_ENTITIES_ANY_VALUE);
$container_guid = elgg_extract('container_guid', $vars, ELGG_ENTITIES_ANY_VALUE);

$container = get_entity($container_guid);

$options = array(
	'container_guid' => $container_guid,
	'limit' => elgg_extract('limit', $vars, 6),
	'type' => 'object',
	'subtypes' => 'videolist_item',
	'full_view' => false,
	'pagination' => false,
    'wheres' => array('guid <> ' . $entity_guid), // exclude this item from list.
);

if($container) {
	$title = elgg_echo('videolist:owner', array($container->name));
} else {
	$title = elgg_echo('videolist');
}

elgg_push_context('gallery');
$content = elgg_list_entities($options);
elgg_pop_context('gallery');

echo elgg_view_module('aside', $title, $content);

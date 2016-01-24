<?php
/**
 * Related groups sidebar
 *
 * @package ElggRelatedGroups
 *
 * @uses $vars['entity'] Group entity
 * @uses $vars['limit']  The number of members to display
 */

$limit = elgg_extract('limit', $vars, 10);

$all_link = elgg_view('output/url', array(
	'href' => 'relatedgroups/owner/' . $vars['entity']->guid,
	'text' => elgg_echo('relatedgroups:more'),
	'is_trusted' => true,
));

$params = array(
	'relationship' => 'related',
	'relationship_guid' => $vars['entity']->guid,
	'limit' => $limit,
	'types' => 'group',
	'list_type' => 'gallery',
	'gallery_class' => 'elgg-gallery-groups',
	'full_view' => false
);

$params['count'] = true;
if(elgg_get_entities_from_relationship($params) == 0) {
	return true;
}
$params['count'] = false;

$body = elgg_list_entities_from_relationship($params);
$body .= "<div class='center mts'>$all_link</div>";

echo elgg_view_module('aside', elgg_echo('relatedgroups'), $body);

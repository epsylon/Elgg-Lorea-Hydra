<?php
/**
 * Subgroups sidebar
 *
 * @package ElggSubgroups
 *
 * @uses $vars['entity'] Group entity
 * @uses $vars['limit']  The number of subgroups to display
 */

$owner = elgg_get_page_owner_entity();

if(!elgg_instanceof($owner, 'group')) {
	return false;
}

$limit = elgg_extract('limit', $vars, 10);

$all_link = elgg_view('output/url', array(
	'href' => 'subgroups/owner/' . $owner->guid,
	'text' => elgg_echo('subgroups:more'),
	'is_trusted' => true,
));

$params = array(
	'type' => 'group',
	'container_guid' => $owner->guid,
	'limit' => $limit,
	'types' => 'group',
	'list_type' => 'gallery',
	'gallery_class' => 'elgg-gallery-groups',
	'full_view' => false
);

$params['count'] = true;
if(elgg_get_entities($params) == 0) {
	return true;
}
$params['count'] = false;

$body = elgg_list_entities($params);
$body .= "<div class='center mts'>$all_link</div>";

echo elgg_view_module('aside', elgg_echo('subgroups'), $body);

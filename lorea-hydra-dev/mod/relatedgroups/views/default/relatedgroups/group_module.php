<?php
/**
 * List related groups on group profile page
 *
 * @package ElggRelatedGroups
 */

$group = elgg_get_page_owner_entity();

if ($group->relatedgroups_enable != "yes") {
	return true;
}

$all_link = elgg_view('output/url', array(
	'href' => "relatedgroups/owner/$group->guid/all",
	'text' => elgg_echo('link:view:all'),
	'is_trusted' => true,
));

$options = array(
	'relationship' => 'related',
	'relationship_guid' => $group->guid,
	'type' => 'group',
	'limit' => 6,
	'full_view' => false,
	'pagination' => false,
);

elgg_push_context('widgets');
$content = elgg_list_entities_from_relationship($options);
elgg_pop_context();

if (!$content) {
	$content = '<p>' . elgg_echo('relatedgroups:none') . '</p>';
}
if($group->canEdit()) {
	$new_link = elgg_view('output/url', array(
		'href' => "relatedgroups/add/$group->guid",
		'text' => elgg_echo('relatedgroups:add'),
		'is_trusted' => true,
	));
} else {
	$new_link = false;
}

echo elgg_view('groups/profile/module', array(
	'title' => elgg_echo('relatedgroups:group'),
	'content' => $content,
	'all_link' => $all_link,
	'add_link' => $new_link,
));

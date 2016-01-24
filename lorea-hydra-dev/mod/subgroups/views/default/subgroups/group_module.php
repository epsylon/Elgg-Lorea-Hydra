<?php
/**
 * List subgroups on group profile page
 *
 * @package ElggSubgroups
 */

$group = elgg_get_page_owner_entity();

if ($group->subgroups_enable != "yes") {
	return true;
}

$all_link = elgg_view('output/url', array(
	'href' => "subgroups/owner/$group->guid/all",
	'text' => elgg_echo('link:view:all'),
	'is_trusted' => true,
));

$options = array(
	'type' => 'group',
	'container_guid' => $group->guid,
	'type' => 'group',
	'limit' => 6,
	'full_view' => false,
	'pagination' => false,
);

elgg_push_context('widgets');
$content = elgg_list_entities($options);
elgg_pop_context();

if (!$content) {
	$content = '<p>' . elgg_echo('subgroups:none') . '</p>';
}
if($group->canEdit()) {
	$new_link = elgg_view('output/url', array(
		'href' => "subgroups/add/$group->guid",
		'text' => elgg_echo('subgroups:add'),
		'is_trusted' => true,
	));
} else {
	$new_link = false;
}

echo elgg_view('groups/profile/module', array(
	'title' => elgg_echo('subgroups:group'),
	'content' => $content,
	'all_link' => $all_link,
	'add_link' => $new_link,
));

<?php

$guid = (int) get_input('group_guid');
$members_search = sanitise_string(get_input('members_search'));

elgg_entity_gatekeeper($guid, 'group');

$group = get_entity($guid);

elgg_set_page_owner_guid($guid);

elgg_group_gatekeeper();

$title = elgg_echo('groups:members:title', array($group->name));

elgg_push_breadcrumb($group->name, $group->getURL());
elgg_push_breadcrumb(elgg_echo('groups:members'));

$db_prefix = elgg_get_config('dbprefix');
$options = [
	'relationship' => 'member',
	'relationship_guid' => $group->guid,
	'inverse_relationship' => true,
	'type' => 'user',
	'limit' => (int) get_input('limit', max(20, elgg_get_config('default_limit')), false),
	'joins' => array("JOIN {$db_prefix}users_entity ue ON e.guid = ue.guid"),
	'order_by' => 'ue.name ASC',
	'no_results' => elgg_format_element('div', ['class' => 'elgg-list'], elgg_echo('notfound'))
];

if (!empty($members_search)) {
	$options['base_url'] = "groups/members/{$guid}?members_search={$members_search}";
	$options['wheres'][] = "(ue.name LIKE '%{$members_search}%' OR ue.username LIKE '%{$members_search}%')";
}

$user_list = elgg_list_entities_from_relationship($options);

if (elgg_is_xhr()) {
	echo $user_list;
	return;
}

$content = elgg_view_form('group_tools/members_search', [
	'action' => "groups/members/{$guid}",
	'disable_security' => true,
]);
$content .= $user_list;

$params = array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
);
$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);
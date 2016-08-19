<?php
/**
 * Elgg questions plugin everyone page
 *
 * @package ElggQuestions
 */

elgg_gatekeeper();
if (!questions_is_expert()) {
	forward('questions/all');
}

// check for a group filter
$group_guid = (int) get_input('group_guid');
if (!empty($group_guid)) {
	$group = get_entity($group_guid);
	if ($group instanceof ElggGroup) {
		// make sure the user is an expert of this group
		if (!questions_is_expert($group)) {
			forward('questions/all');
		}
		$page_owner = $group;
		elgg_push_breadcrumb($group->name, "questions/group/{$group->getGUID()}/all");
	}
}

if (empty($page_owner)) {
	$page_owner = elgg_get_logged_in_user_entity();
}

// set page owner and add breadcrumb
elgg_set_page_owner_guid($page_owner->getGUID());
elgg_push_breadcrumb(elgg_echo('questions:todo'));

// add title button
elgg_register_title_button();

// prepare options
$dbprefix = elgg_get_config('dbprefix');
$correct_answer_id = elgg_get_metastring_id('correct_answer');

$options = [
	'type' => 'object',
	'subtype' => 'question',
	'wheres' => ["NOT EXISTS (
		SELECT 1
		FROM {$dbprefix}entities e2
		JOIN {$dbprefix}metadata md ON e2.guid = md.entity_guid
		WHERE e2.container_guid = e.guid
		AND md.name_id = {$correct_answer_id})",
	],
	'full_view' => false,
	'list_type_toggle' => false,
	'order_by_metadata' => ['name' => 'solution_time'],
	'no_results' => elgg_echo('questions:todo:none'),
];

if ($page_owner instanceof ElggGroup) {
	$options['container_guid'] = $page_owner->getGUID();
} else {
	$site = elgg_get_site_entity();
	$user = elgg_get_logged_in_user_entity();
	$container_where = [];
	
	if (check_entity_relationship($user->getGUID(), QUESTIONS_EXPERT_ROLE, $site->getGUID())) {
		$container_where[] = "(e.container_guid NOT IN (
			SELECT ge.guid
			FROM {$dbprefix}entities ge
			WHERE ge.type = 'group'
			AND ge.site_guid = {$site->getGUID()}
			AND ge.enabled = 'yes'
		))";
	}
	
	$group_options = [
		'type' => 'group',
		'limit' => false,
		'relationship' => QUESTIONS_EXPERT_ROLE,
		'relationship_guid' => $user->getGUID(),
		'callback' => 'questions_row_to_guid'
	];
	$groups = elgg_get_entities_from_relationship($group_options);
	if (!empty($groups)) {
		$container_where[] = '(e.container_guid IN (' . implode(',', $groups) . '))';
	}
	
	$container_where = '(' . implode(' OR ', $container_where) . ')';
	
	$options['wheres'][] = $container_where;
}

$content = elgg_list_entities_from_metadata($options);

$title = elgg_echo('questions:todo');

$body = elgg_view_layout('content', [
	'title' => $title,
	'content' => $content,
	'filter_context' => '',
]);

echo elgg_view_page($title, $body);

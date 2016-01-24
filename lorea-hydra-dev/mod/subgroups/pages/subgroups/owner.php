<?php
/**
 * List of group's subgroups
 *
 * @package ElggSubgroups
 */

elgg_load_library('elgg:subgroups');

// access check for closed groups
group_gatekeeper();

$owner = elgg_get_page_owner_entity();
if (!$owner) {
	forward('groups/all');
}

elgg_register_title_button();

$title = elgg_echo("subgroups:owner", array($owner->name));

elgg_push_breadcrumb(elgg_echo('groups'), "groups/all");
elgg_push_breadcrumb($owner->name, $owner->getURL());
elgg_push_breadcrumb(elgg_echo('relatedgroups'));

// List
$content = list_subgroups($owner);
if (!$content) {
	$content = elgg_echo("subgroups:none");
}

$body = elgg_view_layout('content', array(
	'title' => $title,
	'content' => $content,
	'filter' => '',
));

echo elgg_view_page($title, $body);

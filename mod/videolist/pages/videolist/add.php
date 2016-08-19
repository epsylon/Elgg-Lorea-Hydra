<?php
/**
 * Add a new video
 *
 * @package ElggVideolist
 */

$page_owner = elgg_get_page_owner_entity();

gatekeeper();
group_gatekeeper();

$title = elgg_echo('videolist:add');

// set up breadcrumbs
elgg_push_breadcrumb(elgg_echo('videolist'), "file/all");
if (elgg_instanceof($page_owner, 'user')) {
	elgg_push_breadcrumb($page_owner->name, "videolist/owner/$page_owner->username");
} else {
	elgg_push_breadcrumb($page_owner->name, "videolist/group/$page_owner->guid/all");
}
elgg_push_breadcrumb($title);

// create form
$form_vars = array();
$body_vars = array(
	'container_guid' => $page_owner->guid,
	'access_id' => elgg_instanceof($page_owner, 'user') ? ACCESS_DEFAULT : $page_owner->group_acl,
);

$content = elgg_view_form('videolist/edit', $form_vars, $body_vars);

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
));

echo elgg_view_page($title, $body);

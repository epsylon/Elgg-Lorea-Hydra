<?php
/**
 * Create a new task
 *
 * @package ElggTasks
 */

gatekeeper();

$list_guid = (int) get_input('guid');
$list = get_entity($list_guid);
if (!$list) {
}

if (elgg_instanceof($list, 'object', 'task') || elgg_instanceof($list, 'object', 'tasklist')) {
	$container = $list->getContainerEntity();
	if (!$container) {
		$container = elgg_get_logged_in_user_guid();
	}
} elseif (elgg_instanceof($list, 'user') || elgg_instanceof($list, 'group')) {
	$container = $list;
	// not a real list
	$list_guid = null;
}

elgg_set_page_owner_guid($container->getGUID());

if (elgg_instanceof($container, 'user')) {
	elgg_push_breadcrumb($container->name, "tasks/owner/$container->username/");
} elseif (elgg_instanceof($container, 'group')) {
	elgg_push_breadcrumb($container->name, "tasks/group/$container->guid/all");
}

$title = elgg_echo('tasks:add');
elgg_push_breadcrumb($title);


$vars = task_prepare_form_vars(null, $list_guid);

$content = elgg_view_form('tasks/edit', array(), $vars);

$body = elgg_view_layout('content', array(
	'filter' => '',
	'content' => $content,
	'title' => $title,
));

echo elgg_view_page($title, $body);

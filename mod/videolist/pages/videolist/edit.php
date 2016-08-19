<?php
/**
 * Edit a videolist item
 *
 * @package ElggVideolist
 */

gatekeeper();

$guid = (int) get_input('guid');
$videolist_item = get_entity($guid);
if (!$videolist_item) {
	forward();
}
if (!$videolist_item->canEdit()) {
	forward();
}

$title = elgg_echo('videolist:edit');
$container = get_entity($videolist_item->getContainerGUID());

elgg_push_breadcrumb(elgg_echo('videolist'), "videolist/all");
if(elgg_instanceof($container, 'user')){
	elgg_push_breadcrumb($container->name, "videolist/owner/$container->username/");
} else {
	elgg_push_breadcrumb($container->name, "videolist/group/$container->guid/");
}
elgg_push_breadcrumb($videolist_item->title, $videolist_item->getURL());
elgg_push_breadcrumb($title);

elgg_set_page_owner_guid($container->guid);

$form_vars = array();
$body_vars = array('guid' => $guid);

foreach(array_keys(elgg_get_config('videolist')) as $variable) {
	$body_vars[$variable] = $videolist_item->$variable;
}
$body_vars['container_guid'] = $videolist_item->container_guid;

$content = elgg_view_form('videolist/edit', $form_vars, $body_vars);

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
));

echo elgg_view_page($title, $body);

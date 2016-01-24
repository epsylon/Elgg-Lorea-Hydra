<?php
/**
 * Manage subgroups page
 *
 * @package ElggSubroups
 */

elgg_load_library('elgg:subgroups');

$page_owner = elgg_get_page_owner_entity();
elgg_set_context('groups');

if(!($page_owner instanceof ElggGroup) || !$page_owner->canEdit()){
	forward($page_owner->getURL());
}

elgg_push_breadcrumb(elgg_echo('group'),'groups/all');
elgg_push_breadcrumb($page_owner->name, $page_owner->getURL());

$title = elgg_echo('subgroups:add');
elgg_push_breadcrumb($title);

elgg_register_title_button('subgroups', 'new');

elgg_register_menu_item('title', array(
	'name' => 'add_existing',
	'href' => "#subgroups-add",
	'text' => elgg_echo("subgroups:add_existing"),
	'rel' => 'toggle',
	'link_class' => 'elgg-button elgg-button-action',
	'priority' => 200,
));

$form_vars = array('class' => 'hidden', 'id' => 'subgroups-add');
$body_vars = array('group' => $page_owner);

$content = elgg_view_form('subgroups/add', $form_vars, $body_vars);
$content .= list_subgroups($page_owner);

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => ''
));

echo elgg_view_page($title, $body);

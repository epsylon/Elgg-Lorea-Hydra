<?php

namespace AU\GroupTagMenu;

/**
 * tagmenu display for sidebar
 * @uses container_guid
 */
$group = elgg_get_page_owner_entity();
$user = elgg_get_logged_in_user_entity();
$container = get_input('container_guid');

if (!$group instanceof \ElggGroup) {
	return;
}

if ($group->tag_menu_enable == 'no') {
	return;
}

if ($group->tag_menu_enable != 'yes' && elgg_get_plugin_setting('tagmenu_defaulton', PLUGIN_ID) == 'no') {
	return;
}

$groupname = $group->name;
if (!$group->menu_tags) {
	// use default tags for the group
	if (!$group->menu_maxtags) {
		$maxtags = 10;
	} else {
		$maxtags = $group->menu_maxtags;
	}
	$options = array(
		'container_guids' => $group->guid,
		'types' => 'object',
		'threshold' => 0,
		'limit' => $maxtags,
		'tag_names' => array('tags'),
		'order_by' => 'tag ASC',
	);
	$tags = elgg_get_tags($options);
	// make alphabetical
	sort($tags);
} else {
	//use owner-set tags. Do not sort - need to show in correct order
	$tags = $group->menu_tags;
}

$priority = 10;
elgg_register_menu_item('group_tag_menu', array(
	'name' => 'all',
	'text' => '<strong>' . elgg_echo('au_group_tag_menu:menu') . '</strong>',
	'href' => "group_tag_menu/group/" . $group->guid . "/all",
	'priority' => $priority
));



//  different arrays depending on whether tag cloud or saved menu tags	
if (!$group->menu_tags) {
	//using standard group tags so we have a tag cloud - multi-dimensional array
	foreach ($tags as $key) {
		$priority += 10;
		elgg_register_menu_item('group_tag_menu', array(
			'name' => "tag:{$key->tag}",
			'text' => ' - ' . $key->tag,
			'href' => "group_tag_menu/group/" . $group->guid . "/" . urlencode($key->tag),
			'rel' => 'tag',
			'title' => "{$key->tag} ({$key->total})",
			'priority' => $priority
		));
	}
} else {
	//using menu tags so we just have a simple array of tags to read in
	foreach ($tags as $key) {
		$priority += 10;
		elgg_register_menu_item('group_tag_menu', array(
			'name' => "tag:{$key}",
			'text' => ' - ' . $key,
			'href' => "group_tag_menu/group/" . $group->guid . "/" . urlencode($key),
			'rel' => 'tag',
			'title' => $key,
			'priority' => $priority
		));
	}
}

$body = elgg_view_menu('group_tag_menu', array(
	'class' => 'elgg-menu-owner-block',
	'sort_by' => 'priority'
));

//display the results
echo elgg_view_module('aside', "", $body);

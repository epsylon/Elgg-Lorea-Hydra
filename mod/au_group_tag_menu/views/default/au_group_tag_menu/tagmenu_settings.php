<?php

namespace AU\GroupTagMenu;

/**
 * au_group_tag_menu
 * get settings for the tag menu
 * need the tags themselves
 * to limit results to a specific user's posts
 */

//get current settings
$group = elgg_get_page_owner_entity();

if (!$group instanceof \ElggGroup) {
	return;
}

$title = elgg_echo("au_group_tag_menu:settings");
$body = elgg_view_form('au_group_tag_menu/groups/save_tagmenu', array(), array('entity' => $group));

echo elgg_view_module("info", $title, $body);

//@todo at some point - select specific user, select specific type of post to show


<?php

namespace AU\GroupNotices;

/**
 * au_group_tag_menu
 * get settings for the tag menu
 * need the tags themselves
 * to limit results to a specific user's posts
 */
//get current settings
$group = elgg_get_page_owner_entity();

if (!$group instanceof \ElggGroup || !$group->canEdit()) {
	return;
}

$title = elgg_echo("au_group_notices:settings");
$body = elgg_view_form('au_group_notices/save', array(), array('entity' => $group));

echo elgg_view_module("info", $title, $body);

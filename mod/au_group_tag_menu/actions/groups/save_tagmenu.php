<?php

namespace AU\GroupTagMenu;

//save the tags to be used by tagmenu

$entity = get_entity(get_input('guid'));

if (!$entity instanceof \ElggGroup || !$entity->canEdit()) {
	register_error(elgg_echo('au_group_tag_menu:error:invalid:group'));
	forward(REFERER);
}

$tags = get_input("menu_tags");
//special tag type used for specified tag menu items
$entity->menu_tags = string_to_tag_array($tags);
//save max tags
$entity->menu_maxtags = get_input("menu_maxtags");

system_message(elgg_echo("au_group_tag_menu:save:success"));

forward(REFERER);

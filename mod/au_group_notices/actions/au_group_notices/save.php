<?php

namespace AU\GroupNotices;

//save group notice and location

$guid = get_input("guid");
$entity = get_entity(get_input('guid'));
if (!$entity instanceof \ElggGroup || !$entity->canEdit()) {
	register_error(elgg_echo('au_group_notices:saveerror') . $entity->au_group_notice_position);
	forward(REFERER);
}


$entity->au_group_notice = get_input('au_group_notice');

$contexts = array('blog', 'discussion', 'bookmarks', 'pages', 'file');
foreach ($contexts as $context) {
	$noticepart = "au_group_" . $context . "_notice";
	$entity->{$noticepart} = get_input("{$noticepart}");
}

$entity->au_group_notice_position = get_input('au_group_notice_position');
$entity->au_group_notice_bg = get_input('au_group_notice_bg');
$entity->au_group_notice_border = get_input('au_group_notice_border');
$entity->au_group_notice_corners = get_input('au_group_notice_corners');

system_message(elgg_echo('au_group_notices:saved') . $entity->au_group_notice_position);

forward(REFERER);

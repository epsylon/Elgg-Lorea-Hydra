<?php

namespace AU\LikedContent;

$filter = get_input('filter');

$tabs = array(
	array(
		'title' => elgg_echo('liked_content:user:likes', array(elgg_get_page_owner_entity()->name)), // content the user likes
		'href' => 'liked_content/user/' . elgg_get_page_owner_entity()->username,
		'selected' => !$filter
	),
	array(
		'title' => elgg_echo('liked_content:user:most_liked'), // users content most liked
		'href' => 'liked_content/user/' . elgg_get_page_owner_entity()->username . '?filter=most_liked',
		'selected' => $filter == 'most_liked',
	)
);

echo elgg_view('navigation/tabs', array('tabs' => $tabs));

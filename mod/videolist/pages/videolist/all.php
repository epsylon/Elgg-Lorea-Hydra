<?php
/**
 * All videos
 *
 * @package ElggVideolist
 */

elgg_push_breadcrumb(elgg_echo('videolist'));

elgg_register_title_button();

$limit = get_input("limit", 10);

$title = elgg_echo('videolist:all');

$content = elgg_list_entities(array(
	'types' => 'object',
	'subtypes' => 'videolist_item',
	'limit' => $limit,
	'full_view' => FALSE
));

$sidebar = elgg_view('videolist/sidebar');

elgg_set_context('videolist');
$body = elgg_view_layout('content', array(
	'filter_context' => 'all',
	'content' => $content,
	'title' => $title,
	'sidebar' => $sidebar,
));

// Finally draw the page
echo elgg_view_page($title, $body);

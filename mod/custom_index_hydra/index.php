<?php
/**
 * Elgg custom index page
 * 
 */

elgg_push_context('front');

elgg_push_context('widgets');

$list_params = array(
	'type' => 'object',
	'limit' => 4,
	'full_view' => false,
	'list_type_toggle' => false,
	'pagination' => false,
);

//grab the latest 4 blog posts
$list_params['subtype'] = 'blog';
$blogs = elgg_list_entities($list_params);

//grab the latest bookmarks
$list_params['subtype'] = 'bookmarks';
$bookmarks = elgg_list_entities($list_params);

//grab the latest files
$list_params['subtype'] = 'file';
$files = elgg_list_entities($list_params);

//get the newest members who have an avatar
$newest_members = elgg_list_entities_from_metadata(array(
	'metadata_names' => 'icontime',
	'type' => 'user',
	'limit' => 10,
	'full_view' => false,
	'pagination' => false,
	'list_type' => 'gallery',
	'gallery_class' => 'elgg-gallery-users',
	'size' => 'small',
));

//newest groups
$list_params['type'] = 'group';
unset($list_params['subtype']);
$groups = elgg_list_entities($list_params);

//grab the login form
$login = elgg_view("core/account/login_box");

//grab the latest pages
//$list_params['subtype'] = 'pages';
//$pages = elgg_list_entities($list_params);

//grab the latest market
$list_params['type'] = 'object';
$list_params['subtype'] = 'market';
$market = elgg_list_entities($list_params);

//grab the latest questions
$list_params['type'] = 'object';
$list_params['subtype'] = 'question';
$questions = elgg_list_entities($list_params);

//grab the latest liked
//$list_params['type'] = 'object';
//$list_params['subtype'] = 'like';
//$liked = elgg_list_entities($list_params);

//grab the latest photos
//$list_params['subtype'] = 'photo';
//$photos = elgg_list_entities($list_params);

//grab the latest videolist
$list_params['subtype'] = 'video';
$video = elgg_list_entities($list_params);

//grab the latest poll
$list_params['subtype'] = 'poll';
$poll = elgg_list_entities($list_params);

//grab the latest tasks
//$list_params['subtype'] = 'task';
//$tasks = elgg_list_entities($list_params);

elgg_pop_context();

// lay out the content
$params = array(
	'blogs' => $blogs,
	'bookmarks' => $bookmarks,
	'files' => $files,
	'groups' => $groups,
	'login' => $login,
	'members' => $newest_members,
//      'pages' => $pages,
        'market' => $market,
        'questions' => $questions,
//      'liked' => $liked_content,
//	'photos' => $photos,
        'video' => $video,
	'poll' => $poll,
//	'tasks' => $tasks,

);
$body = elgg_view_layout('custom_index_hydra', $params);

// no RSS feed with a "widget" front page
global $autofeed;
$autofeed = FALSE;

echo elgg_view_page('', $body);

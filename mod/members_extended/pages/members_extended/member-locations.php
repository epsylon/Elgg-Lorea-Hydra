<?php
/**
 * Members Extended search page
 *
 */
 
$group_guid = get_input('group_guid', null);
$query = get_input("q", false);

$display_query = _elgg_get_display_query($query);
$page_title = elgg_echo('members_extended:title:site:search', array($display_query));
if($group_guid){
	$page_title = elgg_echo('members_extended:title:group:search', array($display_query));
}

$limit = get_input("limit");
$offset = get_input("offset");

$options = array();
$options['group_guid'] = $group_guid;
$options['query'] = $query;
$options['type'] = "user";
$options['offset'] = $offset;
$options['limit'] = $limit;

//	$profile_fields = array_keys(elgg_get_config('profile_fields'));
$profile_fields = array('location');
$options['metadata_names'] = $profile_fields;

$results = members_extended_search($options);

$count = $results['count'];
$users = $results['entities'];

if (!empty($users)) {
	$content = elgg_view_entity_list($users, array(
		'count' => $count,
		'offset' => $offset,
		'limit' => $limit,
		'full_view' => false,
		'list_type_toggle' => false,
		'pagination' => true,
	));
} else {
	$content = elgg_echo("notfound");
}

$options = array(
	'title' => $page_title,
	'content' => $content,
//	'sidebar' => elgg_view('members/sidebar'),
);

$body = elgg_view_layout('one_sidebar', $options);

echo elgg_view_page($page_title, $body);
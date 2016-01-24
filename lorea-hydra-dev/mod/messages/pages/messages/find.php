<?php

/**
 * Elgg find messages page
 */
	 
	
// You need to be logged in!
gatekeeper();

// Get the logged in user, you can't see other peoples messages so use session id
$page_owner = elgg_get_logged_in_user_guid();
elgg_set_page_owner_guid($page_owner);

elgg_push_breadcrumb(elgg_echo('messages:find'));
		
// Get offset
$offset = get_input('offset',0);

// Get limit
$limit = elgg_get_plugin_user_setting( "limit", $page_owner, "messages");
if (!$limit) {
	$limit = 15;
}

// Get user to search for
$username = get_input('username');
$user = get_user_by_username($username);

// Get messages with the selected user, this will be all messages where the 'toId' and 'fromId' field matches the guid 
$NameValuePairs[] = array('name' => 'toId', 'operand' => '=', 'value' => $user->guid);
$NameValuePairs[] = array('name' => 'fromId', 'operand' => '=', 'value' => $user->guid);

$query =  array('type' => 'object', 'subtype' => 'messages',
		'limit' => $limit + 1,
		'offset' => $offset,
    		'metadata_name_value_pairs' => $NameValuePairs, 
    		'metadata_name_value_pairs_operator' => 'OR',
		'owner_guid' => $page_owner);

$messages = elgg_get_entities_from_metadata($query);

// Count found messages
$NameValuePairs[] = array('name' => 'toId', 'operand' => '=', 'value' => $user->guid);
$NameValuePairs[] = array('name' => 'fromId', 'operand' => '=', 'value' => $user->guid);

$query =  array('type' => 'object', 'subtype' => 'messages',
		'limit' => $limit + 1,
		'offset' => $offset,
    		'metadata_name_value_pairs' => $NameValuePairs, 
    		'metadata_name_value_pairs_operator' => 'OR',
		'owner_guid' => $page_owner,
		'count' => true,);

$count = elgg_get_entities_from_metadata($query);

// Display them
$body_vars = array(
	'folder' => 'find',
	'messages' => $messages,
	'count' => $count,
	'offset' => $offset,
	'limit' => $limit,
);

$content = elgg_view_form('messages/process', array(), $body_vars);
		
$sidebar = elgg_view('messages/sidebar');

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => sprintf(elgg_echo('messages:find:messages:with'), $user->name),
	'filter' => '',
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);

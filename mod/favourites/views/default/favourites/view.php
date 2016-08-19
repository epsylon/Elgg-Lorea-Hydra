<?php

if (!elgg_is_logged_in()) {
	return;
}

$current_user = elgg_get_logged_in_user_entity();

$fav_options = array('type' => 'object',
                 'annotation_name' => 'favourite',
                 'order_by_annotation' => "n_table.time_created desc",
                 'full_view' => false,
	         'view_type_toggle' => FALSE,
                 'annotation_owner_guid' => $current_user->guid
                );


/*
$fav_options = array(
	'type' => 'object',
        'annotation_names' => array('favourite'),
	//'relationship_guid' => elgg_get_logged_in_user_guid(), 
	//'relationship' => 'flags_content', 
        'annotation_owner_guids' => array($user->guid);
	'full_view' => FALSE, 
	'view_type_toggle' => FALSE, 
);*/

//echo elgg_list_entities_from_relationship($fav_options);
echo elgg_list_entities_from_annotations($fav_options);

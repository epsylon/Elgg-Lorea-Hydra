<?php

elgg_push_context('widgets');

$fav_group_params = array('type' => 'group',
                 'annotation_name' => 'favourite',
                 'order_by_annotation' => "n_table.time_created desc",
                 'full_view' => false,
                 'view_type_toggle' => FALSE,
                 'annotation_owner_guid' => $current_user->guid
                );

$fav_group_params['count'] = true;
if(elgg_get_entities_from_annotations($fav_group_params) == 0) {
	return true;
}
$fav_group_params['count'] = false;

$fav_group_body = elgg_list_entities_from_annotations($fav_group_params);


echo elgg_view_module('aside', elgg_echo('favourites:groups'), $fav_group_body);

<?php

$fav_options = array('type' => 'user',
                 'annotation_name' => 'favourite',
                 'order_by_annotation' => "n_table.time_created desc",
                 'full_view' => false,
                 'view_type_toggle' => FALSE,
                 'annotation_owner_guid' => $current_user->guid
                );

$fav_user_body = elgg_list_entities_from_annotations($fav_options);


if ($fav_user_body) {
  echo elgg_view_module('aside', elgg_echo('favorites:users'), $fav_user_body);
}

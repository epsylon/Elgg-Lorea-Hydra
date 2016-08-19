<?php
/**
 * Action for remove marking as favourite
 *
 */

// Support deleting by id in case we're deleting another user's marking
$id = (int) get_input('id');

$marking = NULL;
if ($id) {
    $marking = elgg_get_annotation_from_id($id);
}

if (!$marking) {
    $annotations = elgg_get_annotations(array(
            'guid' => (int) get_input('guid'),
            'annotation_owner_guid' => elgg_get_logged_in_user_guid(),
            'annotation_name' => 'favourite'));
    $marking = $annotations[0];
}

if ($marking && $marking->canEdit()) {
    $marking->delete();
    system_message(elgg_echo("favourites:deleted"));
    forward(REFERER);
}
else {
    register_error(elgg_echo("favourites:notdeleted"));
    forward(REFERER);
}
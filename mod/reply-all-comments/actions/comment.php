<?php

$entity_guid = (int) get_input('entity_guid');
$comment_text = get_input('generic_comment');

if (empty($comment_text)) {
	register_error(elgg_echo("generic_comment:blank"));
	forward(REFERER);
}

// Let's see if we can get an entity with the specified GUID
$entity = get_entity($entity_guid);
if (!$entity) {
	register_error(elgg_echo("generic_comment:notfound"));
	forward(REFERER);
}

$user = elgg_get_logged_in_user_entity();

$annotation = create_annotation($entity->guid,
								'generic_comment',
								$comment_text,
								"",
								$user->guid,
								$entity->access_id);

// tell user annotation posted
if (!$annotation) {
	register_error(elgg_echo("generic_comment:failure"));
	forward(REFERER);
}

// Get who we need to notify
$to_notify = array($entity->owner_guid);
$annotations = elgg_get_annotations(array(
	'annotation_name' => 'generic_comment',
	'guid' => $entity->guid,
	'limit' => 0,
	'type' => 'object',
));

foreach ($annotations as $a)
    $to_notify[] = $a->owner_guid;
$to_notify = array_unique($to_notify);

foreach ($to_notify as $to_guid) {

// notify if poster wasn't owner

    if ($to_guid != $user->guid) {

            notify_user($to_guid,
                    $user->guid,
                    elgg_echo('generic_comment:email:subject'),
                    elgg_echo('generic_comment:email:body', array(
                            $entity->title,
                            $user->name,
                            $comment_text,
                            $entity->getURL(),
                            $user->name,
                            $user->getURL()
                    ))
            );
    }
    
}

system_message(elgg_echo("generic_comment:posted"));

//add to river
add_to_river('river/annotation/generic_comment/create', 'comment', $user->guid, $entity->guid, "", 0, $annotation);

// Forward to the page the action occurred on
forward(REFERER);

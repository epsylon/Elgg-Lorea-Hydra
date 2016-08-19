<?php

namespace AU\AnonymousComments;

$page = $vars['page'];

$show_hidden = access_get_show_hidden_status();
access_show_hidden_entities(true);

$comment = get_entity($page[1]);
$token = $page[2];

// make sure this is a legit moderated comment
if (!($comment instanceof \ElggComment) || $comment->isEnabled()) {
	forward('', '404');
}

// make sure the token matches
if ($token != get_token($comment)) {
	forward('', '404');
}

$container = $comment->getContainerEntity();

// ok, all checks are passed
$ia = elgg_set_ignore_access();
$comment->delete();
elgg_set_ignore_access($ia);

access_show_hidden_entities($show_hidden);

system_message(elgg_echo('AU_anonymous_comments:deleted'));
forward($container->getURL());
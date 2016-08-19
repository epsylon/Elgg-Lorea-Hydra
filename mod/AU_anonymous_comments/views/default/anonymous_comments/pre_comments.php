<?php

namespace AU\AnonymousComments;

if (!is_moderated($vars['entity'])) {
	return;
}

if (!$vars['entity']->canEdit()) {
	return;
}

// we can edit the entity and it's moderated, lets show disabled comments
elgg_set_config('au_anonymous_comments_hidden', access_get_show_hidden_status());
elgg_set_config('au_anonymous_comments_hidden_set', true);
access_show_hidden_entities(true);
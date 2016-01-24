<?php

namespace AU\AnonymousComments;

/**
 *
 * Presents a comment form to a non-logged in person
 */
// prevent duplication of the view
// there is some bug with the extended view where this will be called multiple times
// use a token counter to make sure that form is only displayed the first time
if (elgg_get_config('anonymous_comments_post_edit')) {
	return;
}
elgg_set_config('anonymous_comments_post_edit', true);


// restore the setting if it was set
$moderating = elgg_get_config('au_anonymous_comments_hidden_set');
if ($moderating) {
	$limit = elgg_extract('limit', $vars, get_input('limit', 25));

	$comments = elgg_get_entities(array(
		'type' => 'object',
		'subtype' => 'comment',
		'container_guid' => $vars['entity']->getGUID(),
		'reverse_order_by' => true,
		'limit' => $limit,
	));

	$disabled = false;
	foreach ($comments as $c) {
		if (!$c->isEnabled()) {
			$disabled = true;
			break;
		}
	}

	if ($disabled) {
		elgg_require_js('anonymous_comments');
		access_show_hidden_entities(elgg_get_config('au_anonymous_comments_access'));

		// add bulk moderation controls
		echo '<div class="moderation-controls">';
		echo elgg_view_form('comments/moderate');
		echo '</div>';
	}
}


if (!$vars['entity']) {
	return;
}

// done with anything logged in at this point
if (elgg_is_logged_in()) {
	return;
}


echo elgg_view_form('comments/anon_add', array(), $vars);

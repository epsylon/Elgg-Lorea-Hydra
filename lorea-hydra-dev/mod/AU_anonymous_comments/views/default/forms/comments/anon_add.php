<?php

namespace AU\AnonymousComments;

$values = elgg_get_sticky_values('comments/anon_add');
elgg_clear_sticky_form('comments/anon_add');

//provide instructions to the user
if (is_moderated($vars['entity'])) {
	echo "<div style=\"clear: both\">" . elgg_echo('AU_anonymous_comments:moderated_notice') . "</div>";
}

echo '<div>';
echo '<label class="required">' . elgg_echo('AU_anonymous_comments:name') . '</label>';
echo elgg_view('input/text', array(
	'name' => 'anon_name',
	'value' => $values['anon_name'],
	'class' => 'AU-anonymous-comments-field'
));
echo '</div>';

echo '<div class="pts">';
echo '<label class="required">' . elgg_echo('AU_anonymous_comments:email') . '</label>';
echo elgg_view('input/email', array(
	'name' => 'anon_email',
	'value' => $values['anon_email'],
	'class' => 'AU-anonymous-comments-field'
));
echo elgg_view('output/longtext', array(
	'value' => elgg_echo('AU_anonymous_comments:email:help'),
	'class' => 'elgg-subtext'
));
echo '</div>';

echo '<div class="pts">';
echo "<label>" . elgg_echo("generic_comments:text") . "</label>";
echo elgg_view('input/longtext', array(
	'name' => 'generic_comment',
	'value' => elgg_echo('AU_anonymous_comments:longtextwarning')
));
echo '</div>';

echo '<div class="elgg-foot">';
echo elgg_view('input/hidden', array(
	'name' => 'entity_guid',
	'value' => $vars['entity']->guid
));

echo elgg_view('input/submit', array('value' => elgg_echo("AU_anonymous_comments:post:comment")));
echo '</div>';

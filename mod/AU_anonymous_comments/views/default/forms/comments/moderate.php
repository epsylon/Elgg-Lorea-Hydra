<?php

namespace AU\AnonymousComments;

echo '<div class="hidden-inputs"></div>';
echo '<label>';
echo elgg_view('input/checkbox', array(
	'class' => 'select-all'
));
echo elgg_echo('AU_anonymous_comments:select:all') . '</label>';

echo elgg_view('input/submit', array(
	'name' => 'review',
	'value' => elgg_echo('AU_anonymous_comments:approve_checked'),
	'class' => 'mlm'
));
echo elgg_view('input/submit', array(
	'name' => 'review',
	'value' => elgg_echo('AU_anonymous_comments:delete_checked'),
	'class' => 'elgg-button elgg-button-delete'
));


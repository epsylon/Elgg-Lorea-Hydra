<?php
/**
 * Messages sidebar
 */

$form = elgg_view_form('messages/find');
$title = elgg_echo('messages:find:title');
echo elgg_view_module('aside', $title, $form);

$settings_form = elgg_view_form('messages/settings');
$settings_title = elgg_echo('messages:settings:title');
echo elgg_view_module('aside', $settings_title, $settings_form);



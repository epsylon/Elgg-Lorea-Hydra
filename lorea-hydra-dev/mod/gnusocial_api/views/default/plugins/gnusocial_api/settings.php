<?php
/**
 * GNUSocial API plugin settings
 */

$instructions = elgg_echo('gnusocial_api:settings:instructions', array(elgg_get_site_url()));

$consumer_key_string = elgg_echo('gnusocial_api:consumer_key');
$consumer_key_view = elgg_view('input/text', array(
	'name' => 'params[consumer_key]',
	'value' => $vars['entity']->consumer_key,
	'class' => 'elgg-input-thin',
));

$consumer_secret_string = elgg_echo('gnusocial_api:consumer_secret');
$consumer_secret_view = elgg_view('input/text', array(
	'name' => 'params[consumer_secret]',
	'value' => $vars['entity']->consumer_secret,
	'class' => 'elgg-input-thin',
));

$sign_on_with_gnusocial_string = elgg_echo('gnusocial_api:login');
$sign_on_with_gnusocial_view = elgg_view('input/select', array(
	'name' => 'params[sign_on]',
	'options_values' => array(
		'yes' => elgg_echo('option:yes'),
		'no' => elgg_echo('option:no'),
	),
	'value' => $vars['entity']->sign_on ? $vars['entity']->sign_on : 'no',
));

$new_users_with_gnusocial = elgg_echo('gnusocial_api:new_users');
$new_users_with_gnusocial_view = elgg_view('input/select', array(
	'name' => 'params[new_users]',
	'options_values' => array(
		'yes' => elgg_echo('option:yes'),
		'no' => elgg_echo('option:no'),
	),
	'value' => $vars['entity']->new_users ? $vars['entity']->new_users : 'no',
));

$post_to_gnusocial = '';
if (elgg_is_active_plugin('thewire')) {
	$post_to_gnusocial_string = elgg_echo('gnusocial_api:post_to_gnusocial');
	$post_to_gnusocial_view = elgg_view('input/dropdown', array(
		'name' => 'params[wire_posts]',
		'options_values' => array(
			'yes' => elgg_echo('option:yes'),
			'no' => elgg_echo('option:no'),
		),
		'value' => $vars['entity']->wire_posts ? $vars['entity']->wire_posts : 'no',
	));
	$post_to_gnusocial = "<div>$post_to_gnusocial_string $post_to_gnusocial_view</div>";
}

$settings = <<<__HTML
<div class="elgg-content-thin mtm"><p>$instructions</p></div>
<div><label>$consumer_key_string</label><br /> $consumer_key_view</div>
<div><label>$consumer_secret_string</label><br /> $consumer_secret_view</div>
<div>$sign_on_with_gnusocial_string $sign_on_with_gnusocial_view</div>
<div>$new_users_with_gnusocial $new_users_with_gnusocial_view</div>
$post_to_gnusocial
__HTML;

echo $settings;

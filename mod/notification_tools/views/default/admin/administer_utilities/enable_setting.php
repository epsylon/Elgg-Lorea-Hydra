<?php
/**
 * Displays a process bar for enabling notifications for all users
 *
 * TODO Add checkboxes for selecting the desired notification methods
 */

$setting = elgg_extract('setting', $vars);
$count = elgg_extract('count', $vars);

$enable_desc = elgg_echo("notification_tools:process:$setting", array($count));

$link = elgg_view('output/url', array(
	'text' => elgg_echo('notification_tools:admin:activate'),
	'href' => false,
	'id' => "enable-$setting",
	'data-operation' => $setting,
	'class' => 'elgg-button elgg-button-action',
));

$form = elgg_view_form('notification_tools/methods', array(
	'data-operation' => $setting,
	'action' => "notification_tools/enable_{$setting}",
));

echo <<<HTML
	<div class="elgg-border-plain pvm phm mvl">
		<p>$enable_desc</p>
		<div class="elgg-progressbar mbm" data-total="$count" id="progressbar-$setting"></div>
		$form
	</div>
HTML;

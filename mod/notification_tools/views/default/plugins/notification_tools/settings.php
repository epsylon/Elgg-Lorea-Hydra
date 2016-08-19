<?php
/**
 * Settings page
 */

// Instructions
$info = elgg_echo('notification_tools:admin:enable:description', array(
	elgg_view('output/url', array(
		'href' => 'admin/administer_utilities/notification_tools',
		'text' => elgg_echo('notification_tools:admin:enable:description_link'),
	))
));

$methods = _elgg_services()->notifications->getMethods();

$types = array(
	'personal' => $methods,
	'collection' => $methods,
	'group' => $methods,
);

$headings = '<th></th>';
foreach ($methods as $method) {
	$headings .= "<th>$method</th>";
}

foreach ($types as $type => $methods) {
	$label = elgg_echo("notification_tools:settings:{$type}");

	$setting_name = "default_{$type}_methods";

	$cells = "<td>{$label}</td>";
	foreach ($methods as $method) {
		$checkbox = elgg_view('input/checkbox', array(
			'name' => "params[{$type}][]",
			'value' => $method,
			'checked' => in_array($method, explode(',', $vars['entity']->$setting_name)),
		));

		$cells .= "<td>$checkbox</td>";
	}
	$rows .= "<tr>{$cells}</tr>";
}

$table = "<table class=\"elgg-table\">{$headings}{$rows}</table>";

echo <<<FORM
	<p>$info</p>
	<div>$table</div>
FORM;

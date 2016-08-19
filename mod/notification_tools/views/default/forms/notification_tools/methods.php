<?php
/**
 *
 */

$methods = _elgg_services()->notifications->getMethods();

$options = array();
foreach ($methods as $method) {
	$options[$method] = $method;
}

$method_input = elgg_view('input/checkboxes', array(
	'name' => 'methods',
	'options' => $options,
));

$submit_input = elgg_view('input/submit', array(

));

echo <<<FORM
	<div>
		$method_input
	</div>
	<div>
		$submit_input
	</div>
FORM;

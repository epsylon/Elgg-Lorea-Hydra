<?php

if (isset($vars['entity'])) {
	$delete_url = 'action/suicide/suicide?guid=' . $vars['entity']->getGUID();
	echo elgg_view('output/confirmlink', array(
		'text' => elgg_echo('suicide:submit'),
		'href' => $delete_url,
		'confirm' => elgg_echo('suicide:confirm'),
		'class' => 'elgg-button elgg-button-delete float-alt',
	));
}

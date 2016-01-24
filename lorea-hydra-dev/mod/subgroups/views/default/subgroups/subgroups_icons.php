<?php
elgg_load_library('elgg:subgroups');

$subgroups = get_subgroups($vars['entity']);
foreach ($subgroups as $subgroup) {
	echo elgg_view('icon/default', array(
		'entity' => $subgroup,
		'size' => 'tiny'
	));
	echo " ";
}

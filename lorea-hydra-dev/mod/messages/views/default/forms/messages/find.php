<?php

/**
 * Elgg find previous messages with user
 */
	 

$find_form = elgg_view('messages/input/userpicker');
$find_form .= elgg_view('input/submit', array('value' => elgg_echo('messages:find')));

echo $find_form;



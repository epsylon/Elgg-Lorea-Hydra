<?php
/**
 * Event river view.
 */

elgg_load_library('elgg:event_calendar');

$object = $vars['item']->getObjectEntity();

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => event_calendar_get_formatted_time($object),
));

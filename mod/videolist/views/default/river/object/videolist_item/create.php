<?php
/**
 * Videolist item river view.
 */

$object = $vars['item']->getObjectEntity();
$thumbnail = elgg_view('icon/object/videolist_item', array(
	'entity' => $object,
	'size' => 'medium',
));

echo elgg_view('river/item', array(
	'item' => $vars['item'],
	'message' => $thumbnail,
));

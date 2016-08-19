<?php
/**
 * File river view.
 */

$object = $vars['item']->getObjectEntity();
$excerpt = strip_tags($object->description);

// Add decrypt option
if (strlen(strstr($excerpt,"U2FsdGVkX1"))>0) {
	$excerpt = '<div id="ID' . $vars['item']->object_guid . '" title="' . $object->description . '">' . thewire_filter($excerpt) . '<blockquote> <a href="javascript:decryptText(\'ID' . $vars['item']->object_guid . '\')">' . elgg_echo("elgg-crypt:decrypt") . '</a></blockquote></div>';
} else {
	$excerpt = thewire_filter($excerpt);
}

$subject = $vars['item']->getSubjectEntity();
$subject_link = elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
	'class' => 'elgg-river-subject',
	'is_trusted' => true,
));

$object_link = elgg_view('output/url', array(
	'href' => "thewire/owner/$subject->username",
	'text' => elgg_echo('thewire:wire'),
	'class' => 'elgg-river-object',
	'is_trusted' => true,
));

$summary = elgg_echo("river:create:object:thewire", array($subject_link, $object_link));

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => $excerpt,
	'summary' => $summary,
));

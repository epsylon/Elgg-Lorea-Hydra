<?php
/**
 * Count of who is participating in a task
 *
 *  @uses $vars['entity']
 */

$guid = $vars['entity']->getGUID();

$list = '';
$num_of_participants = elgg_get_entities_from_relationship(array(
	'relationship' => 'subscribes',
	'relationship_guid' => $guid,
	'inverse_relationship' => true,
	'count' => true,
));
//var_dump($num_of_participants);
if ($num_of_participants) {
	// display the number of participants
	if ($num_of_participants == 1) {
		$participants_string = elgg_echo('tasks:participant', array($num_of_participants));
	} else {
		$participants_string = elgg_echo('tasks:participants', array($num_of_participants));
	}
	$params = array(
		'text' => $participants_string,
		'title' => elgg_echo('tasks:participants:see'),
		'rel' => 'popup',
		'href' => "#tasks-participants-$guid"
	);
	$list = elgg_view('output/url', $params);
	$list .= "<div class='elgg-module elgg-module-popup elgg-tasks-participants hidden clearfix' id='tasks-participants-$guid'>";
	$list .= elgg_list_entities_from_relationship(array(
		'relationship' => 'subscribes',
		'relationship_guid' => $guid,
		'inverse_relationship' => true,
		'limit' => 99,
		'list_class' => 'elgg-list-tasks-participants',
	));
	$list .= "</div>";
	echo $list;
}

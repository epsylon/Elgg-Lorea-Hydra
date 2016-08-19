<?php

elgg_load_library('elgg:tasks');

$entity = $vars['entity'];

$total = tasks_get_entities(array(
	'list_guid' => $vars['entity']->guid,
	'count' => true,
));
$closed = tasks_get_entities(array(
	'list_guid' => $vars['entity']->guid,
	'status' => 'closed',
	'count' => true,
));
$total_link = $entity->getURL()."#all";
// Closed tasks aren't contabilized in graph.
$total -= $closed;

$done = tasks_get_entities(array(
	'list_guid' => $vars['entity']->guid,
	'status' => 'done',
	'count' => true,
));

$remaining = $total - $done;
$remaining_link = $entity->getURL()."#remaining";

$assigned = tasks_get_entities(array(
	'list_guid' => $vars['entity']->guid,
	'status' => array('assigned', 'active'),
	'count' => true,
));
$assigned_link = $entity->getURL()."#assigned";

$active = tasks_get_entities(array(
	'list_guid' => $vars['entity']->guid,
	'status' => 'active',
	'count' => true,
));
$active_link = $entity->getURL()."#active";

if ($total == 0) {
	$percent = 0;
} else {
	$percent = $done / $total * 100;
}

?>

<div>
<div class="tasklist-graph">
	<div style="width:<?php echo $percent.'%'; ?>">&nbsp;</div>
</div>

<?php

echo '<a href="'.$total_link.'">' . elgg_echo('tasks:lists:graph:total', array($total)) . '</a>, ';
echo '<a href="'.$remaining_link.'">' . elgg_echo('tasks:lists:graph:remaining', array($remaining)) . '</a>, ';
echo '<a href="'.$assigned_link.'">' . elgg_echo('tasks:lists:graph:assigned', array($assigned)) . '</a>, ';
echo '<a href="'.$active_link.'">' . elgg_echo('tasks:lists:graph:active', array($active)) . '</a>';

?>

</div>

<?php
/**
 * Task edit form body
 *
 * @package ElggTasks
 */

$variables = elgg_get_config('tasks');
foreach ($variables as $name => $type) {
?>
<div>
<?php
	// dont show label for task lists since for now it's hidden
	if ($type != 'tasks/list') {
?>
	<label><?php echo elgg_echo("tasks:$name") ?></label>
	<?php
		if ($type != 'longtext') {
			echo '<br />';
		}
	}
	?>
	<?php echo elgg_view("input/$type", array(
			'name' => $name,
			'value' => $vars[$name],
		));
	?>
</div>
<?php
}

$cats = elgg_view('categories', $vars);
if (!empty($cats)) {
	echo $cats;
}


echo '<div class="elgg-foot">';
if ($vars['guid']) {
	echo elgg_view('input/hidden', array(
		'name' => 'task_guid',
		'value' => $vars['guid'],
	));
}
echo elgg_view('input/hidden', array(
	'name' => 'container_guid',
	'value' => $vars['container_guid'],
));
echo elgg_view('input/hidden', array(
	'name' => 'list_guid',
	'value' => $vars['list_guid'],
));
// Referers value isn't saved in the task
if ($vars['referer_guid']) {
	echo elgg_view('input/hidden', array(
		'name' => 'referer_guid',
		'value' => $vars['referer_guid'],
	));
}

echo elgg_view('input/submit', array('value' => elgg_echo('save')));

echo '</div>';

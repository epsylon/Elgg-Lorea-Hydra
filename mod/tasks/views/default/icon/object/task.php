<?php
/**
 * Elgg task icon
 *
 * @uses $vars['entity']     The task entity.
 * @uses $vars['size']       The size - tiny, small, medium or large. (medium)
 * @uses $vars['use_hover']  Display the hover menu? (true)
 * @uses $vars['use_link']   Wrap a link around image? (true)
 * @uses $vars['img_class']  Optional CSS class added to img
 * @uses $vars['link_class'] Optional CSS class for the link
 * @uses $vars['href']       Optional override of the link href
 */

$task = elgg_extract('entity', $vars);
$size = elgg_extract('size', $vars, 'medium');
if (!in_array($size, array('topbar', 'tiny', 'small', 'medium', 'large', 'master'))) {
	$size = 'medium';
}

$use_link = elgg_extract('use_link', $vars, true);

if (!elgg_instanceof($task, 'object', 'task')) {
	return true;
}

$title = htmlspecialchars($task->title, ENT_QUOTES, 'UTF-8', false);
$guid = $task->guid;

$img_class = '';
if (isset($vars['img_class'])) {
	$img_class = $vars['img_class'];
}

$use_hover = elgg_extract('use_hover', $vars, $task->canEdit());
if (isset($vars['hover']) ) {
	$use_hover = $vars['hover'];
}

$icon_url = elgg_format_url($task->getIconURL($size));
$icon = elgg_view('output/img', array(
	'src' => $icon_url,
	'alt' => $name,
	'title' => $name,
	'class' => $img_class,
));

?>
<div class="elgg-avatar elgg-task-icon">
<?php

if ($use_hover) {
	
	tasks_register_actions_menu($task);
	
	$params = array(
		'entity' => $task,
		'guid' => $guid,
		'title' => $title,
		'class' => 'elgg-menu-hover',
	);
	echo elgg_view_icon('hover-menu');
	echo elgg_view_menu('tasks_hover', $params);
	
	tasks_reset_actions_menu();
}

if ($use_link) {
	$class = elgg_extract('link_class', $vars, '');
	$url = elgg_extract('href', $vars, $task->getURL());
	echo elgg_view('output/url', array(
		'href' => $url,
		'text' => $icon,
		'is_trusted' => true,
		'class' => $class,
	));
} else {
	echo "<a>$icon</a>";
}
?>
</div>

<?php
/**
 * Displays breadcrumbs.
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['breadcrumbs'] (Optional) Array of arrays with keys 'title' and 'link'
 * @uses $vars['class']
 *
 * @see elgg_push_breadcrumb
 * @override views/default/navigation/breadcrumbs.php
 */

if (isset($vars['breadcrumbs'])) {
	$breadcrumbs = $vars['breadcrumbs'];
} else {
	$breadcrumbs = elgg_get_breadcrumbs();
}


$page_owner = elgg_get_page_owner_entity();

if(elgg_instanceof($page_owner, 'group')) {
	
	// $breadcrumbs[1] should corresponds to group's breadcrumb
	// we'll look for it in crumbs link
	
	$link = $breadcrumbs[1]['link'];
	$guid = (string) $page_owner->guid;
	$alias = $page_owner->alias;

	$title = $breadcrumbs[1]['title'];
	$name = $page_owner->name;

	if(strpos($link, $guid) || $alias && strpos($link, $alias) || !$link && $title == $name) {
		$first_crumb = array_shift($breadcrumbs);
		$container = get_entity($page_owner->container_guid);
		while(elgg_instanceof($container, 'group')) {
			
			// TODO: I should find a better solution for this.
			if(strpos($first_crumb['link'], 'groups') !== false) {
				$container_link = str_replace('all', "profile/$container->guid", $first_crumb['link']);
			} elseif(strpos($first_crumb['link'], 'discussion') !== false) {
				$container_link = str_replace('all', "owner/$container->guid", $first_crumb['link']);
			} else {
				$container_link = str_replace('all', "group/$container->guid", $first_crumb['link']);
			}
			
			$container_link = elgg_trigger_plugin_hook('container_crumb_link', 'breadcrumbs', array('container' => $container, 'first_crumb' => $first_crumb), $container_link);
			
			array_unshift($breadcrumbs, array(
				'title' => $container->name,
				'link' => $container_link,
			));
			$container = get_entity($container->container_guid);
		}
		array_unshift($breadcrumbs, $first_crumb);
	}
}


$class = 'elgg-menu elgg-breadcrumbs';
$additional_class = elgg_extract('class', $vars, '');
if ($additional_class) {
	$class = "$class $additional_class";
}

if (is_array($breadcrumbs) && count($breadcrumbs) > 0) {
	echo "<ul class=\"$class\">";
	foreach ($breadcrumbs as $breadcrumb) {
		if (!empty($breadcrumb['link'])) {
			$crumb = elgg_view('output/url', array(
				'href' => $breadcrumb['link'],
				'text' => $breadcrumb['title'],
				'is_trusted' => true,
			));
		} else {
			$crumb = $breadcrumb['title'];
		}
		echo "<li>$crumb</li>";
	}
	echo '</ul>';
}

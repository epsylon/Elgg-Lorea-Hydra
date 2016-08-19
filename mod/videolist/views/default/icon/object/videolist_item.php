<?php
/**
 * Generic icon view.
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['entity'] The entity the icon represents - uses getIconURL() method
 * @uses $vars['size']   topbar, tiny, small, medium (default), large, master
 * @uses $vars['href']   Optional override for link
 */

//$entity = $vars['entity'];
/* @var ElggObject $entity */

//$sizes = array('small', 'medium', 'large', 'tiny', 'master', 'topbar');
//$img_width = array('tiny' => 25, 'small' => 40, 'medium' => 100, 'large' => 200);

// Get size
//if (!in_array($vars['size'], $sizes)) {
//	$size = "medium";
//} else {
//	$size = $vars['size'];
//}

//if (isset($entity->name)) {
//	$title = $entity->name;
//} else {
//	$title = $entity->title;
//}

//$url = $entity->getURL();
//if (isset($vars['href'])) {
//	$url = $vars['href'];
//}

//$img_src = $entity->getIconURL($vars['size']);
//$img = "<img src=\"$img_src\" alt=\"$title\" width=\"{$img_width[$size]}\" />";

//if ($url) {
//	echo elgg_view('output/url', array(
//		'href' => $url,
//		'text' => $img,
//	));
//} else {
//	echo $img;
//}

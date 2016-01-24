<?php
/**
 * Blog Video Cover
 *
 * @package Demyx
 * @author Cim
 */

$url = get_input('url');
$blog_guid = get_input('guid');
$blog = get_entity($blog_guid);

if ($blog) {
	$blog->videocover = $url;
}
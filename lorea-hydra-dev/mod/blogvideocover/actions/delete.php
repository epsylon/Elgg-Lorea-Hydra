<?php
/**
 * Blog Video Cover
 *
 * @package Demyx
 * @author Cim
 */

$blog_guid = get_input('guid');
$blog = get_entity($blog_guid);

if ($blog) {
	$blog->deleteMetadata('videocover');
}
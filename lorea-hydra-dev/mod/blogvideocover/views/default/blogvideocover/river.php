<?php
/**
 * Blog Video Cover
 *
 * @package Demyx
 * @author Cim
 */

$item = $vars['item'];
$object = $item->getObjectEntity();
$video = $object->videocover;

echo '<div class="blog-video-cover-river">';
if ($video) {
	echo '<a href="'.$object->getURL().'" title="'.$object->title.'"><div style="background-image:url('.blog_video_thumbnail($video, 'medium').')" title="'.$object->title.'"></div></a>';
}
echo '</div>';
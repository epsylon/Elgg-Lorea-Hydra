<?php
/**
 * Blog Video Cover
 *
 * @package Demyx
 * @author Cim
 */

$full = elgg_extract('full_view', $vars, FALSE);
$blog = elgg_extract('entity', $vars, FALSE);
$video = $blog->videocover;

if ($full) {
	if ($video) {
		echo blog_video_player($video);
	}
}
else {
	echo '<div class="blog-video-cover-thumb">';
	if ($video) {
		echo '<a href="'.$blog->getURL().'" title="'.$blog->title.'"><div style="background-image: url('.blog_video_thumbnail($video, 'medium').')" title="'.$blog->title.'"></div></a>';
	}
	echo '</div>';
}
<?php
/**
 * Blog Video Cover
 *
 * @package Demyx
 * @author Cim
 */

$blog = get_entity($vars['guid']);
$vars['entity'] = $blog;

$cover_input = elgg_view('input/text', array(
	'name' => 'blog_video_cover',
	'id' => 'blog_video_cover_id',
	'value' => $blog->videocover,
	'placeholder' => 'Enter YouTube or Vimdeo URL only'
));

$cover_save = elgg_view('output/url', array(
	'href' => '#',
	'id' => 'blog_video_cover_save',
	'text' => 'Save Cover',
	'class' => 'elgg-button elgg-button-action'
));

if ($blog->videocover) {
	$cover_delete = elgg_view('output/url', array(
		'href' => '#',
		'id' => 'blog_video_cover_delete',
		'text' => 'Delete Cover',
		'class' => 'elgg-button elgg-button-delete',
	));
}
else {
	$cover_delete = elgg_view('output/url', array(
		'href' => '#',
		'id' => 'blog_video_cover_delete',
		'text' => 'Delete Cover',
		'class' => 'elgg-button elgg-button-delete',
		'style' => 'display:none'
	));
}

echo <<<___HTML

<div id="blog-video-cover">
	<label>Blog Video Cover</label>
	$cover_input
	<div class="blog-video-cover-buttons">
		$cover_save $cover_delete
	</div>
</div>

___HTML;

<?php
/**
 * Blog Video Cover
 *
 * @package Demyx
 * @author Cim
 */

function blog_video_thumbnail($url, $size) {
	if (fnmatch('*you*', $url)) {
		$thumb = youtube_thumbnail_size();
		parse_str(parse_url($url , PHP_URL_QUERY), $v);
		$v = @$v['v'];
		return 'http://img.youtube.com/vi/'.$v.'/'.$thumb[$size].'.jpg';
	}
	else {
		$thumb = vimeo_thumbnail_size();
		$num = intval(substr($url, strrpos($url, '/') + 1));
		$vimeo = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$num.php"));
		return $vimeo[0][$thumb[$size]];
	}
}

function blog_video_player($url) {
	if (fnmatch('*you*', $url)) {
		parse_str(parse_url($url , PHP_URL_QUERY), $v);
		$v = @$v['v'];
		return '<iframe id="blog-video-cover" type="text/html" width="100%" height="400" src="http://www.youtube.com/embed/'.$v.'?autoplay=0&origin='.$url.'" frameborder="0"/></iframe>';
	}
	else {
		$num = intval(substr($url, strrpos($url, '/') + 1));
		return '<iframe id="blog-video-cover" width="100%" height="400" src="http://player.vimeo.com/video/' . $num . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}
}

function youtube_thumbnail_size($size) {
	$size = array(
		'small' => 'default',
		'medium' => 'mqdefault',
		'large' => 'hqdefault'
	);
	return $size;
}

function vimeo_thumbnail_size($size) {
	$size = array(
		'small' => 'thumbnail_small',
		'medium' => 'thumbnail_medium',
		'large' => 'thumbnail_large'
	);
	return $size;
}
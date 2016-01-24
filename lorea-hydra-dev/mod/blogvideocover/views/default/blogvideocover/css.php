<?php
/**
 * Blog Video Cover
 *
 * @package Demyx
 * @author Cim
 */
?> /*<style>*/

.blog-video-cover-thumb div, .blog-video-cover-river div {
	float: right;
	width: 150px;
	height: 150px;
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
	margin-top: 10px;
	margin-left: 10px;
}
.blog-video-cover-buttons {
	margin: 10px 0;
}

@media screen and (max-width: 1024px) {
	iframe#blog-video-cover {
		height: 200px;
	}
	.blog-video-cover-thumb div, .blog-video-cover-river div {
		float: none;
		width: 100%;
		height: 200px;
		margin-left: 0;
	}
}
<?php
/**
 * Elgg Search css
 * 
 * @override mod/search/views/default/search/css.php
 */
?>

/**********************************
Search plugin
***********************************/
.elgg-search-header {
	width: 24%;
	position: absolute;
	right: 0;
    bottom: 10px;
    margin-top: 0;
}
.elgg-search input[type=submit] {
	display: none;
}
.elgg-search input[type=text], .elgg-search input[type=search] {
	margin-top: 13px;
	border: 0;
	background: #333 url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 5px -915px;
    color: #EEE;
    padding-bottom: 2px;
    padding-left: 25px;
    padding-top: 2px;
	font-size: 1em;
	width: 235px;
	box-shadow: none;
}

.search-list li {
	padding: 5px 0 0;
}
.search-heading-category {
	margin-top: 20px;
	color: #666666;
}

.search-highlight {
	background-color: #FFF01C;
}
.search-highlight-color1 {
	background-color: #FFF01C;
}
.search-highlight-color2 {
	background-color: #BFF553;
}
.search-highlight-color3 {
	background-color: #F062A4;
}
.search-highlight-color4 {
	background-color: #ccc;
}
.search-highlight-color5 {
	background-color: #4690d6;
}

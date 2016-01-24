<?php
/**
 * Page Layout
 *
 * Contains CSS for the page shell and page layout
 *
 * Default layout: 990px wide, centered. Used in default page shell
 *
 * @package Elgg.Core
 * @subpackage UI
 * @override views/default/css/elements/layout.php
 */
?>

/* ***************************************
	PAGE LAYOUT
*************************************** */

body {
	background-color: #eeeeee;
}

/***** DEFAULT LAYOUT ******/
<?php // the width is on the page rather than topbar to handle small viewports ?>
.elgg-page-default {
	min-width: 998px;
}
.elgg-page-default .elgg-page-header > .elgg-inner {
	min-width: 980px;
	margin: 0 auto;
	height: 90px;
}
.elgg-page-default .elgg-page-body > .elgg-inner {
	min-width: 980px;
	margin: 0 auto;
}
.elgg-page-default .elgg-page-footer > .elgg-inner {
	min-width: 940px;
	margin: 0 auto;
	padding: 5px 20px;
	border-top: 1px solid #DEDEDE;
}

/***** TOPBAR ******/
.elgg-page-topbar {
	background-color: #333333;
	position: relative;
	height: 24px;
	z-index: 9000;
	position: fixed;
	width: 100%;
}
.elgg-page-topbar > .elgg-inner {
	padding: 0 10px;
}

/***** PAGE MESSAGES ******/
.elgg-system-messages {
	position: fixed;
	top: 24px;
	right: 20px;
	max-width: 500px;
	z-index: 2000;
}
.elgg-system-messages li {
	margin-top: 10px;
}
.elgg-system-messages li p {
	margin: 0;
}

/***** PAGE HEADER ******/
.elgg-page-header {
	position: relative;
	background: #333333;
	padding-top: 24px;
}
.elgg-page-header > .elgg-inner {
	position: relative;
	background: transparent url(<?php echo elgg_get_site_url(); ?>mod/n1_theme/_graphics/n1_small.png) no-repeat 650px bottom;
}

/***** LIQUID LAYOUT *******/

.elgg-page-body .elgg-inner {
	position: relative;	/* This fixes the IE7 overflow hidden bug */
	clear: both;
	overflow: hidden;	/* This chops off any overhanging divs */
	background-color: #dedede;
}
.elgg-layout {
	background-color: #eee;
	float: left;
	position: relative;
	min-height: 500px;
}
.elgg-layout-one-sidebar {
	right: 25%;
}
.elgg-sidebar {
	left: 31%;
	width: 21%;
	padding: 20px;
}
.elgg-sidebar-alt {
	position: relative;
	padding: 20px 10px;
	float: left;
	width: 160px;
	margin: 0 10px 0 0;
}
.elgg-main {
	left: 2%;
	width: 96%;
}
.elgg-layout-one-sidebar .elgg-main {
	left: 27%;
	width: 71%;
}
.elgg-main > .elgg-head {
	padding-bottom: 3px;
	margin-bottom: 10px;
}

.elgg-main, .elgg-sidebar {
	float: left;
	position: relative;
	padding: 1em 0 1em 0;
	overflow: hidden;
}

/***** PAGE FOOTER ******/
.elgg-page-footer {
	clear:both;
	float:left;
	width:100%;
}
.elgg-page-footer {
	color: #999;
}
.elgg-page-footer .elgg-inner {
	margin: 20px;
}
.elgg-page-footer a:hover {
	color: #666;
}

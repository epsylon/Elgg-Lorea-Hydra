<?php
/**
 * CSS typography
 *
 * @package Elgg.Core
 * @subpackage UI
 * @override views/default/css/elements/typography.php
 */
?>

/* ***************************************
	Typography
*************************************** */
@font-face {
	font-family: "Open Sans";
	font-style: normal;
	font-weight: 400;
	src: url("<?php echo elgg_get_site_url(); ?>/mod/n1_theme/vendors/opensans/OpenSans-Regular.ttf");
}

@font-face {
	font-family: "Open Sans";
	font-style: bold;
	src: url("<?php echo elgg_get_site_url(); ?>/mod/n1_theme/vendors/opensans/OpenSans-Semibold.ttf");
	font-weight: 600;
}

@font-face {
	font-family: "Open Sans";
	font-style: italic;
	src: url("<?php echo elgg_get_site_url(); ?>/mod/n1_theme/vendors/opensans/OpenSans-Italic.ttf");
	font-weight: 400;
}


body {
	font-size: 72%;
	line-height: 1.4em;
	font-family: "Open Sans", Arial, Tahoma, Verdana, sans-serif;
	color: #333333;
}

a {
	color: #ff4c12;
}

a:hover,
a.selected { <?php //@todo remove .selected ?>
	color: #555555;
	text-decoration: underline;
}

p {
	margin-bottom: 15px;
}

p:last-child {
	margin-bottom: 0;
}

pre, code {
	font-family: Monaco, "Courier New", Courier, monospace;
	font-size: 12px;
	padding:2px;
	
	background-color:#333;
	color:#eee;
	overflow:auto;
	/*box-shadow: 1px 1px 1px #333;*/

	overflow-x: auto; /* Use horizontal scroller if needed; for Firefox 2, not needed in Firefox 3 */

	white-space: pre-wrap;
	word-wrap: break-word; /* IE 5.5-7 */
	
}

pre {
	padding:3px 15px;
	margin:0px 0 15px 0;
	line-height:1.3em;
}

code {
	padding:2px 3px;
}

.elgg-monospace {
	font-family: Monaco, "Courier New", Courier, monospace;
}

blockquote {
	line-height: 1.3em;
	padding:10px 20px 10px 10px;
	margin:5px 5px 15px 20px;
	background: #E6D37E url(<?php echo elgg_get_site_url(); ?>mod/n1_theme/_graphics/quotes.png) no-repeat right;
	border:none;
	box-shadow: 0px 1px 3px #666;
	
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
}

h1, h2, h3, h4, h5, h6 {
	color: #333;
	font-weight: bold;
}

h1 { font-size: 2em; visibility: hidden;}
h2 { font-size: 1.8em; line-height: 1.1em; padding-bottom:5px}
h3 { font-size: 1.2em; }
h4 { font-size: 1.0em; }
h5 { font-size: 0.9em; }
h6 { font-size: 0.8em; }

.elgg-heading-site, .elgg-heading-site:hover {
	font-size: 2em;
	line-height: 1.4em;
	color: white;
	font-style: italic;
	font-family: Georgia, times, serif;
	text-shadow: 1px 2px 4px #333333;
	text-decoration: none;
}

.elgg-heading-main {
	float: left;
	max-width: 530px;
	margin-right: 10px;
}
.elgg-heading-basic {
	color: #616068;
	font-size: 1.2em;
	font-weight: bold;
}

.elgg-subtext {
	color: #666666;
	font-size: 85%;
	line-height: 1.2em;
	font-style: italic;
}

.elgg-text-help {
	display: block;
	font-size: 85%;
	font-style: italic;
	padding: 10px 0px 10px 0px;
}

.elgg-quiet {
	color: #666;
}

.elgg-loud {
	color: #d86c2c;
}

/* ***************************************
	USER INPUT DISPLAY RESET
*************************************** */
.elgg-output {
	margin-top: 10px;
	line-height: 1.7em;
}

.elgg-output dt { font-weight: bold }
.elgg-output dd { margin: 0 0 1em 1em }

.elgg-output ul, .elgg-output ol {
	margin: 0 1.5em 1.5em 0;
	padding-left: 1.5em;
}
.elgg-output ul {
	list-style-type: disc;
}
.elgg-output ol {
	list-style-type: decimal;
}
.elgg-output table {
	border: 1px solid #ccc;
}
.elgg-output table td {
	border: 1px solid #ccc;
	padding: 3px 5px;
}
.elgg-output img {
	max-width: 100%;
}

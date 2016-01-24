<?php
/**
 * CSS buttons
 *
 * @package Elgg.Core
 * @subpackage UI
 * @override views/default/css/elements/buttons.php
 */
?>
/* **************************
	BUTTONS
************************** */

/* Base */
.elgg-button {
	font-size: 13px;
	font-weight: bold;
	
	width: auto;
	padding: 4px 15px;
	cursor: pointer;
	border: 1px solid #bbb;
	outline: none;
	color: #666;
	text-decoration: none;
	
	box-shadow: 0px 1px 1px #888;
	
	
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;


	background: #eeeeee; /* Old browsers */
	background: -moz-linear-gradient(top, #eeeeee 0%, #cccccc 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eeeeee), color-stop(100%,#cccccc)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #eeeeee 0%,#cccccc 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #eeeeee 0%,#cccccc 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #eeeeee 0%,#cccccc 100%); /* IE10+ */
	background: linear-gradient(to bottom, #eeeeee 0%,#cccccc 100%); /* W3C */
}
.elgg-button:hover {
	background: #dbdbdb; /* Old browsers */
	background: -moz-linear-gradient(top, #dbdbdb 0%, #b7b7b7 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#dbdbdb), color-stop(100%,#b7b7b7)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #dbdbdb 0%,#b7b7b7 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #dbdbdb 0%,#b7b7b7 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #dbdbdb 0%,#b7b7b7 100%); /* IE10+ */
	background: linear-gradient(to bottom, #dbdbdb 0%,#b7b7b7 100%); /* W3C */
}

a.elgg-button {
	text-decoration: none;
}

/* Submit: This button should convey, "you're about to take some definitive action" */
.elgg-button-submit {
	color: #ddd;
	text-shadow: 0 -1px 0px #000;
	box-shadow: 0px 1px 2px #333;
	border: none;

	background: #444444; /* Old browsers */
	background: -moz-linear-gradient(top, #444444 0%, #000000 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#444444), color-stop(100%,#000000)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #444444 0%,#000000 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #444444 0%,#000000 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #444444 0%,#000000 100%); /* IE10+ */
	background: linear-gradient(to bottom, #444444 0%,#000000 100%); /* W3C */

}

.elgg-button-submit:hover {
	color: #eee;
	text-shadow: 0 1px 1px #222;
	
	background: #6b6b6b; /* Old browsers */
	background: -moz-linear-gradient(top, #6b6b6b 1%, #0f0f0f 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#6b6b6b), color-stop(100%,#0f0f0f)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #6b6b6b 1%,#0f0f0f 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #6b6b6b 1%,#0f0f0f 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #6b6b6b 1%,#0f0f0f 100%); /* IE10+ */
	background: linear-gradient(to bottom, #6b6b6b 1%,#0f0f0f 100%); /* W3C */

}

.elgg-button-submit.elgg-state-disabled {
	background: #45484d;
	color: #888;
	cursor: default;
}

/* Cancel: This button should convey a negative but easily reversible action (e.g., turning off a plugin) */
.elgg-button-cancel {
	color: #888;
}
.elgg-button-cancel:hover {
	color: #BA1C1C;
}

/* Action: This button should convey a normal, inconsequential action, such as clicking a link */
.elgg-button-action {
	color: #ddd;
	text-shadow: 0 -1px 0px #000;
	border: none;
	

	
	background: #444444; /* Old browsers */
	background: -moz-linear-gradient(top, #444444 0%, #000000 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#444444), color-stop(100%,#000000)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #444444 0%,#000000 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #444444 0%,#000000 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #444444 0%,#000000 100%); /* IE10+ */
	background: linear-gradient(to bottom, #444444 0%,#000000 100%); /* W3C */
}

.elgg-button-action:hover,
.elgg-button-action:focus {
	color: #eee;
		
	background: #6b6b6b; /* Old browsers */
	background: -moz-linear-gradient(top, #6b6b6b 1%, #0f0f0f 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#6b6b6b), color-stop(100%,#0f0f0f)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #6b6b6b 1%,#0f0f0f 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #6b6b6b 1%,#0f0f0f 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #6b6b6b 1%,#0f0f0f 100%); /* IE10+ */
	background: linear-gradient(to bottom, #6b6b6b 1%,#0f0f0f 100%); /* W3C */

	
}


.elgg-button-action.elgg-state-disabled {
	background: #45484d;
	color: #888;
	cursor: default;
}

/* Delete: This button should convey "be careful before you click me" */
.elgg-button-delete {
	color: #d36900;
	text-shadow: 0 -1px 0px #111;
	border: none;

	background: #45484d; /* Old browsers */
	background: -moz-linear-gradient(top, #45484d 0%, #000000 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#45484d), color-stop(100%,#000000)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #45484d 0%,#000000 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #45484d 0%,#000000 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #45484d 0%,#000000 100%); /* IE10+ */
	background: linear-gradient(to bottom, #45484d 0%,#000000 100%); /* W3C */
}
.elgg-button-delete:hover {
	color: #d36900;

	bbackground: #6b6b6b; /* Old browsers */
	background: -moz-linear-gradient(top, #6b6b6b 1%, #0f0f0f 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#6b6b6b), color-stop(100%,#0f0f0f)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #6b6b6b 1%,#0f0f0f 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #6b6b6b 1%,#0f0f0f 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #6b6b6b 1%,#0f0f0f 100%); /* IE10+ */
	background: linear-gradient(to bottom, #6b6b6b 1%,#0f0f0f 100%); /* W3C */
	text-decoration: none;
}

.elgg-button-delete .elgg-state-disabled {
	color: #d36900;
	background-color: #333;
	text-shadow: 0 -1px 0px #111;
	border: 1px solid #999;
}
.elgg-button-delete .elgg-state-disabled:hover {
	color: #d36900;
	background-color: #333;
	text-shadow: 0 -1px 0px #111;
	border: 1px solid #999;
}
.elgg-button-dropdown {
	padding:3px 6px;
	text-decoration:none;
	display:block;
	font-weight:normal;
	position:relative;
	margin-left:0;
	color: #333;
	border:1px solid #333;
	
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	border-radius:4px;
	
	-webkit-box-shadow: 0 0 0;
	-moz-box-shadow: 0 0 0;
	box-shadow: 0 0 0;
	
	/*background-image:url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png);
	background-position:-150px -51px;
	background-repeat:no-repeat;*/
}

.elgg-button-dropdown:after {
	content: " \25BC ";
	font-size:smaller;
}

.elgg-button-dropdown:hover {
	color: #333;
	background-color: #d86c2c;
	text-decoration:none;
}

.elgg-button-dropdown.elgg-state-active {
	background: #ccc;
	outline: none;
	color: #333;
	border:1px solid #ccc;
	
	-webkit-border-radius:4px 4px 0 0;
	-moz-border-radius:4px 4px 0 0;
	border-radius:4px 4px 0 0;
}

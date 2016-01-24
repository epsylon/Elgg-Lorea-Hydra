.profile-content-menu a {
	background-color: transparent;
}

.profile-admin-menu-wrapper {	
	background-color: #eee;
	
}

.profile-admin-menu-wrapper a:hover {
	background-color: #333;
	color: #eee;
	text-decoration: none;
	
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

.profile-admin-menu-wrapper li a {
	background: none;
	color: #333;
}

#profile-details h2 {
	font-weight: bold;
}

.messages-new {
	background-color: #FF4C12;
	border-radius: 10px;
	box-shadow: -2px 2px 4px rgba(0, 0, 0, 0.5);
	color: black;
	font-size: 10px;
	font-weight: bold;
	height: 16px;
	left: 20px;
	min-width: 16px;
	position: absolute;
	text-align: center;
	top: 12px;
}

.elgg-access, .elgg-input-access > option {
	padding-left: 19px;
	background-image: url('<?php echo elgg_get_site_url(); ?>mod/n1_theme/_graphics/privacy.png');
	background-repeat: no-repeat;
}

.elgg-access {
	padding-top: 1px;
	padding-bottom: 1px;
}

.elgg-access-private, .elgg-input-access > option[value="<?php echo ACCESS_PRIVATE; ?>"] {
	background-position: 0 -65px;
}

.elgg-access-friends, .elgg-input-access > option[value="<?php echo ACCESS_FRIENDS; ?>"] {
	background-position: 0 -51px;
}

.elgg-access-loggedin, .elgg-input-access > option[value="<?php echo ACCESS_LOGGED_IN; ?>"] {
	background-position: 0 -34px;
}

.elgg-access-public, .elgg-input-access > option[value="<?php echo ACCESS_PUBLIC; ?>"] {
	background-position: 0 -16px;
}

.elgg-access-group, .elgg-input-access > option {
	background-position: 0 0;
}

.file-photo {
	margin-top: 15px;
}

.tasklist-graph {
	border: 1px solid #bbb;
}

.tasklist-graph div {
	background-color: #444;
}

.elgg-task-icon {
	box-shadow: none;
}

.treeview a.selected {
	background-color: transparent !important;
}

.tidypics-heading {
	color: #FF4C12;	
}

.tidypics-heading:hover {
	color: #333;
}

.tidypics-gallery .elgg-head {
	margin: 10px;
}

#cboxTitle, #cboxTitle h3, #cboxCurrent {
	color: #000;
}
#cboxTitle h3 {
	font-weight: bold;
	font-size: 160%;
}
#cboxOverlay {
	background-color: #FFF;
	opacity: 0.6 !important;
}
.event-calendar-lightbox {
	padding: 5px;
}

.groups-profile-icon {
	height: 201px;
	border: 2px solid #F1F1F1;
	box-shadow: 0px 1px 3px #666;
}

.elgg-page .cke_skin_BootstrapCK-Skin .cke_contents, .cke_skin_BootstrapCK-Skin .cke_contents iframe {
	background-color: #F7F7F7 !important;
	border: none !important;
}

/* BeeChat */
div#beechat_contacts_top {
    background-color: #333333;
}

div.beechat_chatbox_top {
    background-color: #333333;
}

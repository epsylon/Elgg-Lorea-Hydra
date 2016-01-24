<?php
/**
 * Elgg Messages CSS
 * 
 * @package ElggMessages
 */
?>

.messages-container {
	min-height: 200px;
}
a.message-unread {
	font-weight: bold;
	font-style: italic;
}
td.message-unread {
	background-color: #999;
}
.messages-buttonbank {
	text-align: right;
}
.messages-buttonbank input {
	margin-left: 10px;
}

/*** message metadata ***/
.messages-head {
	background: #EEE;
	border: 1px solid #666;
	padding: 5px 0 0 10px;
	-webkit-box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.45);
	-moz-box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.45);
	box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.45);
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
}
.messages-head-info {
	margin-left: 10px;
}
.messages-body {
	background: white;
	border: 1px solid #666;
	-webkit-box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.45);
	-moz-box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.45);
	box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.45);
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	padding: 5px;
	overflow: hidden;
	margin-bottom: 20px;
}
/*** topbar icon ***/
.messages-new {
	color: white;
	background-color: red;
	
	-webkit-border-radius: 10px; 
	-moz-border-radius: 10px;
	border-radius: 10px;
	
	-webkit-box-shadow: -2px 2px 4px rgba(0, 0, 0, 0.50);
	-moz-box-shadow: -2px 2px 4px rgba(0, 0, 0, 0.50);
	box-shadow: -2px 2px 4px rgba(0, 0, 0, 0.50);
	
	position: absolute;
	text-align: center;
	top: 0px;
	left: 26px;
	min-width: 16px;
	height: 16px;
	font-size: 10px;
	font-weight: bold;
}

/*** message table styles ***/
.msg-list-attachment {
	width: 3%;
}
.msg-list-owner {
	width: 20%;
}
.msg-list-subject {
	width: 45%;
}
.msg-list-timestamp {
	width: 20%;
}
.msg-list-delete {
	width: 8%;
}
.messages-warning {
	font-weight: bold;
	line-height: 1.3em;
	padding:3px 15px;
	margin:0px 0 15px 0;
	background:#ffbd00;
	border:none;
	
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
}
.messages-error {
	font-weight: bold;
	line-height: 1.3em;
	padding:3px 15px;
	margin:0px 0 15px 0;
	color:white;
	background:red;
	border:none;
	
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
}
/*** message send popup ***/
.messages-popup-wrapper {
	min-width: 350px;
	min-height: 550px;

}
/*** edittags input css ***/
/*
input[type=text].messages-tagsfield {
	display: none;
	-webkit-appearance: none;
	border: 1px solid #4690d6;
	color: #333;
	font-size: 12px;
	width: 250px;
	padding: 0px 4px 2px 2px;
}
input[type=text].messages-tagsfield:focus,
input[type=text].messages-tagsfield:active,
input[type=text].messages-tagsfield:hover {
	background-position: 2px -1242px;
}
*/
.messages-label-links {

}
.messages-label-editlink {
	cursor: pointer;
	float: left;
	height: 20px;
}

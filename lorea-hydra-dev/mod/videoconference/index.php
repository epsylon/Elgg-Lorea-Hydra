<?php
    // Load Elgg engine
    include_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
 
    // set the title
    $title = "Video Conferencia:";
	 
    // start building the main column of the page
    $area1 = elgg_view_title($title);
 
    // Add the form to this section
    $area1 .= elgg_view("videoconference/start");	
 
    // layout the page
    $body = elgg_view_layout('one_column', $area1);
 
    // draw the page
    page_draw($title, $body);
?>

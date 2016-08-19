<?php
/* au group activity tabs

* adds tabs to show ingroup, out of group activities for members
* and per-member activity, and general activity stats

*/

require_once(dirname(__FILE__) . "/lib/functions.php");
require_once(dirname(__FILE__) . "/lib/hooks.php");


function aga_init() {
  	
  //activity page - replaces the default for groups with one offering more control
  	elgg_register_page_handler('group_activity_plus','aga_page_handler');
  
 //intercept pagesetup so that we can get the group ID
 	elgg_register_event_handler('pagesetup','system','aga_menu_setup');   
 	
 //allow group admins to control visibility of stats page (default determined by admin setting)
 	if (elgg_get_plugin_setting('aga_defaultstatsvisibility')=='yes'){$truefalse=true;}else{$truefalse=false;}
 	add_group_tool_option("aga_stats",elgg_echo("aga:statsenable"),$truefalse);

 	if (elgg_get_plugin_setting('aga_defaultmembervisibility')=='yes'){$truefalse=true;}else{$truefalse=false;}
 //allow group admins to control visibility of members page	 
 	add_group_tool_option("aga_members",elgg_echo("aga:membersenable"),$truefalse);
	  
}

elgg_register_event_handler('init', 'system', 'aga_init');










<?php

/* functions for au group activity */


// change the group menu to our activity tool
function aga_menu_setup(){	
  // register new menu item for activities and delete old one
  elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'aga_owner_block');  
  
}



// generate the  tabs
function aga_tabs($handler,$guid,$selected){
	  		// kill standard activity tabs - we will add them back in soon
	  		elgg_register_plugin_hook_handler('register', 'menu:filter', 'aga_kill_activity_tabs',1000);		

	  		$group=get_entity($guid);
	  		
			// we need to create tabs for outgroup and in-group activities
		    $tab = array(
		        'name' => "ingroup",
		        'text' => elgg_echo('aga:ingroupactivities'),
		        'href' => "$handler/group/{$guid}/ingroup",
		        'selected' => $selected=='ingroup'?true:false,
		     );
		        
			elgg_register_menu_item('filter', $tab);

		    $tab = array(
		        'name' => "outgroup",
		        'text' => elgg_echo('aga:outgroupactivities'),
		        'href' => "$handler/group/{$guid}/outgroup",
				'selected' => $selected=='outgroup'?true:false, 
		     );
		        
			elgg_register_menu_item('filter', $tab);
			
			if (($group->canEdit() || $group->aga_members_enable=='yes')&&
					(elgg_get_plugin_setting('aga_members','au_group_activity')!='no'|| elgg_is_admin_logged_in())){
			    $tab = array(
			        'name' => "members",
			        'text' => elgg_echo('aga:memberactivities'),
			        'href' => "$handler/group/{$guid}/members",
					'selected' => $selected=='members'?true:false, 
			     );		        
				 elgg_register_menu_item('filter', $tab);
			}
			if (($group->canEdit() || $group->aga_stats_enable=='yes')&&
					(elgg_get_plugin_setting('aga_stats','au_group_activity')!='no'|| elgg_is_admin_logged_in())){
			    $tab = array(
			        'name' => "stats",
			        'text' => elgg_echo('aga:groupstats'),
			        'href' => "$handler/group/{$guid}/stats",
					'selected' => $selected=='stats'?true:false, 
			     );
			        
				elgg_register_menu_item('filter', $tab);
			}
}


/**
* main page handler

 */
function aga_page_handler($page,$handler) {
   	if ($page[0] == 'group') {
	   	$guid=$page[1];
	   	$db_prefix = elgg_get_config('dbprefix');
	   	//username
	  	if ($page[3]){
		  	$person=get_user_by_username($page[3]);

		  	if(elgg_instanceof($person,'user')){
			  	$persons=array($person->guid);
			  	$membername = $person->name;
		  	}
		}

	  	$group = get_entity($guid);	  	
	 	if (elgg_instanceof($group, 'group')) {
	 		$addtitle="";
		  	switch ($page[2]) {
				case 'ingroup' :
					aga_tabs($handler,$guid,'ingroup');
					$options['joins'] = array("JOIN {$db_prefix}entities e ON e.guid = rv.object_guid");
					$options['wheres']= array("e.container_guid = $guid");	
				  	$options['selected']='ingroup';  
				  	if ($persons){
				  		$options['subject_guids'] = $persons;	
					  	$addtitle=" (".elgg_echo('aga:member').": $membername)";
				  	}
				  	$titlepart=elgg_echo('aga:ingroupactivities').$addtitle;
					//sort order, used by member stats page
					if($page[4]=='asc'){
						$options['order_by']='rv.posted ASC';
					}
					aga_handle_activity_page($group,$page[2],$options,$titlepart);
					break;
				case 'outgroup':
					aga_tabs($handler,$guid,'outgroup');
				  	$id=$group->group_acl;
				  	$members = get_members_of_access_collection($id,	TRUE);
				  	if (!$persons){
				  		$options['subject_guids'] = $members;
				  	}else{
					  	$options['subject_guids'] = $persons;
					  	$addtitle=" (".elgg_echo('aga:member').": $membername)";
				  	}	
					//sort order, used by member stats page
					if($page[4]=='asc'){
						$options['order_by']='rv.posted ASC';
					}
				  	$titlepart=elgg_echo('aga:outgroupactivities').$addtitle;
				  	$options['selected']='outgroup';
					aga_handle_activity_page($group,$page[2],$options,$titlepart);
					break;
				case 'members':
					aga_tabs($handler,$guid,'members');				
					aga_handle_members_page($group,$page[3]);
					break;
				case 'stats':
					aga_tabs($handler,$guid,'stats');
					aga_handle_stats_page($group);
					break;
				default:
					return false;
			}
			return true;
		}else{
			//this is not an actual group - stop right here
			return false;
		}	
	}else{
		//it never even claimed to be a group so why are we even here?
			return false;
	}
	
}	
    	

//generate the activity listing tabs
function aga_handle_activity_page($group,$page,$options,$titlepart){
	//checking for filter	
	$type = preg_replace('[\W]', '', get_input('type', 'all'));
	$subtype = preg_replace('[\W]', '', get_input('subtype', ''));		
	if ($type != 'all') {
		$options['type'] = $type;
		if ($subtype) {
			$options['subtype'] = $subtype;
		}
	}
	
	if ($subtype) {
		$selector = "type=$type&subtype=$subtype";
	} else {
		$selector = "type=$type";
	}

	  
 // now start building the page 
   	$content="";  	
	$content .= elgg_view_module('info',elgg_echo('aga:note'),elgg_echo('aga:activitycaution'));
  	elgg_set_page_owner_guid($group->guid);  
	$title = $titlepart;
	elgg_push_breadcrumb($group->name, $group->getURL());
	elgg_push_breadcrumb($title);

	// this is where we actually build the list of content
	$content.= elgg_view('core/river/filter', array('selector' => $selector));

	$options['pagination'] = true;

	$results = elgg_list_river($options);
	if ($results) {
		$content .= $results;
	}else{
		$content .= '<p>' . elgg_echo('groups:activity:none') .'</p>';
	} 
	

	$params = array(
		'filter_context' => 'aga',
		'content' => $content,
		'title' => $title,
		'class' => 'elgg-river-layout',
	);
	$body = elgg_view_layout('content', $params);

	echo elgg_view_page($title, $body);

	  
   return true;

}

	
// generate the member stats page
function aga_handle_members_page($group,$member){
	//only show if enabled or is admin
	if (!(($group->canEdit() || $group->aga_members_enable=='yes')&&
					(elgg_get_plugin_setting('aga_members','au_group_activity')!='no'|| elgg_is_admin_logged_in()))){
		forward(REFERER);
	}	

	$group=elgg_get_page_owner_entity();
	if (elgg_instanceof($group,'group')){
		$title = elgg_echo('aga:membertitle', array($group->name));
		elgg_push_breadcrumb($group->name, $group->getURL());
		elgg_push_breadcrumb(elgg_echo('aga:membertitle'));

		$content .= elgg_view_module('info',elgg_echo('aga:note'),elgg_echo('aga:membercaution'));
		
		$db_prefix = elgg_get_config('dbprefix');
		//we want to show some stats for each user		
		elgg_extend_view('user/default','au_group_activity/user_activity_link');

		//set up basic options to display members
		$options=array(
			'relationship' => 'member',
			'relationship_guid' => $group->guid,
			'inverse_relationship' => true,
			'type' => 'user',
			'limit' => 20,
			'joins' => array("JOIN {$db_prefix}users_entity u ON e.guid=u.guid"),
			'order_by' => 'u.name ASC',
		);
		
		//allow filtering of names
		$chosenmembers=get_input('members');
		if($chosenmembers){
			$options['guids']=$chosenmembers;
			
		}
		//form to enter user details
		$formbody="";
		$formbody.= elgg_view('input/userpicker', array(
		'name' => 'members', 
		'internalid' => 'user_picker',
		'value' => $chosenmembers ));
		$formbody.= elgg_view('input/hidden', array('name' => 'guid', 'value' => $group->guid));
		$formbody.= elgg_view('input/submit', array('value' => elgg_echo('aga:filterbutton')));
		$filtercontent.="<div>".elgg_echo('aga:searchmembershelp')."</div>";	
		$filtercontent.="<div>";	
		$filtercontent.= elgg_view('input/form', array('body'=>$formbody,'method'=>'POST','action'=>'#'));
		$filtercontent.="</div>";
		$content.=elgg_view_module('featured',elgg_echo('aga:searchmembers'),$filtercontent);

		//list members
		$members = elgg_list_entities_from_relationship($options);	
		$content.=$members;
	
		$params = array(
			'filter_context' => 'aga',
			'content' => $content,
			'title' => $title,
		);
		$body = elgg_view_layout('content', $params);
	
		echo elgg_view_page($title, $body);
		
		// don't want to persist the stats for each user
		elgg_unextend_view('user/default','aga/user_activity_link');
		
	}
}


//generate the stats page
function aga_handle_stats_page($group){
	//only show if enabled or is admin
	if (!(($group->canEdit() || $group->aga_stats_enable=='yes')&&
					(elgg_get_plugin_setting('aga_stats','au_group_activity')!='no'|| elgg_is_admin_logged_in()))){
		forward (REFERER);
	}	
	$title=elgg_echo('aga:groupstats',array($group->name));
	elgg_push_breadcrumb($group->name, $group->getURL());
	elgg_push_breadcrumb(elgg_echo('aga:groupstats'));
	$content="";
	// Get entity statistics
	//first get array of possible objects
	$guid=$group->guid;
	$types=get_registered_entity_types('object');
	$content .= elgg_view_module('info',elgg_echo('aga:note'),elgg_echo('aga:statscaution'));
	// generate a table of stats
	$even_odd = "";	
	$statscontent="<table class=\"elgg-table-alt\">";
	//member count
	$statscontent.="<tr class=\"odd\"><td>".elgg_echo('aga:nummembers')."</td><td>".aga_get_member_count($group)."</td></tr>";
	//post count
	$statscontent.= "<tr class=\"even\"><td>".elgg_echo('aga:numposts')."</td><td>".aga_get_post_count($group)."</td></tr>";
	//count comments and discussion replies
	$statscontent.="<tr><td>".elgg_echo('aga:generic_comment')."</td><td>".aga_get_annotation_count($group,'generic_comment')."</td></tr>";
	$statscontent.="<tr><td>".elgg_echo('aga:group_topic_post')."</td><td>".aga_get_annotation_count($group,'group_topic_post')."</td></tr>";
	//get first and most recent posts
	$statscontent.="<tr class=\"odd\"><td>".elgg_echo('aga:first_post')."</td><td>".aga_get_firstlast_post($group,'first')."</td></tr>";	
	$statscontent.="<tr class=\"even\"><td>".elgg_echo('aga:last_post')."</td><td>".aga_get_firstlast_post($group,'last')."</td></tr>";	
	// show per-object stats
	$statscontent.="<tr><td><h4>".elgg_echo('aga:perobjecttype')."</h4></td><td>".elgg_echo('aga:perobjecttypehelp')."</td></tr>";
	foreach($types as $k=>$object){
		//This function controls the alternating class
		$even_odd = ( 'odd' != $even_odd ) ? 'odd' : 'even';
		$count = aga_get_post_count($group,$object);
		$objectNice=elgg_echo("item:object:$object");
		$statscontent.="<tr class=\"{$even_odd}\">
					<td>{$objectNice}</td>
					<td><a href=\"{$handler}ingroup?type=object&subtype={$object}\">{$count}</a></td>
				</tr> ";
			
	}

	/* trying to get things set with group acl but can't make it work yet
	$inacl=aga_get_acl_count($group,'in');
	$outacl=aga_get_acl_count($group,'out');
	$content.="<tr><td>".elgg_echo('aga:accesscount:in')."</td><td>".$inacl."</td></tr>";
	$content.="<tr><td>".elgg_echo('aga:accesscount:out')."</td><td>".$outacl."</td></tr>";
	*/
	//end table	
	$statscontent.="</table>";
	$content.=elgg_view_module('aside',elgg_echo('aga:generalstats'),$statscontent);
		//show tags
	$content .= elgg_view_module('aside',elgg_echo('aga:populartags'),elgg_view_tagcloud(array('container_guid'=>$guid,'limit'=>500,)));	
	$params = array(
		'filter_context' => 'aga',
		'content' => $content,
		'title' => $title,
		);
	$body = elgg_view_layout('content', $params);
	echo elgg_view_page($title, $body);
}


//get count of 



//get number of posts
function aga_get_post_count($group,$subtype,$user){
	$options=array(
		'type'=>'object',
		'count' => TRUE, 
	);
	if($group){
		$options['container_guid'] = $group->guid;
	}

	if($subtype){
		$options['subtype']=$subtype;
	}
	if($user){
		$options['owner_guids']=array($user->guid);
	}	 
	
	$result=elgg_get_entities($options);
	return $result;	
	
}


//get number of posts
function aga_get_annotation_count($group,$annotation_type,$user){
	$options=array(
	//	'annotation_names'=>array('generic_comment','group_topic_post'),
		'count' => TRUE, 
	);
	if($group){
		$options['container_guid'] = $group->guid;
	}
	if($annotation_type){
		$options['annotation_name']=$annotation_type;
	}

	if($user){
		$options['annotation_owner_guids']=array($user->guid);
	}	 
	
	$result=elgg_get_annotations($options);
	return $result;	
	
}




//get number of members
function aga_get_member_count($group){

	$result=elgg_get_entities_from_relationship(array(
		'relationship' => 'member', 
		'relationship_guid' => $group->guid, 
		'inverse_relationship' => TRUE, 
		'count'=> TRUE,));
	return $result;
}


//get first/last created post date
function aga_get_firstlast_post($group=0,$firstlast,$user){
	$options=array(
		'type'=>'object',
		'container_guid' => $group->guid,
		'limit' => 1,
	);	
	if ($firstlast=='first'){
		$options['order_by']='time_created ASC';
	}else{
		$options['order_by']='time_created DESC';
	}
	if ($user){
		$options['owner_guid']=$user->guid;
	}
	if ($post=elgg_get_entities($options)){
		$return=gmdate("Y-m-d",$post[0]['time_created']);
	}else{
		$return="none";
	}		
	
	return $return;
}



//get number of posts per week
function aga_get_post_count_perweek($group){
	
}

//get number of posts per ACL permission
function aga_get_acl_count($group){
	
}

//get number of posts across the site using the group ACL (not working)
function aga_get_group_acl_count($group,$inout){
			$options=array(
		'access_id' => $group->group_acl,
		'type' => 'object',
	//	'count'=>TRUE,
	);
	if($inout=='in'){
		$options['container_guids']= array($group->guid);
	}
	$result=elgg_get_entities_from_access_id($options);
	return $result;
}




//find an individual's date of joining
function aga_group_join_date($group,$member){
	
	$relationship=elgg_get_entities_from_relationship(array(
		'relationship' => 'member', 
		'guids'=> $member->guid,
		'relationship_guid' => $group->guid, 
		'inverse_relationship' => TRUE, 
		'order_by' => 'r.time_created DESC', 
		'limit' => 1));
		
	$result=gmdate("Y-m-d",$relationship[0]['time_created']);	
	return $result;	
}

//get the earliest joining (probably when created)
function aga_group_first_join_date($group){
	
	$result=elgg_get_entities_from_relationship(array(
		'relationship' => 'member', 
		'relationship_guid' => $group->guid, 
		'inverse_relationship' => TRUE, 
		'order_by' => 'r.time_created ASC', 
		'limit' => 1));
		
	return $result;	
}

//get most recent join date
function aga_group_last_join_date($group,$member){
	
	$result=elgg_get_entities_from_relationship(array(
		'relationship' => 'member', 
		'relationship_guid' => $group->guid, 
		'inverse_relationship' => TRUE, 
		'order_by' => 'r.time_created DESC', 
		'limit' => 1));
		
	return $result;	
}

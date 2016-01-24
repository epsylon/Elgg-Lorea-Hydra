<?php
/**
 * whoviewedme index
 *
 */

$title = elgg_echo('whoviewedme');

$options = array('type' => 'user', 'full_view' => false);


		$options['relationship'] = 'viewed';
		$options['inverse_relationship'] = true;
    $options['relationship_guid'] = elgg_get_logged_in_user_guid();
               
		//$content = elgg_list_entities_from_relationship($options);
    $rels=get_entity_relationships(elgg_get_logged_in_user_guid());            

    if(!$rels){
        $content = elgg_echo("whoviewedme:nobody");
    }
    else
    {
      $content="";
      foreach($rels as $key=>$rel)
      {
        $user=get_user($rel->guid_two);
        if( !$user ) continue;
        $content.= elgg_view_entity($user );
        $content.= elgg_view_friendly_time($rel->time_created);
        //$content.= "</br>".$rel->guid_two;
      }
    
    }


$params = array(
	'content' => $content,
	'title' => $title,
	'filter_override' => "",
);

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);


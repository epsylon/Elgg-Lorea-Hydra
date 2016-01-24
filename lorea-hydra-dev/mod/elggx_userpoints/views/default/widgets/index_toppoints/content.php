<?php
/**
 * Elggx Userpoints Plugin
 *
 * Index page Toppoints widget for Widget Manager plugin
 *
 */

// get widget settings
$limit = sanitise_int($vars["entity"]->toppoints_count, false);
if(empty($limit)){
        $limit = 10;
}

$options = array('type' => 'user', 'limit' => $limit, 'order_by_metadata' =>  array('name' => 'userpoints_points', 'direction' => DESC, 'as' => integer));
$options['metadata_name_value_pairs'] = array(array('name' => 'userpoints_points', 'value' => 0,  'operand' => '>'));
$entities = elgg_get_entities_from_metadata($options);

$html = '';

foreach ($entities as $entity) {

    $icon = elgg_view_entity_icon($entity, 'small');
    $branding = (abs($entity->userpoints_points) > 1) ? elgg_echo('elggx_userpoints:lowerplural') : elgg_echo('elggx_userpoints:lowersingular');
        $branding =  "<a href=\"blog/view/498\">{$branding}</a>";
    $info = "<a href=\"{$entity->getURL()}\">{$entity->name}</a><b class=\"right\">{$entity->userpoints_points} $branding</b>";
    
    $jobtitle='';

    $title=elgg_get_metadata(array( 'metadata_name' => 'jobtitle', 'guid' => $entity->getGUID() ));
    if( $title )
      $jobtitle.=$title[count($title)-1]->value;
    //$jobtitle.=count($title);   
    $org=elgg_get_metadata(array( 'metadata_name' => 'organisation', 'guid' => $entity->getGUID() ));
    $orgid=elgg_get_metadata(array( 'metadata_name' => 'organisationid', 'guid' => $entity->getGUID() ));
    
    if( $org && $orgid)
    {
      //$jobtitle.=  "-1-";
      $company=get_entity($orgid[count($orgid)-1]->value);
      $jobtitle.=  ' - <a href="'.$company->getURL().'">'.$company->title.'</a>';
    }
    elseif( $org )
    {
      //$jobtitle.=  "-2-".count($org);
      $jobtitle.= ' - '.$org[count($org)-1]->value;
    }
    //$jobtitle.= count($org);
    $info .="<div class=\"elgg-subtext\">$jobtitle</div>"; 
    $html .= elgg_view('page/components/image_block', array('image' => $icon, 'body' => $info));
}

echo $html;

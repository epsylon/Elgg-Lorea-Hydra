<?php

$annotation_id = $vars['item']->annotation_id;

if ($annotation_id != 2010) {
	$annotation = elgg_get_annotation_from_id($annotation_id);
	
	$value   = explode(',',$annotation->value);
	$name    = $value[0];
	$friends = (int)$value[1];
	
	if($friends == 0){
		$excerpt = "suicide:nocares";
	}elseif($friends < 5){
		$excerpt = "suicide:autist";
	}elseif($friends < 10){
		$excerpt = "suicide:lonely";
	}elseif($friends < 50){
		$excerpt = "suicide:normal";
	}elseif($friends < 100){
		$excerpt = "suicide:popular";
	}elseif($friends < 200){
		$excerpt = "suicide:respected";
	}else{
		$excerpt = "suicide:godlike";
	}

	$summary = elgg_echo('suicide:suicide', array($name)) . elgg_echo($excerpt);
	$timestamp = elgg_get_friendly_time($annotation->time_created);
	
	$icon = elgg_get_site_url()."mod/suicide/graphics/suicide.png";
	$icon = "<img src=\"$icon\" width=\"40\" />";
	$body = "<div class=\"elgg-river-summary\">$summary <span class=\"elgg-river-timestamp\">$timestamp</span></div>";
	
	echo elgg_view('page/components/image_block', array(
		'image' => $icon,
		'body' => $body,
		'class' => 'elgg-river-item',
	));

}

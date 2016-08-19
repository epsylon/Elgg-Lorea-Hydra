<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Action to get Google Talk based smileys
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/
	$base_folder = "thewire/_graphics/";
	$smiley = get_input("smiley");
	
	if($smiley){
		
		$filename = $CONFIG->pluginspath . $base_folder . $smiley;
		$contents = @file_get_contents($filename);
		
		header("Cache-Control: no-cache, no-store, must-revalidate");
		
		echo $contents;
		
	}
	exit();
?>

<?php

namespace AU\GroupTagMenu;

/**
 * Group tag menu
 * allows tags to become menu items in groups
 * Jon Dron (jond@athabascau.ca)
 * copyright Athabasca University 2013
 * GPL2 licence - see manifest.xml
 */

const PLUGIN_ID = 'au_group_tag_menu';

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init');

function init() {

	// add settings for tools
	elgg_extend_view('groups/edit','au_group_tag_menu/tagmenu_settings');

	//add the tag menu at the bottom of the sidebar
	elgg_extend_view('page/elements/sidebar','au_group_tag_menu/sidebar/tagmenu');

	// register group option to show tag menu
	add_group_tool_option("tag_menu",elgg_echo("au_group_tag_menu:enable"),true);

	//register action to save settings
	elgg_register_action("au_group_tag_menu/groups/save_tagmenu", __DIR__ . "/actions/groups/save_tagmenu.php");

	//register the tag type for menu tags
	elgg_register_tag_metadata_name('menu_tags');

	//register the page to show results
	elgg_register_page_handler('group_tag_menu', __NAMESPACE__ . '\\group_tag_menu_page_handler');
}



function group_tag_menu_page_handler($page){
	
	$content = false;
	
	//show the page of search results
	// assumes url of group/guid/tag
	// if the tag is 'all' then will display a tagcloud
	switch ($page[0]){
		case 'group':
			$entity = get_entity($page[1]);
			$content = elgg_view('resources/au_group_tag_menu/group', array(
				'entity' => $entity,
				'page' => $page
			));
			break;	
	}
	
	if ($content) {
		echo $content;
		return true;
	}
	
	return false;
}

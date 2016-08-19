<?php

elgg_register_event_handler('init', 'system', 'gallery_field_init');

function gallery_field_init()
{
	// Register library
	elgg_register_library('elgg:gallery_field', __DIR__ . '/lib/gallery_field.php');	
	
    // Extend CSS
    elgg_extend_view('css/elgg', 'gallery_field/css');	
	
	// Javascript
	elgg_register_js('gallery_field_editor', '/mod/gallery_field/assets/gallery_field_editor.js');
	
	// Page handler for editor
	elgg_register_page_handler('gallery_field_image', 'gallery_field_image_page_handler');
	
	//Register actions
	$action_path = __DIR__."/actions";
	elgg_register_action("gallery_field/upload", "$action_path/upload.php");
	
	if(elgg_get_plugin_setting("enable_blog", "gallery_field") == 'yes')
	{
		elgg_extend_view('object/blog', 'gallery_field/images_list');	
	}
	if(elgg_get_plugin_setting("enable_pages", "gallery_field") == 'yes')
	{
		elgg_extend_view('object/page_top', 'gallery_field/images_list');	
	}
}

function gallery_field_image_page_handler($page)
{
	elgg_load_library('elgg:gallery_field');
	
	$image_id = elgg_extract(0, $page);
	
	if($image_id == 'delete')
	{
		gallery_field_delete_images();		
	}	
	elseif($image_id == 'save_sort')
	{
		gallery_field_save_sort();		
	}
	else
	{
		$size = elgg_extract(1, $page, "default");
		gallery_field_show_image($image_id, $size);		
	}
	return true;
}



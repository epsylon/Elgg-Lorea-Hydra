<?php

/**
 * Upload images action
 */

elgg_load_library('elgg:gallery_field');

$files_array = $_FILES['image'];
$entity_id = $_POST['entity_id'];
$entity_field = $_POST['entity_field'];

$entity = get_entity($entity_id);


if(false == $entity->canEdit())
{
	register_error(elgg_echo('gallery_field:cant_edit'));
	forward(REFERRER);
}

$image_ids = gallery_field_image_ids_from_value($entity->$entity_field);
$count_added = 0;

for($i = 0; $i < count($files_array['tmp_name']); $i++)
{	
	if(false == in_array($files_array['type'][$i], array("image/jpeg","image/jpg")))
	{
		if(strlen($files_array['type'][$i]) == 0)
		{
			register_error(elgg_echo("gallery_field:max_upload_exceed"));
		}
		else 
		{
			register_error(elgg_echo("gallery_field:only_jpg"));
		}
		
		continue;
	}
	
	$file = \GalleryFieldImage::createFromFile($files_array['tmp_name'][$i], $files_array['type'][$i]);

	if($file == null)
	{
		continue;
	}
	
	$file->entity_id = $entity_id;
	$file->save();
	
	array_unshift($image_ids, $file->guid);
	$count_added++;
}

$entity->$entity_field = implode(",", $image_ids);


system_messages(elgg_echo("gallery_field:files_uploaded").": " . $count_added);
forward($_SERVER['HTTP_REFERER']."#editor_".$entity_field);
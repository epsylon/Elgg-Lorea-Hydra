#Gallery field module for elgg 1.9, 1.10

This module allow you to add simple gallery to blog posts and pages.

In settings page you can select, enable or disable gallery for blogs or pages.

##Installing 

###Using composer

	composer require serega3000/elgg_gallery_field:dev-master

###Manually

	Copy all files from this repository to folder mod/gallery_field of your Elgg installation

##Adding to your module

If you writing your own module, you can simply add gallery to you entity view:
	
	$body .= elgg_view('gallery_field/images_list', array(
		'entity' => $entity,
	));	

Or you can extend any entity view. 

	elgg_extend_view('object/blog', 'gallery_field/images_list');	

<?php
/**
 * Register the GalleryFieldImage class for the object/gallery_field_image subtype
 */

if (get_subtype_id('object', 'gallery_field_image')) {
	update_subtype('object', 'gallery_field_image', 'GalleryFieldImage');
} else {
	add_subtype('object', 'gallery_field_image', 'GalleryFieldImage');
}

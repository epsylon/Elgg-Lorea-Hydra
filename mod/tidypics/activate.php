<?php
/**
 * Activate Tidypics
 *
 * @author Cash Costello
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 */

// register classes
if (get_subtype_id('object', 'album')) {
	update_subtype('object', 'album', 'TidypicsAlbum');
} else {
	add_subtype('object', 'album', 'TidypicsAlbum');
}
if (get_subtype_id('object', 'image')) {
	update_subtype('object', 'image', 'TidypicsImage');
} else {
	add_subtype('object', 'image', 'TidypicsImage');
}
if (get_subtype_id('object', 'tidypics_batch')) {
	update_subtype('object', 'tidypics_batch', 'TidypicsBatch');
} else {
	add_subtype('object', 'tidypics_batch', 'TidypicsBatch');
}

// set default settings
$plugin = elgg_get_plugin_from_id('tidypics');

$image_sizes = array();
$image_sizes['large_image_width'] = $image_sizes['large_image_height'] = 600;
$image_sizes['small_image_width'] = $image_sizes['small_image_height'] = 153;
$image_sizes['tiny_image_width'] = $image_sizes['tiny_image_height'] = 60;
$image_sizes = serialize($image_sizes);

$defaults = array(
	'tagging' => false,
	'view_count' => true,
	'uploader' => true,
	'exif' => false,
	'download_link' => true,
	'slideshow' => false,

	'maxfilesize' => 5,
	'image_lib' => 'GD',

	'img_river_view' => 'batch',
	'album_river_view' => 'cover',
	'river_comments_thumbnails' => 'none',

	'image_sizes' => $image_sizes,

	'notify_interval' => 60 * 60 * 24,
);

foreach ($defaults as $name => $value) {
	if ($plugin->getSetting($name) === null) {
		$plugin->setSetting($name, $value);
	}
}

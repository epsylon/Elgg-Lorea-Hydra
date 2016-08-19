<?php
/**
 * Create or edit a video
 *
 * @package ElggVideolist
 */

$variables = elgg_get_config('videolist');
$input = array();
foreach ($variables as $name => $type) {
    $filter_input = ($name !== 'video_url');
	$input[$name] = get_input($name, null, $filter_input);
	if ($name == 'title') {
		$input[$name] = strip_tags($input[$name]);
	}
	if ($type == 'tags') {
		$input[$name] = string_to_tag_array($input[$name]);
	}
}

// Get guids
$video_guid = (int)get_input('video_guid');
$container_guid = (int)get_input('container_guid');

elgg_make_sticky_form('videolist');

elgg_load_library('elgg:videolist');

// If new video, get data from video providers
if(!$video_guid) {

    $input['video_url'] = elgg_trigger_plugin_hook('videolist:preprocess', 'url', $input, $input['video_url']);

    if (!$input['video_url']) {
		register_error(elgg_echo('videolist:error:no_url'));
		forward(REFERER);
	}

	$parsedPlatform = videolist_parse_url($input['video_url']);

	if (!$parsedPlatform) {
		register_error(elgg_echo('videolist:error:invalid_url'));
		forward(REFERER);
	}
    list ($parsed, $platform) = $parsedPlatform;
    /* @var Videolist_PlatformInterface $platform */
	unset($input['title']);
	unset($input['description']);
    $input = array_merge($parsed, $platform->getData($parsed), $input);
    $input['videotype'] = $platform->getType();
	
} else {
	unset($input['video_url']);
}

if ($video_guid) {
	$video = get_entity($video_guid);
	if (!$video || !$video->canEdit()) {
		register_error(elgg_echo('videolist:error:no_save'));
		forward(REFERER);
	}
	$new_video = false;
} else {
	$video = new ElggObject();
	$video->subtype = 'videolist_item';
	$new_video = true;
}

if (sizeof($input) > 0) {
	foreach ($input as $name => $value) {
		$video->$name = $value;
	}
}

$video->container_guid = $container_guid;

if ($video->save()) {

	elgg_clear_sticky_form('videolist');
	
	// Let's save the thumbnail in the data folder
//    $thumb_url = $video->thumbnail;
//    if ($thumb_url) {
//        $thumbnail = file_get_contents($thumb_url);
//        if ($thumbnail) {
//            $prefix = "videolist/" . $video->guid;
//            $filehandler = new ElggFile();
//            $filehandler->owner_guid = $video->owner_guid;
//            $filehandler->setFilename($prefix . ".jpg");
//            $filehandler->open("write");
//            $filehandler->write($thumbnail);
//            $filehandler->close();
//        }
//    }

	system_message(elgg_echo('videolist:saved'));

	if ($new_video) {
		add_to_river('river/object/videolist_item/create', 'create', elgg_get_logged_in_user_guid(), $video->guid);
	}

	forward($video->getURL());
} else {
	register_error(elgg_echo('videolist:error:no_save'));
	forward(REFERER);
}

<?php
/**
 * Elgg videolist english language pack.
 *
 * @package ElggVideolist
 */
 
$english = array(

	/**
	 * Menu items and titles
	 */

	'videolist' => "Videos",
	'videolist:owner' => "%s's videos",
	'videolist:friends' => "Friends' videos",
	'videolist:all' => "All site videos",
	'videolist:add' => "Add a video",
        'videolist:video_name' => 'Title',
	'videolist:group' => "Group videos",
	'groups:enablevideolist' => 'Enable group videos',

	'videolist:edit' => "Edit this video",
	'videolist:delete' => "Delete this video",

	'videolist:new' => "Add a video",
	'videolist:notification' =>
'%s added a new video:

%s
%s

View and comment on the new video:
%s
',
	'videolist:delete:confirm' => 'Are you sure you want to delete this video?',
	'item:object:videolist_item' => 'Videos',
	'videolist:nogroup' => 'This group does not have any video yet',
	'videolist:more' => 'More videos',
	'videolist:none' => 'No videos posted yet.',

	/**
	* River
	**/

	'river:create:object:videolist_item' => '%s created the video %s',
	'river:update:object:videolist_item' => '%s updated the video %s',
	'river:comment:object:videolist_item' => '%s commented on the video titled %s',

	/**
	 * Form fields
	 */

	'videolist:title' => 'Title',
	'videolist:description' => 'Description',
	'videolist:video_url' => 'Enter video URL (Vimeo or Youtube)',
	'videolist:access_id' => 'Who can see you posted this video?',
	'videolist:tags' => 'Add tags',

	/**
	 * Status and error messages
	 */
	'videolist:error:no_save' => 'There was an error in saving the video, please try after sometime',
	'videolist:saved' => 'Your video has been saved successfully!',
	'videolist:deleted' => 'Your video was removed successfully!',
	'videolist:deletefailed' => 'Unfortunately, this video could not be removed now. Please try again later',
        'videolist:error:invalid_url' => 'This video source is not supported',	

	/**
	 * Widget
	 **/

	'videolist:num_videos' => 'Number of videos to display',
	'videolist:widget:description' => 'Your personal video playlist.',
	
);

add_translation("en", $english);

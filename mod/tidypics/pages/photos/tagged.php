<?php
/**
 * Tidypics Tagged Listing
 *
 * List all photos tagged with a user
 */

// Get user guid
$guid = get_input('guid');

$user = get_entity($guid);

// set up breadcrumbs
elgg_push_breadcrumb(elgg_echo('photos'), 'photos/siteimagesall');
elgg_push_breadcrumb(elgg_echo('tidypics:usertagged'));

$offset = (int)get_input('offset', 0);
$limit = (int)get_input('limit', 16);

if ($user && ($user instanceof ElggUser)) {
	$title = elgg_echo('tidypics:usertag', array($user->name));
	
	$options = array('relationship' => 'phototag',
                 'relationship_guid' => $guid,
                 'inverse_relationship' => false,
                 'type' => 'object',
                 'subtype' => 'image',
                 'limit' => $limit,
                 'offset' => $offset,
                 'full_view' => false,
                 'list_type' => 'gallery',
                 'gallery_class' => 'tidypics-gallery'
                );
        $result = elgg_list_entities_from_relationship($options);
        if (!empty($result)) {
                $area2 = $result;
        } else {
                $area2 = elgg_echo('tidypics:usertags_photos:nosuccess');
        }
} else {
	$title = elgg_echo('tidypics:usertag:nosuccess');
	$area2 = '';
}

if (elgg_is_logged_in()) {
        $logged_in_guid = elgg_get_logged_in_user_guid();
        elgg_register_menu_item('title', array('name' => 'addphotos',
                                               'href' => "ajax/view/photos/selectalbum/?owner_guid=" . $logged_in_guid,
                                               'text' => elgg_echo("photos:addphotos"),
                                               'link_class' => 'elgg-button elgg-button-action elgg-lightbox'));
}

// only show slideshow link if slideshow is enabled in plugin settings and there are images
if (elgg_get_plugin_setting('slideshow', 'tidypics') && !empty($result)) {
        $url = elgg_get_site_url() . "photos/tagged?guid={$user->guid}&limit=64&offset=$offset&view=rss";
        $url = elgg_format_url($url);
        $slideshow_link = "javascript:PicLensLite.start({maxScale:0, feedUrl:'$url'})";
        elgg_register_menu_item('title', array('name' => 'slideshow',
                                                'href' => $slideshow_link,
                                                'text' => "<img src=\"".elgg_get_site_url() ."mod/tidypics/graphics/slideshow.png\" alt=\"".elgg_echo('album:slideshow')."\">",
                                                'title' => elgg_echo('album:slideshow'),
                                                'link_class' => 'elgg-button elgg-button-action'));
}

$body = elgg_view_layout('content', array(
        'filter_override' => '',
        'content' => $area2,
        'title' => $title,
        'sidebar' => elgg_view('photos/sidebar', array('page' => 'all')),
));

// Draw it
echo elgg_view_page($title, $body);

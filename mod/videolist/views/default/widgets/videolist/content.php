<?php
/**
 * Elgg video list widget
 *
 * @package ElggVideolist
 */

$num = (int) $vars['entity']->videos_num;

$options = array(
	'type' => 'object',
	'subtype' => 'videolist_item',
	'container_guid' => $vars['entity']->owner_guid,
	'limit' => $num,
	'full_view' => FALSE,
	'pagination' => FALSE,
);
$content = elgg_list_entities($options);

echo $content;

if ($content) {
	$url = "pages/owner/" . elgg_get_page_owner_entity()->username;
	$more_link = elgg_view('output/url', array(
		'href' => $url,
		'text' => elgg_echo('videolist:more'),
		'is_trusted' => true,
	));
	echo "<span class=\"elgg-widget-more\">$more_link</span>";
} else {
	echo elgg_echo('videolist:none');
}

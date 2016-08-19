<?php

namespace AU\LikedContent;

$entity = $vars['group'];

elgg_push_breadcrumb($entity->name, $entity->getURL());
elgg_push_breadcrumb(elgg_echo('liked_content:liked_content'));

$dbprefix = elgg_get_config('dbprefix');
$likes_metastring = elgg_get_metastring_id('likes');

$options = array(
	'container_guid' => $entity->guid,
	'annotation_names' => array('likes'),
	'selects' => array("(SELECT count(distinct l.id) FROM {$dbprefix}annotations l WHERE l.name_id = $likes_metastring AND l.entity_guid = e.guid) AS likes"),
	'order_by' => 'likes DESC',
	'full_view' => false,
	'no_results' => elgg_echo('liked_content:noresults')
);

$content = elgg_list_entities_from_annotations($options);

$title = elgg_echo('liked_content:group:most_liked');

$layout = elgg_view_layout('content', array(
	'title' => $title,
	'content' => $content,
	'filter' => false,
		));

echo elgg_view_page($title, $layout);

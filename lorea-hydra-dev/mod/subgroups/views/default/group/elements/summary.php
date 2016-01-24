<?php
/**
 * Group summary
 *
 * @uses $vars['entity']    ElggEntity
 * @uses $vars['title']     Title link (optional) false = no title, '' = default
 * @uses $vars['metadata']  HTML for entity menu and metadata (optional)
 * @uses $vars['subtitle']  HTML for the subtitle (optional)
 * @uses $vars['tags']      HTML for the tags (optional)
 * @uses $vars['content']   HTML for the entity content (optional)
 * 
 * @override views/default/group/elements/summary.php
 */

$entity = $vars['entity'];

$title_link = elgg_extract('title', $vars, '');
if ($title_link === '') {
	if (isset($entity->title)) {
		$text = $entity->title;
	} else {
		$text = $entity->name;
	}
	$params = array(
		'text' => $text,
		'href' => $entity->getURL(),
		'is_trusted' => true,
	);
	$title_link = elgg_view('output/url', $params);
}

$metadata = elgg_extract('metadata', $vars, '');
$subtitle = elgg_extract('subtitle', $vars, '');
$content = elgg_extract('content', $vars, '');

$container = get_entity($entity->container_guid);

$tags = elgg_extract('tags', $vars, '');
if ($tags !== false) {
	$tags = elgg_view('output/tags', array('tags' => $entity->tags));
}

if ($metadata) {
	echo $metadata;
}
if ($title_link) {
	echo "<h3>$title_link</h3>";
}
if(elgg_instanceof($container, 'group')) {
	$container_link = elgg_view('output/url', array(
		'text' => $container->name,
		'href' => $container->getURL(),
		'is_trusted' => true,
	));
	$container_link = elgg_echo('subgroups:owner:single', array($container_link));
	echo "<div class=\"elgg-subtext\">$container_link</div>";
}
echo "<div class=\"elgg-subtext\">$subtitle</div>";

$subgroups = elgg_view('subgroups/subgroups_icons', array('entity' => $entity));
echo "<div class=\"subgroups-icons\">$subgroups</div>";

echo $tags;

echo elgg_view('object/summary/extend', $vars);

if ($content) {
	echo "<div class=\"elgg-content\">$content</div>";
}

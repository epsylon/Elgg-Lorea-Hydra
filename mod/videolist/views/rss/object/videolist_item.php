<?php
/**
 * Elgg default object view
 *
 * @package Elgg
 * @subpackage Core
 */

$title = $vars['entity']->title;
if (empty($title)) {
	$subtitle = strip_tags($vars['entity']->description);
	$title = substr($subtitle, 0, 32);
	if (strlen($subtitle) > 32) {
		$title .= ' ...';
	}
}

set_input('view', 'default');

$description = elgg_view("videolist/watch/".$vars['entity']->videotype, array(
	'entity' => $vars['entity'],
));

set_input('view', 'rss');

$description .= $vars['entity']->description;

$permalink = htmlspecialchars($vars['entity']->getURL());
$pubdate = date('r', $vars['entity']->time_created);

$creator = elgg_view('object/creator', $vars);
$georss = elgg_view('object/georss', $vars);
$extension = elgg_view('extensions/item', $vars);

$item = <<<__HTML
<item>
	<guid isPermaLink="true">$permalink</guid>
	<pubDate>$pubdate</pubDate>
	<link>$permalink</link>
	<title><![CDATA[$title]]></title>
	<description><![CDATA[$description]]></description>
	$creator$georss$extension
</item>

__HTML;

echo $item;

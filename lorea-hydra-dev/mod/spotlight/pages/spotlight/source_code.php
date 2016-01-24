<?php
/**
 * Spotlight -- List active plugins
 *
 * @package        Lorea
 * @subpackage     Spotlight
 *
 * Copyright 2012-2013 Lorea Faeries <federation@lorea.org>
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Affero General Public License
 * as published by the Free Software Foundation, either version 3 of
 * the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this program. If not, see
 * <http://www.gnu.org/licenses/>.
 */

elgg_set_ignore_access();

$title   = elgg_echo('dev:source');

$content = '<blockquote>' . elgg_echo('dev:source:code') . '</blockquote>';

elgg_generate_plugin_entities();

$plugins = elgg_get_plugins('active');
$plugin_list = array();
$css         = 'odd';

foreach ($plugins AS $plugin) {
	$plugin_list[$plugin->getFriendlyName()] = $plugin;
}
ksort($plugin_list);

foreach ($plugin_list AS $name => $plugin) {

	$source   = elgg_echo('dev:source');
	$manifest = $plugin->getManifest();

	$css = ($css == 'odd') ? 'even' : 'odd';

	$description = elgg_view('output/longtext', array('value' => $manifest->getDescription()));
	$author = '<span>' . elgg_echo('admin:plugins:label:author') . '</span>: '
		. elgg_view('output/text', array('value' => $manifest->getAuthor()));
	$version = htmlspecialchars($manifest->getVersion());
	$website = elgg_view('output/url',
						 array(
							   'href' => $manifest->getWebsite(),
							   'text' => $name,
							   'is_trusted' => true,
							   ));

	$repository = elgg_view('output/url',
							array(
								  'href' => $manifest->getRepositoryURL(),
								  'text' => elgg_echo('dev:source'),
								  'is_trusted' => TRUE));

	$bugtracker = elgg_view('output/url',
							array(
								  'href' => $manifest->getBugtrackerURL(),
								  'text' => elgg_echo('dev:issues'),
								  'is_trusted' => TRUE));

	$copyright = elgg_view('output/text', array('value' => $manifest->getCopyright()));
	$license   = elgg_view('output/text', array('value' => $manifest->getLicense()));

$content.=<<<___HTML

    <div class="elgg-plugin elgg-state-active $css" id="plugin-{$plugin->guid}">
	<h3>$website ($author)</h3>
	<p class="description">{$description}</p>
	<p class="copyright">{$copyright}<br/>{$license}</p>
	<p class="links">{$repository}, {$bugtracker}</p>
	<p>&nbsp;<!-- que feo --></p>
    </div>

___HTML;

}

$body = elgg_view_layout('two_column_left_sidebar', array('sidebar' => '', 'content' => $content));

echo elgg_view_page($title, $body);

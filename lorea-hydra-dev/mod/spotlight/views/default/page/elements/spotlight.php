<?php
/**
 * Spotlight -- Page footer
 *
 * @package        Lorea
 * @subpackage     Spotlight
 *
 * Copyright 2011-2013 Lorea Faeries <federation@lorea.org>
 *
 * This file is part of the Lorea Spotlight plugin.
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

echo '<div class="spotlight clearfloat">';

echo '<div class="spotlight-column">';

echo elgg_view('page/elements/spotlight/module', array(
	'title' => elgg_echo('about:lorea'),
	'items' => array(
		'http://lorea.org/' => elgg_echo('about:blog'),
		'https://n-1.cc/g/lorea/' => elgg_echo('about:group'),
                'https://github.com/lorea/'=> elgg_echo('dev:repo'),
	),
));

echo '</div><div class="spotlight-column">';

echo elgg_view('page/elements/spotlight/module', array(
	'title' => elgg_echo('help:help'),
	'items' => array(
		'https://n-1.cc/faq/' => elgg_echo('help:faq'),
		'https://n-1.cc/dokuwiki/9394' => elgg_echo('help:howto'),
		'https://n-1.cc/g/help' => elgg_echo('help:group'),
                'https://n-1.cc/g/bughunting/' => elgg_echo('dev:bughunting'),
                'https://n-1.cc/g/lorea+seeds' => elgg_echo('help:seeds'),
	),
));

echo '</div><div class="spotlight-column">';

echo elgg_view('page/elements/spotlight/module', array(
	'title' => elgg_echo('dev:dev'),
	'items' => array(
		'https://n-1.cc/g/lorea+code' => elgg_echo('dev:group'),
		'https://n-1.cc/g/testers-and-usability/' => elgg_echo('dev:testers'),
                'https://n-1.cc/g/documentation/' => elgg_echo('dev:documentation'),
                'https://n-1.cc/g/communication' => elgg_echo('dev:communication'),
                'https://n-1.cc/g/lorea+babel-fish' => elgg_echo('dev:translation'),
                'https://n-1.cc/g/lorea+founds' => elgg_echo('dev:financiation'),
	),
));

echo '</div><div class="spotlight-column">';

$members     = get_number_users();
$online      = find_active_users(600, 0, 0, true);
$groups      = elgg_get_entities(array('type' => 'group', 'count' => true, 'limit' => 0));
$assemblies  = elgg_get_entities(array('type' => 'object', 'subtypes' => array('assembly'), 'count' => true, 'limit' => 0));
$pages       = elgg_get_entities(array('type' => 'object', 'subtypes' => array('page', 'page_top', 'etherpad', 'subpad'), 'count' => true, 'limit' => 0));
$blog        = elgg_get_entities(array('type' => 'object', 'subtype' => 'blog', 'count' => true, 'limit' => 0));
$file        = elgg_get_entities(array('type' => 'object', 'subtype' => 'file', 'count' => true, 'limit' => 0));
//$agendas     = elgg_get_entities(array('type' => 'object', 'subtype' => 'scheduling', 'count' => true, 'limit' => 0));
$tasks       = elgg_get_entities(array('type' => 'object', 'subtype' => 'task', 'count' => true, 'limit' => 0));
$wires       = elgg_get_entities(array('type' => 'object', 'subtype' => 'thewire', 'count' => true, 'limit' => 0));
$calendars   = elgg_get_entities(array('type' => 'object', 'subtype' => 'event_calendar', 'count' => true, 'limit' => 0));
$ads         = elgg_get_entities(array('type' => 'object', 'subtype' => 'market', 'count' => true, 'limit' => 0));
$polls       = elgg_get_entities(array('type' => 'object', 'subtype' => 'poll', 'count' => true, 'limit' => 0));

echo elgg_view('page/elements/spotlight/module', array(
	'title' => elgg_echo('stats:stats'),
	'items' => array(
                'members/online' => $online . ' ' .  elgg_echo('members:label:online'),
		'members'        => $members . ' ' . elgg_echo('members'),
		'wires/all'      => $wires . ' ' .  elgg_echo('item:object:thewire'),
		'groups/all'     => $groups . ' ' .  elgg_echo('item:group'),
		'assemblies/all' => $assemblies . ' ' . elgg_echo('stats:assemblies'),
		'tasks/all'      => $tasks . ' ' . elgg_echo('stats:tasks'),
                'market/all'     => $ads . ' ' .    elgg_echo('item:object:market'),
                'calendars/all'  => $calendars . ' ' .  elgg_echo('item:object:event_calendar'),
                //'scheduling/all' => $agendas . ' ' .    elgg_echo('item:object:scheduling'),
		'pages/all'      => $pages . ' ' .   elgg_echo('item:object:page'),
		'blog/all'       => $blog . ' ' .    elgg_echo('item:object:blog'),
		'file/all'       => $file . ' ' .    elgg_echo('item:object:file'),
                'poll/all'       => $polls . ' ' .    elgg_echo('item:object:poll'),
	),
));

echo '</div>';
echo '</div>';

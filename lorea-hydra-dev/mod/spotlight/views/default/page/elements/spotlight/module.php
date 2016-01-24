<?php
/**
 * Spotlight -- Page footer module
 *
 * @package        Lorea
 * @subpackage     Spotlight
 *
 * Copyright 2011-2013 Lorea Faeries <federation@lorea.org>
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

$list_items = array();

foreach($vars['items'] as $url => $label) {

	$opts = array('href' => $url, 'text' => $label, 'is_trusted' => TRUE);
	$item = elgg_view('output/url', $opts);
	array_push($list_items, "<li>$item</li>");
}

$list_items = implode($list_items, "\n");

echo <<<___HTML

	<div class="spotlight-module">
		<h3>{$vars['title']}</h3>
		<ul>{$list_items}</ul>
	</div>

___HTML;

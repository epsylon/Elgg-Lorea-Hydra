<?php
/**
 * Spotlight -- Lorea spotlight
 *
 * @package        Lorea
 * @subpackage     Spotlight
 * @homepage       https://lorea.org/plugin/spotlight
 * @copyright      2011-2013 Lorea Faeries <federation@lorea.org>
 * @license        COPYING, http://www.gnu.org/licenses/agpl
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

elgg_register_event_handler('init','system','spotlight_init');

/**
 * Initialize spotlight plugin
 */
function spotlight_init() {
	elgg_extend_view('page/elements/footer', 'page/elements/spotlight');
	elgg_extend_view('css/elgg', 'spotlight/css');

	elgg_register_page_handler('spotlight', 'spotlight_page_handler');
}

function spotlight_page_handler($page) {

	// We only serve one page at the moment

	$page_file = elgg_get_plugins_path() . 'spotlight/pages/spotlight/source_code.php';

	require_once($page_file);

	return TRUE;
}

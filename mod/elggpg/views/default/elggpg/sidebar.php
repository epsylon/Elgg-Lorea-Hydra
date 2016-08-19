<?php
/**
 * ElggPG -- Sidebar
 *
 * @package        Lorea
 * @subpackage     ElggPG
 *
 * Copyright 2011-2013 Lorea Faeries <federation@lorea.org>
 *
 * This file is part of the ElggPG plugin for Elgg.
 *
 * ElggPG is free software: you can redistribute it and/or modify it
 * under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * ElggPG is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this program. If not, see
 * <http://www.gnu.org/licenses/>.
 */

$owner = elgg_get_page_owner_entity();

if ($owner->guid != elgg_get_logged_in_user_guid() || !$owner->openpgp_publickey) {
	return true;
}

$enabled = elgg_get_plugin_user_setting('encrypt_emails', $owner->guid, 'elggpg') != 'no';
$enabled = $enabled ? 'enabled' : 'disabled';

$body = '<p>' . elgg_echo("elggpg:notifications:$enabled") . '</p>';
$body .= elgg_view('output/url', array(
	'text' => elgg_echo('elggpg:notifications:settings'),
	'href' => elgg_get_site_url()."elggpg/owner/$owner->username",
	'is_trust' => true,
));

echo elgg_view_module('aside', elgg_echo('elggpg:notifications'), $body);

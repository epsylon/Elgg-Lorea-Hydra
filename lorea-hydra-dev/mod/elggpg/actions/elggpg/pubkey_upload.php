<?php
/**
 * ElggPG -- Upload public key action
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

$user = get_user_by_username(get_input('username'));
$public_key = get_uploaded_file('public_key');

if (!elgg_is_logged_in() || !$user || !$user->canEdit() || $public_key === false) {
	register_error(elgg_echo("elggpg:upload:error"));
	forward(REFERER);
}

elgg_load_library('elggpg');
$info = elggpg_import_key($public_key, $user);

if ($info['unchanged']) {
	system_message(elgg_echo("elggpg:upload:unchanged"));
} elseif ($info['imported']) {
	add_to_river('river/elggpg/update', 'addkey', $user->getGUID(), $user->getGUID(), ACCESS_FRIENDS);

	system_message(elgg_echo("elggpg:upload:imported", array($info['key_id'])));
}

system_message(elggpg_import_report($info));
forward(REFERER);

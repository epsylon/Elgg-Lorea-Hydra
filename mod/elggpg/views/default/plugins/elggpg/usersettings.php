<?php
/**
 * ElggPG -- Plugin user settings
 *
 * @uses $vars['user'] The user entity
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

$user = elgg_get_logged_in_user_entity();

elgg_load_library('elggpg');

if (!elggpg_haskey($user)) {
	echo '<div>' . elgg_echo('elggpg:nopublickey') . '</div>';
	return true;
}

// set default values
if (!$vars['entity']->getUserSetting('encrypt_emails', $user->guid)) {
	$vars['entity']->setUserSetting('encrypt_emails', 'yes', $user->guid);
}
if (!$vars['entity']->getUserSetting('encrypt_site_messages', $user->guid)) {
	$vars['entity']->setUserSetting('encrypt_site_messages', 'no', $user->guid);
}

echo '<div>';
echo elgg_echo('elggpg:encrypt:emails');
echo ' ';
echo elgg_view('input/dropdown', array(
	'name' => 'params[encrypt_emails]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $vars['entity']->getUserSetting('encrypt_emails', $user->guid),
));
echo '</div>';

echo '<div>';
echo elgg_echo('elggpg:encrypt:site_messages');
echo ' ';
echo elgg_view('input/dropdown', array(
	'name' => 'params[encrypt_site_messages]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $vars['entity']->getUserSetting('encrypt_site_messages', $user->guid),
));
echo '</div>';

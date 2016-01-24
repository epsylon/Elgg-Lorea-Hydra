<?php
/**
 * ElggPG -- Upgrade from 1.7 to 1.8
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

$items = elgg_get_entities(array(
	'type' => 'user',
	'limit' => 5,
	'order_by' => 'e.time_created asc',
));

// if not items, no upgrade required
if (!$items) {
	return;
}

$local_version = (int)elgg_get_plugin_setting('version', 'elggpg');
if (2012022501 <= $local_version) {
	error_log("ElggPG requires no upgrade");
	// no upgrade required
	return;
}

global $MIGRATED;
$MIGRATED = 0;
/**
 * Sets the opengpg_publickey for users having a public key
 *
 * @param ElggObject $item
 * @return bool
 */
function elggpg_2012022501($user) {
	// it is necessary to load the gpg library to make sure gpg path is set.
	global $MIGRATED;
	$MIGRATED += 1;
	if ($MIGRATED % 100 == 0) {
		error_log(" * elggpg $user->guid");
	}
	elgg_load_library('elggpg');
	$user_fp = current(elgg_get_metadata(array(
                'guid' => $user->guid,
                'metadata_name' => 'openpgp_publickey',
        )));
	$gnupg = new gnupg();
	if (!$user_fp && $user->email) {
		try {
			$info = $gnupg->keyinfo($user->email);
			$fingerprint = $info[0]['subkeys'][0]['fingerprint'];
			if ($fingerprint) {
				create_metadata($user->guid, "openpgp_publickey", $fingerprint, 'text', $user->guid, ACCESS_LOGGEDIN);
			}
		}
		catch (Exception $e) {
			// no encryption key
		}
	}
	return true;
}

$previous_access = elgg_set_ignore_access(true);
$options = array(
	'type' => 'user',
	'limit' => 0,
);
$batch = new ElggBatch('elgg_get_entities', $options, 'elggpg_2012022501', 100);
elgg_set_ignore_access($previous_access);

if ($batch->callbackResult) {
	error_log("Elgg elggpg upgrade (2012022501) succeeded");
	elgg_set_plugin_setting('version', 2012022501, 'elggpg');
} else {
	error_log("Elgg elggpg upgrade (2012022501) failed");
}

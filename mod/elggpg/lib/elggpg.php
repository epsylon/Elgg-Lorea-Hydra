<?php
/**
 * ElggPG -- Helpers library
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

putenv("GNUPGHOME=" . elggpg_get_gpg_home());

function elggpg_get_gpg_home() {
	// try to find location of settings from environment file,
	// which means the gpg directory goes at the same level.
	$elgg_config = getenv("elgg_config");
	if ($elgg_config && is_dir(dirname($elgg_config)."/gpg")) {
		return dirname($elgg_config)."/gpg";
	}

	// otherwise create a gpg folder at the data folder
	// and store the keys there
	$gpg_path = elgg_get_data_path() . "gpg/";
	if (!file_exists($gpg_path)) {
		mkdir($gpg_path);
	}
	return $gpg_path;
}

function elggpg_import_key($public_key, $user) {
	$gpg = new gnupg();
	$info = $gpg->import($public_key);
	$new_fp = $info['fingerprint'];

	$user_fp = current(elgg_get_metadata(array(
		'guid' => $user->guid,
		'metadata_name' => 'openpgp_publickey',
	)));
	$access_id = ACCESS_LOGGED_IN;

	if ($user_fp && $user_fp->value != $new_fp) {
		update_metadata($user_fp->id, $user_fp->name, $new_fp, 'text', $user->guid, $access_id);
		$info['imported'] = 1;
	} elseif (!$user_fp) {
		create_metadata($user->guid, "openpgp_publickey", $new_fp, 'text', $user->guid, $access_id);
		$info['imported'] = 1;
	}

	$info['key_id'] = elggpg_fp2keyid($new_fp);

	return $info;
}

function elggpg_fp2keyid($fp) {
	return substr($fp, count($fp)-17, 16);
}

function elggpg_import_report($info) {
	$yes = elgg_echo('option:yes');
	$no  = elgg_echo('option:no');
	$search  = "\\n";
	$replace = "<br />";
	return str_replace($search, $replace, elgg_echo("elggpg:import:report", array(
		$info['imported']        ? $yes : $no,
		$info['unchanged']       ? $yes : $no,
		$info['newuserids']      ? $yes : $no,
		$info['newsubkeys']      ? $yes : $no,
		$info['secretimported']  ? $yes : $no,
		$info['secretunchanged'] ? $yes : $no,
		$info['newsignatures']   ? $yes : $no,
		$info['skippedkeys']     ? $yes : $no,
	)));
}

function elggpg_export_key($user) {
	$gpg = new gnupg();
	return $gpg->export($user->openpgp_publickey);
}

function elggpg_haskey($user) {
	return $user->openpgp_publickey;
}

function elggpg_keyinfo($user) {
	$gnupg = new gnupg();

	$fingerprint = $user->openpgp_publickey;

	if (!$fingerprint) {
		return false;
	}

	try {

		$info = $gnupg->keyinfo($fingerprint);

	} catch (Exception $e) {
		return false;
	}

	$simple_info = array(
		'name'        => $info[0]['uids'][0]['name'],
		'comment'     => $info[0]['uids'][0]['comment'],
		'email'       => $info[0]['uids'][0]['email'],
		'fingerprint' => $info[0]['subkeys'][0]['fingerprint'],
		'subkeys'     => array(),
	);

	if (strlen($simple_info['fingerprint']) < 1) {
		return false;
	}

	foreach ($info[0]['subkeys'] as $subkey) {
		if ($subkey['can_encrypt']) {
			$type = 'encrypt';
		}
		if ($subkey['can_sign']) {
			$type .= 'sign';
		}

		$simple_info['subkeys'][] = array(
			'keyid'   => $subkey['keyid'],
			'type'    => $type,
			'created' => $subkey['timestamp'],
			'expires' => $subkey['expires'],
		);
	}

	return $simple_info;

}

function elggpg_delete_key($user) {

	if (!$user->openpgp_publickey) {
		return false;
	}

	$count = elgg_get_entities_from_metadata(array(
		'type' => 'user',
		'metadata_name' => 'openpgp_publickey',
		'metadata_value' => $user->openpgp_publickey,
		'count' => true,
	));

	if ($count > 1) {
		$user->openpgp_publickey = NULL;
		return true;
	}

	$gpg = new gnupg();
	$info = $gpg->deletekey($user->openpgp_publickey);
	$user->openpgp_publickey = NULL;
	return $info;
}

function elggpg_encrypt($body, $user, $force = true) {
	$already_encrypted = strpos($body, "-----BEGIN PGP MESSAGE-----") !== false;
	try {
		if (!$already_encrypted) {
			$gpg = new gnupg();
			$gpg->addencryptkey($user->openpgp_publickey);
			if ($encrbody = $gpg->encrypt($body)) {
				$body = $encrbody;
			} elseif ($force) {
				return false;
			}
		}
	} catch (Exception $e) {
		if ($force) {
			return false;
		}
	}
	return $body;
}

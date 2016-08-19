<?php
/**
 * ElggPG -- Translation strings for English
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

$language = array(
	'elggpg' => 'gpg key',
    'profile:openpgp_publickey' => 'Encryption key',
    'profile:openpgp_publickey:help' => 'What\'s that?',
	'elggpg:profileinstructions'=>'This is your public key information',
	'elggpg:identity'=>'Associated identity',
	'elggpg:manage'=>'Manage encryption',
	'elggpg:nosubject'=>'No subject',
	'elggpg:download'=>'Download',
	'elggpg:date'=>'Date',
	'elggpg:size'=>'Size',
	'river:addkey:user:default'=>'%s uploaded her %s',
	'elggpg:public_key:imported'=>'Key imported',
	'elggpg:sendamessage'=>'Send an encrypted message',
	'elggpg:nopublickey'=>'User has no public key',
	'elggpg:manage:header'=>'GPG Public Key',
	'elggpg:upload'=>'Upload a new public key',
	'elggpg:upload:error'=>'There was an error uploading the pubic key',
	'elggpg:label:name' => 'Name',
	'elggpg:label:email' => 'Email',
	'elggpg:label:comment' => 'Comment',
	'elggpg:label:fingerprint' => 'Fingerprint',
	'elggpg:created'=>'Created',
	'elggpg:expires'=>'Expires',
	'elggpg:type' => 'Type',
	'elggpg:type:encrypt' => 'To encrypt',
	'elggpg:type:sign' => 'To sign',
	'elggpg:name'=>'Name',
	'elggpg:email'=>'Email',
	'elggpg:notifications' => "Encrypted notifications",
	'elggpg:notifications:enabled' => "Encrypted notifications are <strong>enabled</strong>. You will recieve encrypted all e-mails you receive from this site.",
	'elggpg:notifications:disabled' => "Encrypted notifications are <strong>disabled</strong>. You won't recieve encrypted e-mails from this site.",
	'elggpg:notifications:settings' => "Click here to manage your encryption settings.",
	'elggpg:upload:unchanged'=>'Same public key uploaded',
	'elggpg:upload:imported'=>'Imported public key %s',
	'elggpg:email:encrypted'=>'Receive encrypted email notifications',
	'elggpg:comment'=>'Comment',
	'elggpg:subkey:showdetails' => 'Show subkeys details',
	'elggpg:raw:show' => 'Show RAW',
	'elggpg:subkey:id'=>'Subkey ID',
	'elggpg:expires:never'=>'Never',
	'elggpg:delete:confirm' => 'If you delete the GPG key, you will receive unencrypted messages since now',
	'elggpg:deleted' => 'Deleted public key',
	'elggpg:delete:error' => 'Error while deleting public key',
	'elggpg:messageforyou'=>'The message below has been encrypted for you',
	'elggpg:encrypt:emails' => 'Do you want to receive all our e-mails encrypted with your GPG key?',
	'elggpg:encrypt:site_messages' => 'Also all private messages?',
	'elggpg:import:report'=>'Imported: %s\n Unchanged: %s\n New user ids: %s\n New subkeys: %s\n Secret imported: %s\n Secret unchanged: %s\n New signatures: %s\n Skipped keys: %s',
);

add_translation("en", $language);

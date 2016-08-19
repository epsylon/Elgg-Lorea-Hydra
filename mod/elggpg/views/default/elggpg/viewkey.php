<?php
/**
 * ElggPG -- Display key
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

// user is passed to view and set by caller (normally the page editicon)
$currentuser = $vars['user'];


// new class
elgg_load_library('elggpg');
$info = elggpg_keyinfo($currentuser);
$fingerprint = elgg_view('output/fingerprint', array('value' => $info['fingerprint']));

if (!$info) {
	echo '<p>'. elgg_echo("elggpg:nopublickey") . '</p>';
	return false;
}

$name_label = elgg_echo('elggpg:label:name');
$email_label = elgg_echo('elggpg:label:email');
$comment_label = elgg_echo('elggpg:label:comment');
$fingerprint_label = elgg_echo('elggpg:label:fingerprint');

$subkey_id  = elgg_echo('elggpg:subkey:id');
$type    = elgg_echo('elggpg:type');
$created = elgg_echo('elggpg:created');
$expires = elgg_echo('elggpg:expires');

$key_info = <<<HTML
<table class="elgg-table-alt">
	<tr class="odd">
		<td><strong>$name_label:</strong></td>
		<td>{$info['name']}</td>
	</tr>
	<tr class="even">
		<td><strong>$email_label:</strong></td>
		<td>{$info['email']}</td>
	</tr>
	<tr class="odd">
		<td><strong>$comment_label:</strong></td>
		<td>{$info['comment']}</td>
	</tr>
	<tr class="even">
		<td><strong>$fingerprint_label:</strong></td>
		<td>$fingerprint</td>
	</tr>
</table>
HTML;

echo elgg_view_module('info', '', $key_info);

echo elgg_view('output/url', array(
	'class' => 'elggpg-subkeys-toggle',
	'text' => elgg_echo('elggpg:subkey:showdetails'),
	'href' => '',
));
echo '<br />';
echo elgg_view('output/url', array(
	'class' => 'elggpg-raw-toggle',
	'text' => elgg_echo('elggpg:raw:show'),
	'href' => "elggpg/raw/$currentuser->username",
));

$subkeys_info = <<<HTML
<table id="elggpg-subkeys" class="elgg-table mtm hidden">
	<th>$subkey_id</th><th>$type</th><th>$created</th><th>$expires</th>
HTML;

foreach ($info['subkeys'] as $subkey) {

	$keyid = $subkey["keyid"];

	$created = date('d M Y', $subkey['created']);

	if ($subkey['expires']) {
		$expires = date('d M Y', $subkey['expires']);
	} else {
		$expires = elgg_echo('elggpg:expires:never');
	}

	$type = elgg_echo('elggpg:type:'.$subkey['type']);

	$subkeys_info .= <<<HTML
	<tr><td>$keyid</td><td>$type</td><td>$created</td><td>$expires</td></tr>
HTML;

}

$subkeys_info .= <<<HTML
</table>
HTML;

echo elgg_view_module('inline', '', $subkeys_info);

$textarea = '<textarea id="elggpg-raw" class="hidden" readonly="readonly"></textarea>';
echo elgg_view_module('inline', '', $textarea);

echo <<<HTML
<script type="text/javascript">
$(function() {
	$('.elggpg-subkeys-toggle').click(function() {
		$('#elggpg-subkeys').fadeToggle('slow');
		return false;
	});
	$('.elggpg-raw-toggle').toggle(function() {
		$('#elggpg-raw').load('/elggpg/raw/$currentuser->username').fadeIn();
		return false;
	}, function() {
		$('#elggpg-raw').fadeOut();
		return false;
	});
});
</script>
HTML;

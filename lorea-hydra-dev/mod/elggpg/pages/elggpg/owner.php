<?php
/**
 * ElggPG -- Upload page
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
if (!$owner || !elgg_instanceof($owner, 'user') || !($owner->isFriend() || $owner->guid == elgg_get_logged_in_user_guid())) {
	forward();
}

elgg_push_breadcrumb(elgg_echo('members'), "members");
elgg_push_breadcrumb($owner->name, $owner->getURL());
elgg_push_breadcrumb(elgg_echo('elggpg:manage'));

$title = elgg_echo("elggpg:manage:header");
$content = elgg_view("elggpg/viewkey", array('user' => $owner));

if($owner->guid == elgg_get_logged_in_user_guid()) {
	$form_vars = array(
		'enctype' => "multipart/form-data",
		'class' => 'mtl',
	);
	$body_vars = array(
		'user' => $owner,
	);

	$content .= elgg_view_form("elggpg/pubkey_upload", $form_vars, $body_vars);

	if(!empty($owner->openpgp_publickey)) {
		elgg_register_menu_item('title', array(
				'name' => 'elggpg_delete',
				'href' => 'action/elggpg/pubkey_delete?username='.$owner->username,
				'text' => elgg_echo('delete'),
				'link_class' => 'elgg-button elgg-button-delete',
				'is_action' => true,
				'confirm' => elgg_echo('elggpg:delete:confirm'),
		));
	}
}
if (!empty($owner->openpgp_publickey)) {
	elgg_register_menu_item('title', array(
			'name' => 'elggpg_download',
			'href' => 'elggpg/download/'.$owner->username,
			'text' => elgg_echo('elggpg:download'),
			'link_class' => 'elgg-button elgg-button-action',
	));
}

$body = elgg_view_layout('content', array(
	'title' => $title,
	'content' => $content,
	'sidebar' => elgg_view('elggpg/sidebar'),
	'filter' => '',
));

echo elgg_view_page($title, $body);

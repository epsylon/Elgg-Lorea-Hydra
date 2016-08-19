<?php

namespace AU\GroupNotices;

/**
 * AU group notices
 * allows group owners to add persistent notices to a group
 */
const PLUGIN_ID = 'au_group_notices';

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init');

/**
 * plugin init
 */
function init() {
	//add option to save form
	elgg_register_action('au_group_notices/save', __DIR__ . "/actions/au_group_notices/save.php");

	// Extend the main CSS file
	elgg_extend_view('css/elgg', 'css/au_group_notices');

	// add settings for tools
	elgg_extend_view('groups/edit', 'au_group_notices/au_group_notices_settings');

	elgg_register_event_handler('pagesetup', 'system', __NAMESPACE__ . '\\pagesetup');
}

/**
 * Page setup event
 */
function pagesetup() {

	$group = elgg_get_page_owner_entity();

	if (!$group instanceof \ElggGroup) {
		return true;
	}

	$position = $group->au_group_notice_position;
	switch ($position) {
		case 'top':
			elgg_extend_view('page/elements/body', 'au_group_notices/au_group_notices_show', 499);
			break;
		case 'bottom':
			elgg_extend_view('page/elements/body', 'au_group_notices/au_group_notices_show', 501);
			break;
		case 'sidebottom':
			elgg_extend_view('page/elements/sidebar', 'au_group_notices/au_group_notices_show', 600);
			break;
		case 'sidetop':
			elgg_extend_view('group/default', 'au_group_notices/au_group_notices_show', 100);
			break;
		default:
			// do nothing - if position not set, no settings provided
			break;
	}
}

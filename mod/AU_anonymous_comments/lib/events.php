<?php

namespace AU\AnonymousComments;

/**
 * page setup - protect anon user owned pages
 */
function pagesetup() {
	$user = get_anon_user();
	$page_owner = elgg_get_page_owner_entity();
	
	if ($user->guid == $page_owner->guid) {
		// admin could log in as the anon user to set some things
		if ($user->guid != elgg_get_logged_in_user_guid()) {
			admin_gatekeeper();
		}
	}
}

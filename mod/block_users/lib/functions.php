<?php

namespace MFP\BlockUsers;

/**
 * Unblocks $blocked_user as blocked by $blocking_user.
 *
 * @param ElggUser $blocked_user
 * @param ElggUser $blocking_user
 * @return bool
 */
function block_user(\ElggUser $blocked_user, \ElggUser $blocking_user) {
	if (!$blocked_user instanceof \ElggUser) {
		return false;
	}

	if ($blocking_user && ! ($blocking_user instanceof \ElggUser)) {
		return false;
	} elseif (!$blocking_user) {
		$blocking_user = elgg_get_logged_in_user_entity();
	}

	// can't block admins
	if ($blocked_user->isAdmin()) {
		return false;
	}

	return add_entity_relationship($blocking_user->getGUID(), 'blocked', $blocked_user->getGUID());
}

/**
 * Unblocks $blocked_user as blocked by $blocking_user.
 *
 * @param ElggUser $blocked_user
 * @param ElggUser $blocking_user
 * @return type bool
 */
function unblock_user(\ElggUser $blocked_user, \ElggUser $blocking_user) {
	return remove_entity_relationship($blocking_user->getGUID(), 'blocked', $blocked_user->getGUID());
}

/**
 * Is $blocked_user blocked by $blocking_user?
 *
 * @param ElggUser $blocked_user
 * @param ElggUser $blocking_user
 * @return type bool
 */
#### 2016-01-13 ikujam - avoid warning if argument is group
#function is_blocked(\ElggUser $blocked_user, \ElggUser $blocking_user) {
function is_blocked($blocked_user, $blocking_user) {
	if (!($blocked_user instanceof \ElggUser) || !($blocking_user instanceof \ElggUser)) {
		return false;
	}
	return (bool) check_entity_relationship($blocking_user->getGUID(), 'blocked', $blocked_user->getGUID());
}

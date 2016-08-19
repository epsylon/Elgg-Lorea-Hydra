<?php

namespace AU\LikedContent;

/**
 * 
 * @param type $hook
 * @param type $type
 * @param type $return
 * @param type $params
 * @return ElggMenuItem
 */
function owner_block($hook, $type, $return, $params) {
	if (elgg_instanceof($params['entity'], 'group') && $params['entity']->liked_content_enable != 'no') {
		$url = 'liked_content/group/' . $params['entity']->guid;
		$item = new \ElggMenuItem('liked_content', elgg_echo('liked_content:group:liked_content'), $url);
		$return[] = $item;
	}

	if (elgg_instanceof($params['entity'], 'user')) {
		$url = 'liked_content/user/' . $params['entity']->username;
		$item = new \ElggMenuItem('liked_content', elgg_echo('liked_content:user:liked_content'), $url);
		$return[] = $item;
	}

	return $return;
}

/**
 * 
 * @param type $hook
 * @param type $type
 * @param type $return
 * @param type $params
 * @return type
 */
function entity_menu($hook, $type, $return, $params) {
	if (elgg_get_context() != 'liked_content_widget') {
		return $return;
	}

	foreach ($return as $key => $item) {
		if ($item->getName() != 'likes_count') {
			unset($return[$key]);
		}
	}

	return $return;
}

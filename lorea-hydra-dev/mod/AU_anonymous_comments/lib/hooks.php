<?php

namespace AU\AnonymousComments;

/**
 * Prevent hover menu stuff for our anonymous user
 * 
 * @param type $hook
 * @param type $type
 * @param type $return
 * @param type $params
 * @return array
 */
function hover_menu_hook($hook, $type, $return, $params) {
	$user = $params['entity'];
	$anon_user = get_anon_user();

	if ($user->guid == $anon_user->guid) {
		if (!elgg_is_admin_logged_in()) {
			return array();
		} else {
			// admin here, lets allow them access to the
			// edit settings/profile/avatar items
			$allowed = array(
				'profile:edit',
				'settings:edit'
			);

			foreach ($return as $key => $item) {
				if (in_array($item->getName(), $allowed)) {
					continue;
				}
				unset($return[$key]);
			}

			$return = array_values($return);
		}
	}

	return $return;
}

/**
 * 
 * @param type $hook
 * @param type $type
 * @param type $return
 * @param type $params
 * 
 * @return array();
 */
function user_icon_vars($hook, $type, $return, $params) {

	$user = ($params['vars']['entity'] instanceof \ElggUser) ? $params['vars']['entity'] : elgg_get_logged_in_user_entity();
	$anon_user = get_anon_user();

	if ($user->guid == $anon_user->guid) {
		$return['use_hover'] = false;
	}

	return $return;
}

/**
 * prevent emails to our anonymous user
 * 
 * @param type $hook
 * @param type $type
 * @param type $returnvalue
 * @param type $params
 * @return boolean
 */
function anon_email_hook($hook, $type, $returnvalue, $params) {
	$anon_user = get_anon_user();

	if ($anon_user && $anon_user->email == $params['to']) {
		return FALSE;
	}

	return $returnvalue;
}

/**
 * 
 * @param type $hook
 * @param type $type
 * @param type $return
 * @param type $params
 * @return boolean
 */
function permissions_check($hook, $type, $return, $params) {
	$context = elgg_get_context();
	if ($context == "AU_anonymous_comments_permissions") {
		return true;
	}

	return $return;
}

/**
 * This function checks if the entity is being moderated, if so we need to count
 * and return the number of APPROVED comments, not total comments
 * called by commments:count plugin hook
 * 
 * @param type $hook
 * @param type $type
 * @param type $returnvalue
 * @param type $params
 * @return int
 */
function comment_count_hook($hook, $type, $return, $params) {
	if (!is_moderated($params['entity'])) {
		return $return;
	}

	if (!$params['entity']->canEdit()) {
		return $return;
	}

	// can edit the content? can moderate
	// set a flag for us to see disabled comments
	$show_hidden = access_get_show_hidden_status();
	access_show_hidden_entities(true);

	$options = array(
		'type' => 'object',
		'subtype' => 'comment',
		'container_guid' => $params['entity']->guid,
		'count' => true
	);

	$total = (int) elgg_get_entities($options);

	// restore the flag
	access_show_hidden_entities($show_hidden);

	return $total;
}

/**
 * modify the entity menu for unapproved comments
 * 
 * @param type $hook
 * @param type $type
 * @param array $return
 * @param array $params
 * @return array
 */
function comment_entity_menu($hook, $type, $return, $params) {
	if (!($params['entity'] instanceof \ElggComment)) {
		return $return;
	}

	if ($params['entity']->isEnabled()) {
		return $return;
	}

	$entity = $params['entity']->getContainerEntity();
	if ($entity && $entity->canEdit()) {
		$return = array();

		$href = elgg_add_action_tokens_to_url('action/comments/moderate?guid[]=' . $params['entity']->guid . '&review=approve');
		$item = new \ElggMenuItem('approve', elgg_echo('Au_anonymous_comments:approve'), $href);
		$return[] = $item;

		$delete_url = elgg_add_action_tokens_to_url('action/comments/moderate?guid[]=' . $params['entity']->guid . '&review=delete');
		$item = new \ElggMenuItem('delete', elgg_view_icon('delete'), $delete_url);
		$item->setConfirmText(elgg_echo('question:areyousure'));
		$return[] = $item;

		$return = array_values($return);
	}
	
	return $return;
}


function htmlawed_config($hook, $type, $return, $params) {
	$config = array(
		'safe' => true,
		'deny_attribute' => 'class, on*',
		'anti_link_spam' => array('`.`', ''),
		'schemes' => '*:http,https,ftp,news,mailto,rtsp,teamspeak,gopher,mms,callto',
		'elements' => 'b, i, ul,li, u, blockquote, p, strong, em, s, ol, br,h1,h2,h3'
	);
	
	return array_merge($return, $config);
}
<?php
/**
 * Collaborative Pages function library
 */

/**
 * Prepare the add/edit form variables
 *
 * @param ElggObject $page
 * @return array
 */
function pad_pages_object_actions_menu($colab, $page){

	if (elgg_get_logged_in_user_guid() == $page->getOwnerGuid()) {
		$name = $colab ? 'collaborative' : 'non-collaborative';
		$url = "action/pages/make-$name/?guid=$page->guid";
		$text = elgg_echo("pages:make:$name");
		elgg_register_menu_item('title', array(
				'name' => $name,
				'href' => $url,
				'text' => $text,
				'link_class' => 'elgg-button elgg-button-action',
				'is_action' => true,
		));
	}
}

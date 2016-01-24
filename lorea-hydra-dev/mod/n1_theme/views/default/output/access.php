<?php
/**
 * Displays HTML for entity access levels.
 * Requires an entity because some special logic for containers is used.
 *
 * @uses int $vars['entity'] - The entity whose access ID to display.
 * 
 * @override views/default/output/access.php
 */

//sort out the access level for display
if (isset($vars['entity']) && elgg_instanceof($vars['entity'])) {
	$access_id = $vars['entity']->access_id;
	$access_class = 'elgg-access';
	$access_id_string = get_readable_access_level($access_id);
	$access_id_string = htmlentities($access_id_string, ENT_QUOTES, 'UTF-8');

	// if within a group or shared access collection display group name and open/closed membership status
	// @todo have a better way to do this instead of checking against subtype / class.
	$container = $vars['entity']->getContainerEntity();

	if ($container && $container instanceof ElggGroup) {
		// we decided to show that the item is in a group, rather than its actual access level
		// not required. Group ACLs are prepended with "Group: " when written.
		//$access_id_string = elgg_echo('groups:group') . $container->name;
		$membership = $container->membership;

		if ($membership == ACCESS_PUBLIC) {
			$access_class .= ' elgg-access-group-open';
		} else {
			$access_class .= ' elgg-access-group-closed';
		}
	}

	switch ($access_id) {
		case ACCESS_PRIVATE:
			$access_class .= ' elgg-access-private';
			break;
		case ACCESS_FRIENDS:
			$access_class .= ' elgg-access-friends';
			break;
		case ACCESS_LOGGED_IN:
			$access_class .= ' elgg-access-loggedin';
			break;
		case ACCESS_PUBLIC:
			$access_class .= ' elgg-access-public';
			break;
		default:
			$access_class .= ' elgg-access-group';
	}

	$help_text = elgg_echo('access:help');

	echo "<span title=\"$help_text\" class=\"$access_class\">$access_id_string</span>";
}

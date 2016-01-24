<?php
	$creator=false;
	// check if user is admin
	if (isadminloggedin()) $creator=true;

	// check if user is one of the specified group creators
	if (!$creator) {
		$creators_text = str_replace(' ', '', elgg_get_plugin_setting("creators", "curatedgroups"));
		$creators = explode(",", $creators_text);
		if (!empty($creators)) {
			if (in_array(elgg_get_logged_in_user_entity()->username, $creators)) {
				$creator = true;
			// Compatibility with CuratedGroups 1.0
			} elseif (in_array(elgg_get_logged_in_user_guid(), $creators)) {
				$creator = true;
			}
		}
	}

	// check if user is admin of the current group (for editing an
	// existing group)
	if (!$creator && isset($vars['entity'])) {
                if ($vars['entity']->canEdit())
			$creator = true;
        }

	// check if user is admin of the parent group if defined (for
	// subgroups)
	if (!$creator) {
		$parent_guid = (int)get_input("parent", 0);
		if (!empty($parent_guid)) {
			$parent = get_entity($parent_guid);
			if ($parent->canEdit())
				$creator = true;
		}
	}

	// show group creation form if we're a creator, otherwise show the not
	// allowed message
	if ($creator) {
		if (elgg_is_active_plugin("subgroups"))
			include elgg_get_plugins_path() . "subgroups/views/default/forms/groups/edit.php";
		else
			include elgg_get_plugins_path() . "groups/views/default/forms/groups/edit.php";
	}
	else {
		$message = elgg_get_plugin_setting("message", "curatedgroups");
		if (empty($message))
			$message = elgg_echo("curatedgroups:message");
		echo $message;
	}
?>

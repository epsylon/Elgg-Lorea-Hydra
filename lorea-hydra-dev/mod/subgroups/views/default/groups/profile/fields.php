<?php
/**
 * Group profile fields
 * 
 * @override mod/groups/views/default/groups/profile/fields.php
 */

$group = $vars['entity'];

$profile_fields = elgg_get_config('group');

if (is_array($profile_fields) && count($profile_fields) > 0) {

	$even_odd = 'odd';
	foreach ($profile_fields as $key => $valtype) {
		// do not show the name or hidden values
		if ($key == 'name' || $valtype == 'hidden') {
			continue;
		}

		$value = $group->$key;
		if (empty($value)) {
			continue;
		}

		$options = array('value' => $group->$key);
		if ($valtype == 'tags') {
			$options['tag_names'] = $key;
		}

		if ($output = elgg_view("output/$valtype", $options)) {

			echo "<div class=\"{$even_odd}\">";
			echo "<b>";
			echo elgg_echo("groups:$key");
			echo ": </b>";
			echo $output;
			echo "</div>";

			$even_odd = ($even_odd == 'even') ? 'odd' : 'even';
		}
	}
}

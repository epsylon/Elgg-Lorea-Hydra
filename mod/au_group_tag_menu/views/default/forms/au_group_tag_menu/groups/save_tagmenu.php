<?php

namespace AU\GroupTagMenu;

$group = $vars['entity'];

// build form to enter tags
if (!$group->menu_tags) {
	//populate with top existing group tags
	$options = array(
		'container_guids' => $group->guid,
		'types' => 'object',
		'threshold' => 0,
		'limit' => 5,
		'tag_names' => $group->tags,
		'order_by' => 'tag ASC',
	);
	$menutags = elgg_get_tags($options);
} else {
	//populate with group menu tags
	$menutags = $group->menu_tags;
}

echo "<div>";
echo "<label for='menu_tags'>" . elgg_echo('au_group_tag_menu:tags') . "</label>";
echo "<p>" . elgg_echo('au_group_tag_menu:tagblurb') . "</p>";
echo elgg_view('input/tags', array(
	'name' => 'menu_tags',
	'id' => 'menu_tags',
	'value' => $menutags,
));
echo "</div><div>";
//select the number of tags to show if using auto menu	
echo "<label for='menu_maxtags'>" . elgg_echo('au_group_tag_menu:maxtags') . "</label> ";

$options = array_merge(range(1, 10), range(15, 30, 5), range(40, 50, 10));
echo elgg_view("input/dropdown", array("name" => "menu_maxtags",
	"id" => "menu_maxtags",
	"options" => $options,
	"value" => $group->menu_maxtags,
));
echo "</p>";
echo "</div>";
echo "<div class='elgg-foot'>";
echo elgg_view("input/hidden", array("name" => "guid", "value" => $group->guid));
echo elgg_view("input/submit", array("value" => elgg_echo("save")));
echo "</div>";

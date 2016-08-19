<?php

namespace AU\GroupNotices;

elgg_require_js('au_group_notices/edit');

$group = $vars['entity'];

// build form 
$notice = $group->au_group_notice;
echo '<div class="ptm">' . elgg_echo('au_group_notices:help') . "</div>";
echo "<div class='elgg-button au-notices-show' id='au-show-notices'>" . elgg_echo('au_group_notices:toggle') . "</div>";

echo "<div id='au-group-notices'>"; // div containing all notices
//default notice
echo "<div class='au-group-notice-blurb'>";
echo "<br />";
echo "<div class='elgg-module-popup'><strong>" . elgg_echo('au_group_notices:noticeblurb') . "</strong>";
echo "<div class='au-group-notice-toggle'>" . elgg_echo("au_group_notices:click") . "</div></div>";
echo "</div>";
echo "<div class='au-group-notice-blurb-inner'>";
echo elgg_view('input/longtext', array(
	'name' => 'au_group_notice',
	'id' => 'au_group_notice',
	'value' => $notice,
		));
echo "</div>";

//iterate through different forms for different contexts
$contexts = array('blog', 'discussion', 'bookmarks', 'pages', 'file');
foreach ($contexts as $context) {
	$noticepart = "au_group_" . $context . "_notice";
	if (elgg_is_active_plugin($context) || $context == 'discussion') {
		$currentnotice = $group->{$noticepart};
		echo "<div class='au-group-notice-blurb'>";
		echo "<br />";
		echo "<div class='elgg-module-popup'>" . elgg_echo("au_group_notices:{$context}noticeblurb");
		echo "<div class='au-group-notice-toggle'>" . elgg_echo("au_group_notices:click") . "</div></div>";
		echo "</div>";
		echo "<div class='au-group-notice-blurb-inner'>";
		echo elgg_view('input/longtext', array(
			'name' => "{$noticepart}",
			'id' => "{$noticepart}",
			'value' => $currentnotice,
		));
		echo "</div>";
	}
}

echo "</div>"; //close div for show/hide notices

//select the location to show the notice
echo "<div>";
echo "<label for='au_group_notice_position'>" . elgg_echo('au_group_notices:position') . ": </label> ";
$position = $group->au_group_notice_position;
if (!$position) {
	$position = 'top';
}
$options = array(
	'top' => elgg_echo('au_group_notices:top'),
	'bottom' => elgg_echo('au_group_notices:bottom'),
	'sidetop' => elgg_echo('au_group_notices:sidetop'),
	'sidebottom' => elgg_echo('au_group_notices:sidebottom'),
);
echo elgg_view("input/select", array(
	"name" => "au_group_notice_position",
	"id" => "au_group_notice_position",
	"options_values" => $options,
	"value" => $position,
		));
echo "</div>";

echo "<div>";

//choose background colour
echo "<label for='au_group_notice_bg'>" . elgg_echo('au_group_notices:bg') . ": </label> ";
$bg = $group->au_group_notice_bg;
if (!$bg) {
	$bg = 'transparent';
}
$options = array('white' => elgg_echo('au_group_notices:white'),
	'black' => elgg_echo('au_group_notices:black'),
	'silver' => elgg_echo('au_group_notices:silver'),
	'red' => elgg_echo('au_group_notices:red'),
	'green' => elgg_echo('au_group_notices:green'),
	'yellow' => elgg_echo('au_group_notices:yellow'),
	'blue' => elgg_echo('au_group_notices:blue'),
	'transparent' => elgg_echo('au_group_notices:transparent'),
);
echo elgg_view("input/select", array(
	"name" => "au_group_notice_bg",
	"id" => "au_group_notice_bg",
	"options_values" => $options,
	"value" => $bg,
		));

echo "</div>";
echo "<div>";

//choose border, yes or no
echo "<label for='au_group_notice_border'>" . elgg_echo('au_group_notices:border') . ": </label> ";
$border = $group->au_group_notice_border;
if (!$border) {
	$border = '0';
}
$options = array(
	'1' => elgg_echo('option:yes'),
	'0' => elgg_echo('option:no')
);
echo elgg_view("input/select", array(
	"name" => "au_group_notice_border",
	"id" => "au_group_notice_border",
	"options_values" => $options,
	"value" => $border,
		));
echo "</div>";

//choose rounded corners, yes or no
echo "<div>";
echo "<label for='au_group_notice_corners'>" . elgg_echo('au_group_notices:corners') . ": </label> ";
$corners = $group->au_group_notice_corners;
if (!$corners) {
	$corners = '0';
}
$options = array(
	'1' => elgg_echo('option:yes'),
	'0' => elgg_echo('option:no')
);
echo elgg_view("input/select", array(
	"name" => "au_group_notice_corners",
	"id" => "au_group_notice_corners",
	"options_values" => $options,
	"value" => $corners,
		));
echo "</div>";


echo "<div class='elgg-foot'>";
echo elgg_view("input/hidden", array("name" => "guid", "value" => $group->guid));
echo elgg_view("input/submit", array("value" => elgg_echo("save")));
echo "</div>";

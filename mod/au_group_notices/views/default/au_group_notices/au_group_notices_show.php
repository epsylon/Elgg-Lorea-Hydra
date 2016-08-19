<?php

namespace AU\GroupNotices;

/* view to show notice in groups

  @uses au_group_notices_location[], au_group_notice[context,notice]

  this simply outputs a notice in a group if one exists

 */


$group = elgg_get_page_owner_entity();
if (!$group instanceof \ElggGroup) {
	return;
}

$bg = $group->au_group_notice_bg;
if (!$bg) {
	$bg = 'background-color:white;';
} else {
	$bg = "background-color:$bg;";
}

$border = $group->au_group_notice_border;
if ($border == '1') {
	$border = 'border: 1px solid black;';
} else {
	$border = 'border:none;';
}
$corners = $group->au_group_notice_corners;
if ($corners == '1') {
	$corners = 'border-radius: 10px;';
} else {
	$corners = 'border-radius: 0px;';
}

//first set this to the default notice
$notice = $group->au_group_notice;

//loop through other notice possibilities
$contexts = array('blog', 'discussion', 'bookmarks', 'pages', 'file');
foreach ($contexts as $context) {
	$noticepart = "au_group_" . $context . "_notice";
	if ($group->{$noticepart} && elgg_in_context($context)) {
		$notice = $group->{$noticepart};
	}
}

if ($notice) {
	// there is a notice to display so do so
	?>

	<div class="au-group-notice" style="<?php echo $bg . $border . $corners ?>">
		<?php echo elgg_view('output/longtext', array('value' => $notice)); ?>
	</div>
	<?php
}

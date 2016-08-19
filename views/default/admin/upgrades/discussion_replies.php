<?php
/**
 * Discussion reply upgrade page
 */

// Upgrade also possible hidden replies. This feature get run
// by an administrator so there's no need to ignore access.
$access_status = access_get_show_hidden_status();
access_show_hidden_entities(true);

$count = elgg_get_annotations(array(
	'annotation_names' => 'group_topic_post',
	'count' => true,
));

echo elgg_view('admin/upgrades/view', array(
	'count' => $count,
	'action' => 'action/admin/upgrades/upgrade_discussion_replies',
));

access_show_hidden_entities($access_status);

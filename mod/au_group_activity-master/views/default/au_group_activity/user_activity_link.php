<?php

/* @uses user

*/

$group=elgg_get_page_owner_entity();
$user=$params['entity'];
$handler = elgg_get_site_url()."group_activity_plus";

echo "<div>";
echo elgg_echo('aga:joindate').aga_group_join_date($group,$user);
echo "</div>";

echo "<div> ";
echo elgg_echo('aga:numposts');
echo elgg_view('output/url',array(
	        'text' => aga_get_post_count($group,'',$user),
	        'href' => "$handler/group/{$group->guid}/ingroup/{$user->username}",));
echo "</div>";

echo "<div> ";
echo elgg_echo('aga:generic_comment');
echo elgg_view('output/url',array(
	        'text' => aga_get_annotation_count($group,'generic_comment',$user),
	        'href' => "$handler/group/{$group->guid}/ingroup/{$user->username}?type=object",));
echo "</div>";

echo "<div> ";
echo elgg_echo('aga:group_topic_post');
echo elgg_view('output/url',array(
	        'text' => aga_get_annotation_count($group,'group_topic_post',$user),
	        'href' => "$handler/group/{$group->guid}/ingroup/{$user->username}?type=object&subtype=groupforumtopic",));
echo "</div>";
echo "<div> ";
echo elgg_echo('aga:first_post');
echo elgg_view('output/url',array(
	        'text' => aga_get_firstlast_post($group,'first',$user),
	        'href' => "$handler/group/{$group->guid}/ingroup/{$user->username}/asc",));
echo "</div>";
echo "<div> ";
echo elgg_echo('aga:last_post');
echo elgg_view('output/url',array(
	        'text' => aga_get_firstlast_post($group,'last',$user),
	        'href' => "$handler/group/{$group->guid}/ingroup/{$user->username}",));
echo "</div>";

echo "<div> ";
echo elgg_echo('aga:numpostsoverall');
echo elgg_view('output/url',array(
	        'text' => aga_get_post_count('','',$user),
	        'href' => "$handler/group/{$group->guid}/outgroup/{$user->username}",));
echo "</div>";
echo "<div>";
echo elgg_echo('aga:last_postsite');
echo elgg_view('output/url',array(
	        'text' => aga_get_firstlast_post(0,'last',$user),
	        'href' => "$handler/group/{$group->guid}/outgroup/{$user->username}",));
echo "</div>";

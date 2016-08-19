<?php
/**
 * Elgg custom index layout
 * 
 * Edited by psy@lorea.
 * 
 */

$mod_params = array('class' => 'elgg-module-highlight');

?>
<table style="border-spacing: 8px; border-collapse: separate;" width="100%" cols="3">
 <tr>
 <td width="33%">
<?php
// left column

// Top box for login or welcome message
if (elgg_is_logged_in()) {
	$top_box = "<h2>" . elgg_echo("Kaixo!") . " ";
	$top_box .= elgg_get_logged_in_user_entity()->name;
	$top_box .= "</h2>";
} else {
	$top_box = $vars['login'];
}
echo elgg_view_module('featured',  '', $top_box, $mod_params);

// a view for plugins to extend
echo elgg_view("index/lefthandside");

// tasks
//if (elgg_is_active_plugin('tasks')) {
//        echo elgg_view_module('featured',  elgg_echo("custom:tasks"), $vars['tasks'], $mod_params);
//}

// liked
//if (elgg_is_active_plugin('liked_content')) {
//        echo elgg_view_module('featured',  elgg_echo("custom:liked"), $vars['liked'], $mod_params);
//}

// market
if (elgg_is_active_plugin('market')) {
        echo elgg_view_module('featured',  elgg_echo("custom:market"), $vars['market'], $mod_params);
}

// videolist
//if (elgg_is_active_plugin('videolist')) {
//        echo elgg_view_module('featured',  elgg_echo("custom:videolist"), $vars['video'], $mod_params);
//}

?>
 </td>
 <td width="34%">
<?php
// mid column

// a view for plugins to extend
echo elgg_view("index/righthandside");

echo elgg_view_module('featured',  elgg_echo("custom:members"), $vars['members'], $mod_params);

// questions
if (elgg_is_active_plugin('questions')) {
        echo elgg_view_module('featured',  elgg_echo("custom:questions"), $vars['questions'], $mod_params);
}

// bookmarks
if (elgg_is_active_plugin('bookmarks')) {
        echo elgg_view_module('featured',  elgg_echo("custom:bookmarks"), $vars['bookmarks'], $mod_params);
}

// pages
//if (elgg_is_active_plugin('pages')) {
//        echo elgg_view_module('featured',  elgg_echo("custom:pages"), $vars['pages'], $mod_params);
//}

?>
  </td>
  <td width="33%">
<?php
//right column

// groups
if (elgg_is_active_plugin('groups')) {
        echo elgg_view_module('featured',  elgg_echo("custom:groups"), $vars['groups'], $mod_params);
}

// blogs
if (elgg_is_active_plugin('blog')) {
	echo elgg_view_module('featured',  elgg_echo("custom:blogs"), $vars['blogs'], $mod_params);
}

// photos
//if (elgg_is_active_plugin('tidypics')) {
//        echo elgg_view_module('featured',  elgg_echo("custom:tidypics"), $vars['tidypics'], $mod_params);
//}

// poll
if (elgg_is_active_plugin('polls')) {
        echo elgg_view_module('featured',  elgg_echo("custom:poll"), $vars['poll'], $mod_params);
}

?>
</td></tr></table>

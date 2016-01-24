<?php
/**
 * Elgg generic comment
 *
 * @package Elgg
 * @subpackage Core
 *
 *	Modified for moderated comments
 */

$owner = get_user($vars['annotation']->owner_guid);

$entity_guid = $vars['annotation']->entity_guid;

$mc_entity = get_entity($entity_guid);

// get array of unreviewed comments
$review_array = explode(',', $mc_entity->unmoderated_comments);


// find out if our logged in user is the owner of the entity
$entity_owner_id = $mc_entity->owner_guid;

if(elgg_get_logged_in_user_guid() == $entity_owner_id){ // user IS the owner - they can see and approve comments
	//set a flag
	$can_see_unapproved = TRUE;
}
else{
	$can_see_unapproved = FALSE;
}

/*

#### iku 2016-01-13  #1 ####
#
# function not AU_anonymous_comments_is_moderated found in module directory, commenting out 
#

// show the comment only if it's already been reviewed, or if we're the moderator, or if moderation is turned off
if(!in_array($vars['annotation']->id, $review_array) || $can_see_unapproved || !AU_anonymous_comments_is_moderated($entity_guid)){

	$mc_class = "generic_comment";
	$reviewed = true;
	if(AU_anonymous_comments_is_moderated($entity_guid)){
		if(in_array($vars['annotation']->id, $review_array)){	// we're moderating and this is unreviewed
			$mc_class = "generic_comment unreviewed";
			$reviewed = false;
		}
	}
# simplified condition : 

*/
if(!in_array($vars['annotation']->id, $review_array) || $can_see_unapproved ){
	$mc_class = "generic_comment";
	$reviewed = true;
	?>
<div
	class="<?php echo $mc_class; ?>">
	<!-- start of generic_comment div -->
	<div class="generic_comment_icon">
	<?php
	echo elgg_view_entity_icon($owner, 'small');
					?>
	</div>
	<div class="generic_comment_details">

		<!-- output the actual comment -->
	<?php echo elgg_view("output/longtext",array("value" => $vars['annotation']->value)); ?>

		<p class="generic_comment_owner">
			<a href="<?php echo $owner->getURL(); ?>"><?php echo $owner->name; ?>
			</a>
			<?php echo elgg_view_friendly_time($vars['annotation']->time_created); ?>
		</p>

		<?php

		// if the user looking at the comment can edit, show the delete link
		if ($vars['annotation']->canEdit() && $reviewed) {

			?>
			<p>
			<?php
	
			echo elgg_view("output/confirmlink",array(
						'href' => elgg_get_site_url() . "action/comments/delete?annotation_id=" . $vars['annotation']->id,
						'text' => elgg_echo('delete'),
						'confirm' => elgg_echo('deleteconfirm'),
			));
	
			?>
			</p>

		<?php
		} //end of can edit if statement
			
			
		/**
		 *
		 * 	Comment hasn't been reviewed, show options for approval/deletion
		 */
			
		if($can_see_unapproved && !$reviewed){

			echo "<div class=\"moderate_options\">";
			echo "<table><tr><td style=\"width: 60px; vertical-align: middle;\">";
			echo "<input type=\"checkbox\" name=\"moderate_comments[]\" value=\"" . $vars['annotation']->id . "\" onclick=\"javascript:mc_toggle_approve('" . $vars['annotation']->id . "');\">";
			echo "</td><td>";
			echo elgg_echo('AU_anonymous_comments:comment_text');
			echo "<br><br>";
			echo "<a href=\"" . elgg_get_site_url() . "mod/AU_anonymous_comments/actions/annotation/review.php?id=" . $vars['annotation']->id . "&method=approve\">Approve</a>";
			echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
			echo "<a href=\"" . elgg_get_site_url() . "mod/AU_anonymous_comments/actions/annotation/review.php?id=" . $vars['annotation']->id . "&method=delete\" onclick=\"return confirm('". elgg_echo('AU_anonymous_comments:delete_confirm') . "')\";>Delete</a>";
			echo "</td></tr></table>";
			echo "</div>";
		}
			
		?>
	</div>
	<!-- end of generic_comment_details -->
</div>
<!-- end of generic_comment div -->
		<?php
} // endif review check
?>

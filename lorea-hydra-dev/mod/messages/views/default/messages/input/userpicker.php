<?php
/**
 * User mail picker.  Sends a user guid.
 *
 * @package Elgg
 * @subpackage Core
 * @author Curverider Ltd
 * @link http://elgg.org/
 *
 * @uses $vars['value'] The current value, if any
 * @uses $vars['internalname'] The name of the input field
 * @uses $vars['onlyfriends'] 'yes' removes checkbox from view
 *
 * pops up defaulted to lazy load friends lists in paginated alphabetical order.
 * upon
 *
 * As users are checked they move down to a "users" box.
 * When this happens, a hidden input is created also.
 * 	{$internalnal}[] with the value th GUID.
 *
 */

$searchurl = elgg_get_site_url() . "messages/search";
$text = elgg_echo('messages:find:info');

?>
<script>
	$(function() {
		$( "#username" ).autocomplete({
			source: '<?php echo $searchurl; ?>',
			minLength: 2,
		});
	});
</script>

<div class="ui-widget">
	<label for="username"><?php echo $text; ?>:<br>
	<input id="username" name="username"></label>
</div>


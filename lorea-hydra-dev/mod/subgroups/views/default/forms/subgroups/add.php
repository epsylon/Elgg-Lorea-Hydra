<label class="subgroups-add-autocomplete" style="display:none">
<?php
	echo elgg_echo('subgroups:add:label'); echo '<br />';
	echo elgg_view('input/autocomplete', array(
		'name' => 'othergroup',
		'livesearch_url' => elgg_get_site_url().'ajax/view/subgroups/groups_i_can_edit',
		'class' => 'mvm',
	));
?>
</label>
<label class="subgroups-add-url">
<?php
	echo elgg_echo('subgroups:addurl:label'); echo '<br />';
	echo elgg_view('input/url', array('name' => 'othergroup_url', 'class' => 'mvm'));
?>
</label>
<?php
	echo elgg_view('input/hidden', array(
		'name' => 'group',
		'value' => $vars['group']->guid));
	echo elgg_view('input/submit', array(
		'value' => elgg_echo('subgroups:add:button')));
?>
<a href="" class="subgroups-dontwork-link mlm" style="display:none">(<?php echo elgg_echo('subgroups:dontwork'); ?>)</a>

<script type="text/javascript">
$(function(){
	$('.subgroups-add-autocomplete').show();
	$('.subgroups-add-url').hide();
	$('.subgroups-dontwork-link').show().click(function(){
		$('.subgroups-add-autocomplete').hide();
		$('.subgroups-add-url').show();
		$(this).hide();
		return false;
	});
});
</script>

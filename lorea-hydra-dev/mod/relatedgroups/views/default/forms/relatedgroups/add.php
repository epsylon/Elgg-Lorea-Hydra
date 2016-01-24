<label class="relatedgroups-add-autocomplete" style="display:none">
<?php
	echo elgg_echo('relatedgroups:add:label'); echo '<br />';
	echo elgg_view('input/autocomplete', array('name' => 'othergroup', 'class' => 'mvm'));
?>
</label>
<label class="relatedgroups-add-url">
<?php
	echo elgg_echo('relatedgroups:addurl:label'); echo '<br />';
	echo elgg_view('input/url', array('name' => 'othergroup_url', 'class' => 'mvm'));
?>
</label>
<?php
	echo elgg_view('input/hidden', array(
		'name' => 'group',
		'value' => $vars['group']->guid));
	echo elgg_view('input/submit', array(
		'value' => elgg_echo('relatedgroups:add:button')));
?>
<a href="" class="relatedgroups-dontwork-link mlm" style="display:none">(<?php echo elgg_echo('relatedgroups:dontwork'); ?>)</a>

<script type="text/javascript">
$(function(){
	$('.relatedgroups-add-autocomplete').show();
	$('.relatedgroups-add-url').hide();
	$('.relatedgroups-dontwork-link').show().click(function(){
		$('.relatedgroups-add-autocomplete').hide();
		$('.relatedgroups-add-url').show();
		$(this).hide();
		return false;
	});
});
</script>

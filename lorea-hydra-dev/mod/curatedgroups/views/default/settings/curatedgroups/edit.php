<p>
	<?php echo elgg_echo('curatedgroups:settings:message'); ?>:
	<?php
		echo elgg_view('input/text', array('name' => 'params[message]', 'value' => $vars['entity']->message));
	?>
</p>

<p>
	<?php echo elgg_echo('curatedgroups:settings:creators'); ?>:
	<?php
		echo elgg_view('input/text', array('name' => 'params[creators]', 'value' => $vars['entity']->creators));
	?>
</p>

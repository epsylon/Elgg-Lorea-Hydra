<?php

if (elgg_get_plugin_setting('enableprivacy', 'messages') == 'yes') {

	echo elgg_echo('messages:friendsonly');
	
	$friendsonly = elgg_get_plugin_user_setting('friendsonly', elgg_get_logged_in_user_guid(), 'messages');
	echo elgg_view('input/dropdown', array(
					'name' => 'params[friendsonly]',
					'value' => $friendsonly,
					'options_values' => array(
								'no' => elgg_echo('option:no'),
								'yes' => elgg_echo('option:yes'))
					));

}


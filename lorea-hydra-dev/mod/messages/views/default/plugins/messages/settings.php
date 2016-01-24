<?php

$admins = elgg_get_admins();

echo elgg_view('input/dropdown', array(
					'name' => 'params[enableprivacy]',
					'value' => $vars['entity']->enableprivacy,
					'options_values' => array(
								'no' => elgg_echo('option:no'),
								'yes' => elgg_echo('option:yes'))
					));

echo elgg_echo('messages:enable:privacy');

echo "<br /><hr><br />";

echo elgg_view('input/dropdown', array(
                        'name' => 'params[messages_refresh_rate]',
                        'value' => $vars['entity']->messages_refresh_rate,
                        'options_values' => array(
						''  => elgg_echo('messages:admin:none'),
						'10000'  => '10 ' . elgg_echo('messages:admin:seconds'),
						'20000'  => '20 ' . elgg_echo('messages:admin:seconds'),
						'30000'  => '30 ' . elgg_echo('messages:admin:seconds'),
						'45000'  => '45 ' . elgg_echo('messages:admin:seconds'),
						'60000'  => '1 ' . elgg_echo('messages:admin:minute'),
						'120000'  => '2 ' . elgg_echo('messages:admin:minutes'),
						'180000'  => '3 ' . elgg_echo('messages:admin:minutes'),
						'240000'  => '4 ' . elgg_echo('messages:admin:minutes'),
						'300000'  => '5 ' . elgg_echo('messages:admin:minutes'),
						'600000' => '10 ' . elgg_echo('messages:admin:minutes'),
						'1200000' => '20 ' . elgg_echo('messages:admin:minutes'),
						'1800000' => '30 ' . elgg_echo('messages:admin:minutes'),
						),
			));
echo elgg_echo('messages:messages_refresh_rate');
echo "<br /><hr><br />";

// Section to select an admin account other admins can use to set as sender
echo "<h4>" . elgg_echo('messages:adminsend') . "</h4><br>";

$admins = elgg_get_admins();
$options = array();
$options[] = elgg_echo('messages:adminsend:not:enabled');
foreach ($admins as $admin) {
	$options[$admin->guid] = $admin->name;
}

echo elgg_view('input/dropdown', array(
					'name' => 'params[siteadmin]',
					'value' => $vars['entity']->siteadmin,
					'options_values' => $options,
					));
echo elgg_echo('messages:adminsend:choose');
echo "<br /><br />";


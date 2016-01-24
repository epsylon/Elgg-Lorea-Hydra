<?php

	$paypal_code = $vars['entity']->paypal_code;
	$bank_account = $vars['entity']->bank_account;
	$bitcoin_code = $vars['entity']->bitcoin_code;
	$bitcoin_label = $vars['entity']->bitcoin_label;

	echo "<br /><hr>";
	echo elgg_echo('donation:sidebar_donation');
	echo elgg_view('input/dropdown', array(
                        'name' => 'params[sidebar_donation]',
                        'value' => $vars['entity']->sidebar_donation,
                        'options_values' => array(
                                'yes' => elgg_echo('option:yes'),
                                'no' => elgg_echo('option:no'),
                        	),
                	));

	echo "<br /><br />";

	echo elgg_echo('donation:profile_show');
	echo elgg_view('input/dropdown', array(
                        'name' => 'params[profile_show]',
                        'value' => $vars['entity']->profile_show,
                        'options_values' => array(
                                'small' => elgg_echo('donation:small'),
                                'tiny' => elgg_echo('donation:tiny'),
                        	),
                	));

	echo "<br /><br />";

	echo elgg_echo('donation:useriver');
	echo elgg_view('input/dropdown', array(
                        'name' => 'params[useriver]',
                        'value' => $vars['entity']->useriver,
                        'options_values' => array(
                                'yes' => elgg_echo('option:yes'),
                                'no' => elgg_echo('option:no'),
                	        ),
                	));

	echo "<br /><br />";

	echo elgg_echo('donation:profile_donation');
	echo elgg_view('input/dropdown', array(
                        'name' => 'params[profile_donation]',
                        'value' => $vars['entity']->profile_donation,
                        'options_values' => array(
                                'yes' => elgg_echo('option:yes'),
                                'no' => elgg_echo('option:no'),
                        ),
                ));

	echo "<br /><br />";

	echo elgg_echo('donation:num_display');
	echo elgg_view('input/dropdown', array(
                        'name' => 'params[num_display]',
                        'value' => $vars['entity']->num_display,
                        'options_values' => array(
                                '4' => '4',
                                '6' => '6',
                                '8' => '8',
                                '12' => '12',
                                '16' => '16',
                                '24' => '24',
                                '32' => '32',
                        ),
                ));

	echo "<br /><br />";

	echo elgg_echo('donation:expires');
	echo elgg_view('input/dropdown', array(
                        'name' => 'params[expires]',
                        'value' => $vars['entity']->expires,
                        'options_values' => array(
                                '1' => '1',
                                '3' => '3',
                                '6' => '6',
                                '12' => '12',
                                '18' => '18',
                                '24' => '24',
                        ),
                ));

	echo "<br /><br />";

	echo elgg_echo('donation:paypal_code');
	echo elgg_view('input/plaintext', array('name'=>'params[paypal_code]', 'value'=>$paypal_code));

	echo "<br /><br />";

	echo elgg_echo('donation:bitcoin_code');
	echo elgg_view('input/text', array('name'=>'params[bitcoin_code]', 'value'=>$bitcoin_code));
	echo "<br /><br />";
	echo elgg_echo('donation:bitcoin_label');
	echo elgg_view('input/text', array('name'=>'params[bitcoin_label]', 'value'=>$bitcoin_label));
	echo "<br /><br />";
	echo elgg_echo('donation:bank_account');
	echo elgg_view('input/text', array('name'=>'params[bank_account]', 'value'=>$bank_account));

	echo "<br /><br />";


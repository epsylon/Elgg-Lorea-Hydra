<?php
/**
 * Elgg Donation plugin
 * @license: GPL v 2.
 * @author Tiger
 * @copyright TechIsUs
 * @link www.techisus.dk
 */

	$english = array(
	'donation:page1' => "Keep the network strong",
	'donation' => "Donations",
	'donation:title' => 'Help %s',
	'donation:title:everyone' => 'Those who already have contributed to %s',
	'donation:show:everyone' => 'Show all',
	'donation:desc' => "Help us keep %s running.",
	'donation:paypal' => "<strong>Via Paypal:</strong>",
	'donation:bitcoin' => "<strong>Via Bitcoin:</strong>",
	'donation:banktransfer' => "<strong>Via banktransfer:</strong>",
	'donation:latest' => "<strong>Latest Donators:</strong>",
	'donation:donator' => 'Contributer to %s',
	'donation:add' => 'Set as donator',
	'donation:remove' => 'Remove as donator',
	'donation:added' => 'The selected user is now a donator',
	'donation:removed' => 'The selected user is removed from the donator list',
	'donation:none' => 'No donators to display',

	// Plugin settings
	'donation:paypal_code' => "Optional: Insert Paypal code here:",
	'donation:bitcoin_code' => "Optional: Insert Bitcoin code here (<i>bitcoin:</i> and <i>?label</i> codes will be added for links by this plugin.):",
	'donation:bitcoin_label' => "Optional: Insert Bitcoin label here:",
	'donation:bank_account' => "Optional: A bank account number for bank transfers:",
	'donation:bank_account:text' => "Transfer to account:<br><b>%s</b><br>please state your username on the transfer.",
	'donation:num_display' => 'Number of donators to display:',
	'donation:sidebar_donation' => 'Show donation in sidebar:',
	'donation:profile_show' => 'Show donators as:',
	'donation:text' => 'Show names',
	'donation:small' => 'Small icons',
	'donation:tiny' => 'Tiny ikons',
	'donation:useriver' => 'Announce donations to River:',
	'donation:profile_donation' => 'Show donation status on profile:',
	'donation:expires' => 'Months donations are valid:',

	// Error messages
	'donation:add:error' => 'Error: Could not make user a donator!',

	// River
	'river:donation:user:default' => '%s have donated to this website. Thank you...',
	);
					
	add_translation("en",$english);
?>

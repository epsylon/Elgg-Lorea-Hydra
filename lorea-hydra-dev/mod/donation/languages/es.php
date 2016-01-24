<?php
/**
 * Elgg Donation plugin
 * @license: GPL v 2.
 * @author Tiger
 * @copyright TechIsUs
 * @link www.techisus.dk
 */

	$spanish = array(
	
	'donation' => "Donaciones",
	'donation:title' => 'Mantenimiento %s',
	'donation:title:everyone' => 'Habitantes que han contribu&iacute;do %s',
	'donation:show:everyone' => 'Ver todas',
	'donation:desc' => "Ayuda a mantener %s conectada!",
	'donation:paypal' => "<strong>Via Paypal:</strong>",
	'donation:bitcoin' => "<strong>Via Bitcoin:</strong>",
	'donation:banktransfer' => "<strong>Via transferencia bancaria:</strong>",
	'donation:latest' => "<strong>&Uacute;ltimas donantes:</strong>",
	'donation:donator' => 'Donante %s',
	'donation:add' => 'Habilitar como donante',
	'donation:remove' => 'Quitar como donante',
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
	'river:donation:user:default' => '%s ha hecho una donaci&oacute;n para mantener la red. Gracias...',
	);
					
	add_translation("es",$spanish);
?>

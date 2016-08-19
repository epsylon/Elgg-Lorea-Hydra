<?php

/**
 * Elgg Donation plugin
 * @license: GPL v 2.
 * @author slyhne/ura soul
 * @copyright Tiger Inc I/S
 * @link http://tiger-inc.eu
 */

// Get plugin settings
$profile_show = elgg_get_plugin_setting("profile_show","donation");
if(!$profile_show) $profile_show = "small";
$num_display = elgg_get_plugin_setting("num_display","donation");
if(!$num_display) $num_display = "8";
$paypal_code = elgg_get_plugin_setting("paypal_code","donation");
$bitcoin_code = elgg_get_plugin_setting("bitcoin_code","donation");
$bitcoin_label = elgg_get_plugin_setting("bitcoin_label","donation");
$bank_account = elgg_get_plugin_setting("bank_account","donation");

// Current time
$time = time();

$NameValuePairs[] = array('name' => 'donation', 'operand' => '>', 'value' => $time);
$order = array('name' => 'donation', 'direction' => 'DESC');
$query =  array(
		'type' => 'user',
		'limit' => $num_display,
    		'metadata_name_value_pairs' => $NameValuePairs, 
		'order_by_metadata' => $order);

$newest_donators = elgg_get_entities_from_metadata($query);

echo "<center>" . elgg_echo('donation:desc', array(elgg_get_config('sitename'))) . "<br><br>";
if($paypal_code){
	echo elgg_echo('donation:paypal');
	echo '<div class="elgg-paypal-button">' . $paypal_code . '</div>';
}
if($bitcoin_code){
	echo elgg_echo('donation:bitcoin');
	echo '<br>';
	echo '<div class="elgg-bitcoin-button"><a href="bitcoin:' . $bitcoin_code . '?label=' . $bitcoin_label . '"><img src="'. $CONFIG->site->url . 'mod/donation/graphics/BC_Rnd_32px.png" alt="we accept bitcoin donations"/></a>';
	echo '<br/><a href="bitcoin:' . $bitcoin_code . '?label=' . $bitcoin_label . '">' . $bitcoin_code . '</a></div>';
	echo '<br>';
}
if($bank_account){
	echo elgg_echo('donation:banktransfer');
	echo "<br>" . elgg_echo('donation:bank_account:text', array($bank_account)) . "<br>";
}

echo "<hr>";
echo elgg_echo('donation:latest');
echo '<br></center><div class="elgg-donator-list">';

if (!$newest_donators) {
	echo elgg_echo('donation:none');
} else {	
	echo "<ul class='elgg-gallery'>";
	foreach($newest_donators as $donator) {
		echo "<li class='elgg-item mrs'>";
		echo elgg_view_entity_icon($donator, $profile_show, array('hover' => false));
		echo "</li>";
	}
	echo "</ul>";
}
echo '</div>';

echo "<div class='clearfloat'></div>";
if (elgg_is_logged_in()) {
	echo "<div>";
	echo elgg_view('output/url', array(
			'href' => elgg_get_site_url() . 'donation',
			'text' => elgg_echo('donation:show:everyone'),
			));
	echo "</div>";
}

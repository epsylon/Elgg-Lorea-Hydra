<?php
/**
 * Elgg Donation plugin
 * @license: GPL v 2.
 * @author slyhne
 * @copyright Zurf.dk
 * @link zurf.dk/elgg
 */


// Current time
$time = time();

// How many should we display
$num_display = 200;

$NameValuePairs[] = array('name' => 'donation', 'operand' => '>', 'value' => $time);
$order = array('name' => 'donation', 'direction' => 'DESC');
$query =  array(
		'type' => 'user',
		'limit' => $num_display,
    		'metadata_name_value_pairs' => $NameValuePairs, 
		'order_by_metadata' => $order);

$newest_donators = elgg_get_entities_from_metadata($query);

echo "<ul class='elgg-gallery'>";
foreach($newest_donators as $donator){
	echo "<li class='elgg-item mrs'>";
	echo elgg_view_entity_icon($donator, 'medium', array('hover' => false));
	echo "</li>";
}
echo "</ul>";	


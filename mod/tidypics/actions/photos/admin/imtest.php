<?php
/**
 * Tidypics ImageMagick Location Test
 *
 *  Called through ajax. Not a registered Elgg action.
 */

$location = $_GET['location'];

$command = $location . "convert -version";

$result = system($command, $return_val);

if ($return_val == 0) {
	echo $result;
} else {
	echo elgg_echo('tidypics:lib_tools:error');
}

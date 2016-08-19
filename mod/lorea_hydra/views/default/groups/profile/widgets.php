<?php

/**
 * Modbash Clean Elgg Theme
 *
 * Copyright (c) 2015 ModBash
 *
 * @author     Shane Barron <admin@modbash.com>
 * @copyright  2015 SocialApparatus
 * @license    GNU General Public License (GPL) version 2
 * @version    1
 * @link       http://modbash.com
 */
echo '<ul id="groups-tools" class="elgg-gallery elgg-gallery-fluid mtl clearfix well">';

// enable tools to extend this area
echo elgg_view("groups/tool_latest", $vars);

// backward compatibility
$right = elgg_view('groups/right_column', $vars);
$left = elgg_view('groups/left_column', $vars);
if ($right || $left) {
    elgg_deprecated_notice('The views groups/right_column and groups/left_column have been replaced by groups/tool_latest', 1.8);
    echo $left;
    echo $right;
}

echo "</ul>";


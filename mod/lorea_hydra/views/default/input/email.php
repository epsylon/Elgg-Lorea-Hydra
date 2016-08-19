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
if (isset($vars['class'])) {
    $vars['class'] = "elgg-input-text {$vars['class']}";
} else {
    $vars['class'] = "elgg-input-text";
}

$defaults = array(
    'value'    => '',
    'disabled' => false,
);

$vars = array_merge($defaults, $vars);
?>
<input type="email" <?php echo elgg_format_attributes($vars); ?> />

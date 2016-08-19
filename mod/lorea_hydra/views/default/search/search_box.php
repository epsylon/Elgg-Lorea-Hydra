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
if (array_key_exists('value', $vars)) {
    $value = $vars['value'];
} elseif ($value = get_input('q', get_input('tag', NULL))) {
    $value = $value;
} else {
    $value = elgg_echo('search');
}

$class = "elgg-search";
if (isset($vars['class'])) {
    $class = "$class {$vars['class']}";
}

// @todo - why the strip slashes?
$value = stripslashes($value);

// @todo - create function for sanitization of strings for display in 1.8
// encode <,>,&, quotes and characters above 127
if (function_exists('mb_convert_encoding')) {
    $display_query = mb_convert_encoding($value, 'HTML-ENTITIES', 'UTF-8');
} else {
    // if no mbstring extension, we just strip characters
    $display_query = preg_replace("/[^\x01-\x7F]/", "", $value);
}
$display_query = htmlspecialchars($display_query, ENT_QUOTES, 'UTF-8', false);
?>
<form class="form-inline" role="search" action="<?php echo elgg_get_site_url(); ?>search" method="get" style="margin-bottom:10px;">
    <div class="form-group">
        <input type="text" class="form-control" name="q" placeholder="<?php echo elgg_echo('search'); ?>">
    </div>
    <button type="submit" class="btn btn-default"><?php echo elgg_echo('search:go'); ?></button>
</form>
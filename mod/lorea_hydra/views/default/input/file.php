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
if (!empty($vars['value'])) {
    echo elgg_echo('fileexists') . "<br />";
}

if (isset($vars['class'])) {
    $vars['class'] = "elgg-input-file {$vars['class']}";
} else {
    $vars['class'] = "elgg-input-file";
}

$defaults = array(
    'disabled' => false,
);

$attrs = array_merge($defaults, $vars);
?>
<div class="fileinput fileinput-new" data-provides="fileinput">
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
        <input type="file" <?php echo elgg_format_attributes($attrs); ?> />
    </span>
    <span class="fileinput-filename"></span>
    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
</div>


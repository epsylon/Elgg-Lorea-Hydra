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
$on_label = $vars['on_label'];
$off_label = $vars['off_label'];
$value = $vars['value'];
$id = $vars['id'];
?>
<div class="Switch <?php echo $value; ?>" id="<?php echo $id; ?>">
    <div class="Toggle"></div>
    <span class="On"><?php echo $on_label; ?></span> 
    <span class="Off"><?php echo $off_label; ?></span>
</div>
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
?>
<div class="col-md-6">
    <div role="form">
        <div class="form-group">
            <label for="login_username"><?php echo elgg_echo("loginusername"); ?></label>
            <input name='username' type="text" class="form-control" id="login_username" placeholder="<?php echo elgg_echo("loginusername"); ?> required">
        </div>
        <div class="form-group">
            <label for="login_password"><?php echo elgg_echo("password"); ?></label>
            <input name='password' type="password" class="form-control" id="login_password" placeholder="<?php echo elgg_echo("password"); ?> required">
        </div>
        <button type="submit" class="btn btn-success"><?php echo elgg_echo('login'); ?></button>
        <?php
        if (isset($vars['returntoreferer'])) {
            echo elgg_view('input/hidden', array('name' => 'returntoreferer', 'value' => 'true'));
        }
        echo elgg_view_menu('login', array(
            'sort_by' => 'priority',
            'class' => 'elgg-menu-general elgg-menu-hz mtm',
        ));
        ?>
    </div>
</div>
<div class="col-md-6">
    <center>
        <i class="fa fa-lock text-center" style="font-size:18em;"></i>
    </center>
</div>
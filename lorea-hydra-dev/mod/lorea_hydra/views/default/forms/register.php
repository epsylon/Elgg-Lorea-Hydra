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
$password = $password2 = '';
$username = get_input('u');
$email = get_input('e');
$name = get_input('n');

if (elgg_is_sticky_form('register')) {
    extract(elgg_get_sticky_values('register'));
    elgg_clear_sticky_form('register');
}
?>
<div class="col-md-6">
    <div class="form-group">
        <label><?php echo elgg_echo('name'); ?></label>
        <?php
        echo elgg_view('input/text', array(
            'name' => 'name',
            'value' => $name,
            'class' => 'elgg-autofocus form-control',
            'placeholder' => elgg_echo('name'),
            'required' => 'required'
        ));
        ?>
    </div>
    <div class="form-group">
        <label><?php echo elgg_echo('email'); ?></label>
        <?php
        echo elgg_view('input/email', array(
            'name' => 'email',
            'value' => $email,
            'class' => 'form-control',
            'placeholder' => elgg_echo('email'),
            'required' => 'required'
        ));
        ?>
    </div>
    <div class="form-group">
        <label><?php echo elgg_echo('username'); ?></label>
        <?php
        echo elgg_view('input/text', array(
            'name' => 'username',
            'value' => $username,
            'class' => 'form-control',
            'placeholder' => elgg_echo('username'),
            'required' => 'required'
        ));
        ?>
    </div>
    <div class="form-group">
        <label><?php echo elgg_echo('password'); ?></label>
        <?php
        echo elgg_view('input/password', array(
            'name' => 'password',
            'value' => $password,
            'class' => 'form-control',
            'placeholder' => elgg_echo('password'),
            'required' => 'required'
        ));
        ?>
    </div>
    <div class="form-group">
        <label><?php echo elgg_echo('passwordagain'); ?></label>
        <?php
        echo elgg_view('input/password', array(
            'name' => 'password2',
            'value' => $password2,
            'class' => 'form-control',
            'placeholder' => elgg_echo('passwordagain'),
            'required' => 'required'
        ));
        ?>
    </div>
    <?php
// view to extend to add more fields to the registration form
    echo elgg_view('register/extend', $vars);

// Add captcha hook
    echo elgg_view('input/captcha', $vars);

    echo '<div class="elgg-foot">';
    echo elgg_view('input/hidden', array('name' => 'friend_guid', 'value' => $vars['friend_guid']));
    echo elgg_view('input/hidden', array('name' => 'invitecode', 'value' => $vars['invitecode']));
    echo elgg_view('input/submit', array('name' => 'submit', 'value' => elgg_echo('register'), 'class' => 'btn btn-success pull-right'));
    echo '</div>';
    ?>
</div>
<div class="col-md-6">
    <center>
        <i class="fa fa-lock text-center" style="font-size:18em;"></i>
    </center>
</div>
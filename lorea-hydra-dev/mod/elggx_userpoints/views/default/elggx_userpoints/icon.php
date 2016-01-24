<?php

if ($vars['size'] == 'large') {
    if (elgg_get_plugin_setting('profile_display', 'elggx_userpoints')) {
?>

        <div class="userpoints_profile">
            <div><span><?php echo elgg_echo('elggx_userpoints:caifu') . ': ' . $vars['entity']->userpoints_points.elgg_echo('elggx_userpoints:xinbi');?></span></div>
        </div>

    <?php } ?>
<?php } ?>

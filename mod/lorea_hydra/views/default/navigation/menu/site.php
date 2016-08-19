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
$default_items = elgg_extract('default', $vars['menu'], array());
$more_items = elgg_extract('more', $vars['menu'], array());
$url = elgg_get_site_url();
?>
<div class='container'>
    <div class="row">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand" rel="home" href="<?php echo elgg_get_site_url(); ?>" title="<?php echo elgg_get_site_entity()->name; ?>">
                        <img src="<?php echo elgg_get_site_url(); ?>/mod/lorea_hydra/graphics/hydra-master.jpg">
                    </a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                    foreach ($default_items as $menu_item) {
                        echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
                    }
                    ?>
                </ul>
                <?php if ($more_items) { ?>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo elgg_echo("more"); ?> <b class="caret"></b></a>
                                <?php
                                echo elgg_view('navigation/menu/elements/section', array(
                                    'items' => $more_items,
                                    'class' => 'dropdown-menu'
                                ));
                                ?>
                        </li>
                    </ul>
                    <?php
                }
                if (elgg_is_logged_in()) {
// with topbar and logged in this menu hasn't sense
//                    $user_url = elgg_get_logged_in_user_entity()->getURL();
//                    $username = elgg_get_logged_in_user_entity()->username;
//                    echo "<ul class='nav navbar-nav navbar-right'>";
//                    echo "<li class='dropdown'>";
//                    echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>";
//                    echo elgg_echo("your-account");
//                    echo "<b class='caret'></b></a>";
//                    echo "<ul class='dropdown-menu'>";
//                    echo "<li role='presentation'><a href='$user_url'>";
//                    echo elgg_echo("view-your-profile");
//                    echo "</a></li>";
//		    echo "<li role='presentation'>";
//                    echo "<a href='{$url}dashboard'>";
//                    echo elgg_echo("view-your-dashboard");
//                    echo "</a></li>";
//                    echo "<li role='presentation'>";
//                    echo "<a href='{$url}messages/inbox/{$username}'>";
//                    echo '<span class="badge pull-right">' . messages_count_unread() . '</span>' . elgg_echo("view-your-inbox");
//                    echo "</a></li>";
//                    echo "<li role='presentation'>";
//                    echo "<a href='{$url}friends/{$username}'>";
//                    echo elgg_echo("view-your-friends");
//                    echo "</a></li>";
//                    echo "<li role='presentation'>";
//                    echo "<a href='{$url}whoviewedme'>";
//                    echo elgg_echo("view-your-visitants");
//                    echo "</a></li>";
//                    echo "<li role='presentation' class='divider'></li>";
//                    echo "<li role='presentation'>";
//                    echo "<a href='{$url}settings/user/{$username}'>";
//                    echo elgg_echo("view-your-settings");
//                    echo "</a></li>";
//                    echo "<li role='presentation'>";
//                    echo "<a href='{$url}profile/{$username}/edit'>";
//                    echo elgg_echo("edit-your-profile");
//                    echo "</a></li>";
//                    echo "<li role='presentation'>";
//                    echo "<a href='{$url}avatar/edit/{$username}'>";
//                    echo elgg_echo("edit-your-avatar");
//                    echo "</a></li>";
//                    if (elgg_is_admin_logged_in()) {
//                        echo "<li role='presentation'>";
//                        echo "<a href='{$url}admin'>";
//                        echo elgg_echo("admin");
//                        echo "</a></li>";
//                    }
//                    echo "<li role='presentation'>";
//                    echo "<a href='{$url}action/logout'>";
//                    echo elgg_echo("logout");
//                    echo "</a></li>";
//                    echo "</ul></li>";
//                    echo "</ul>";
                } else {
                    echo "<ul class='nav navbar-nav navbar-right'>";
                    echo "<li><a href='" . elgg_get_site_url() . "login'>Login</a></li>";
                    echo "<li><a href='" . elgg_get_site_url() . "register'>Register</a></li>";
                    echo "</ul>";
                }
                ?>
            </div>
        </nav>
    </div>
</div>

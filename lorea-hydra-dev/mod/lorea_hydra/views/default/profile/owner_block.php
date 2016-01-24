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
$user = elgg_get_page_owner_entity();

if (!$user) {
    // no user so we quit view
    echo elgg_echo('viewfailure', array(__FILE__));
    return TRUE;
}

$icon = elgg_view_entity_icon($user, 'large', array(
    'use_hover' => false,
    'use_link'  => false,
    'img_class' => 'photo u-photo',
        ));

$icon = "<img src='" . $user->getIconURL('large') . "' class='img-responsive'/>";

// grab the actions and admin menu items from user hover
$menu = elgg_trigger_plugin_hook('register', "menu:user_hover", array('entity' => $user), array());
$builder = new ElggMenuBuilder($menu);
$menu = $builder->getMenu();
$actions = elgg_extract('action', $menu, array());
$admin = elgg_extract('admin', $menu, array());

$profile_actions = '';
if (elgg_is_logged_in() && $actions) {
    $profile_actions = '<div class="btn-group-vertical btn-block" style="margin-top:20px;margin-bottom:20px;">';
    foreach ($actions as $action) {
        $item = elgg_view_menu_item($action, array('class' => 'btn btn-success'));
        $profile_actions .= "$item";
    }
    $profile_actions .= '</div>';
}

// if admin, display admin links
$admin_links = '';
if (elgg_is_admin_logged_in() && elgg_get_logged_in_user_guid() != elgg_get_page_owner_guid()) {
    $text = elgg_echo('admin:options');

    $admin_links = '<ul class="nav nav-pills nav-stacked">';
    $admin_links .= "<li><a rel=\"toggle\" href=\"#profile-menu-admin\">$text&hellip;</a>";
    $admin_links .= '<ul class="profile-admin-menu" id="profile-menu-admin">';
    foreach ($admin as $menu_item) {
        $admin_links .= elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
    }
    $admin_links .= '</ul>';
    $admin_links .= '</li>';
    $admin_links .= '</ul>';
}

// content links
$content_menu = elgg_view_menu('owner_block', array(
    'entity' => elgg_get_page_owner_entity(),
    'class'  => 'nav nav-pills nav-stacked',
        ));

echo <<<HTML

<div class="col-sm-4">
	$icon
	$profile_actions
	$content_menu
	$admin_links
</div>

HTML;

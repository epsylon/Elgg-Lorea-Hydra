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
echo elgg_view('page/elements/header_logo', $vars);

// drop-down login
//echo elgg_view('core/account/login_dropdown');
// insert site-wide navigation
echo elgg_view_menu('site', array(
    'sort_by' => 'priority'
));

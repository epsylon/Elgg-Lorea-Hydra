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

elgg_register_event_handler('init', 'system', 'elgg_clean_init');

function elgg_clean_init() {

    elgg_unextend_view('page/elements/header', 'search/header');
    elgg_extend_view('page/elements/sidebar', 'search/header', 0);

    if (elgg_get_context() != "admin") {
        elgg_require_js("elgg_clean/js");
    }

    elgg_register_event_handler('pagesetup', 'system', 'elgg_clean_pagesetup', 1000);

    elgg_register_plugin_hook_handler('head', 'page', 'elgg_clean_setup_head');

    $bower = elgg_get_site_url() . "mod/elgg_clean/vendors/bower_components/";

    elgg_register_css("bootstrap", "{$bower}bootstrap/dist/css/bootstrap.css", 0);
    elgg_register_css("open", "http://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic,400italic");
    elgg_register_css("passion", "http://fonts.googleapis.com/css?family=Passion+One");
    elgg_register_css("elgg_clean", elgg_get_site_url() . "mod/elgg_clean/css/elgg_clean.css", 10000);
    elgg_register_css("font-awesome", "{$bower}fontawesome/css/font-awesome.min.css");
    elgg_register_css("bootstrap-select", "{$bower}bootstrap-select/dist/css/bootstrap-select.min.css");
    elgg_register_css("jasny", "{$bower}jasny-bootstrap/dist/css/jasny-bootstrap.min.css");
    elgg_register_css("fuelux", "{$bower}fuelux/dist/css/fuelux.min.css");
    elgg_register_css("agency", elgg_get_site_url() . "mod/elgg_clean/css/agency.css", 20000);
    elgg_register_css("home", elgg_get_site_url() . "mod/elgg_clean/css/home.css", 30000);

    elgg_register_js('respond', '{$bower}respond/src/respond.js');
    elgg_define_js("bootstrap", array("src" => "{$bower}bootstrap/dist/js/bootstrap.min.js"));
    elgg_register_js("bootstrap-select", "{$bower}bootstrap-select/dist/js/bootstrap-select.min.js");
    elgg_register_js("jasny", "{$bower}jasny-bootstrap/dist/js/jasny-bootstrap.min.js");
    elgg_register_js("agency", elgg_get_site_url() . "mod/elgg_clean/js/agency.js");
    elgg_register_js("cbpAnimatedHeader", elgg_get_site_url() . "mod/elgg_clean/js/cbpAnimatedHeader.js");
    elgg_register_js("classie", elgg_get_site_url() . "mod/elgg_clean/js/classie.js");
    elgg_register_js("contact_me", elgg_get_site_url() . "mod/elgg_clean/js/contact_me.js");
    elgg_register_js("scrollspy", "{$bower}scrollspy/jquery.scrollspy.js");
    elgg_register_js("parallax", "{$boder}jquery-parallax/scripts/jquery.parallax-1.13.js");
    elgg_register_js("scrollto", "{$bower}jquery-parallax/scripts/jquery.scrollTo-1.4.2-min.js");
    elgg_define_js('fuelux', array(
        'src' => "{$bower}fuelux/dist/js/fuelux.min.js",
    ));


    if (elgg_get_context() != "admin") {
        elgg_load_js('respond');
        elgg_load_js("bootstrap");
        elgg_load_js("jscolor");
        elgg_load_js("elgg_clean");
        elgg_load_js("bootstrap-select");
        elgg_load_js("jasny");
        elgg_load_js("agency");
        elgg_load_js("parallax");
        elgg_load_js("scrollto");
        elgg_require_js("fuelux");
        elgg_load_css("bootstrap");
        elgg_load_css("open");
        elgg_load_css("passion");
        elgg_load_css("font-awesome");
        elgg_load_css("bootstrap-select");
        elgg_load_css("elgg_clean");
        elgg_load_css("jasny");
        elgg_load_css("fuelux");
        elgg_load_css("agency");
    }

    // non-members do not get visible links to RSS feeds
    if (!elgg_is_logged_in()) {
        elgg_unregister_plugin_hook_handler('output:before', 'layout', 'elgg_views_add_rss_link');
    }
    elgg_register_action("elgg_clean/contact", elgg_get_plugins_path() . "elgg_clean/actions/contact.php", "public");
}

/**
 * Rearrange menu items
 */
function elgg_clean_pagesetup() {
    elgg_unextend_view('page/elements/header', 'search/header');
}

/**
 * Register items for the html head
 *
 * @param string $hook Hook name ('head')
 * @param string $type Hook type ('page')
 * @param array  $data Array of items for head
 * @return array
 */
function elgg_clean_setup_head($hook, $type, $data) {
    $data['metas'][] = array(
        'name' => 'viewport',
        'content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0',
    );

    $data['links'][] = array(
        'rel' => 'apple-touch-icon',
        'href' => elgg_normalize_url('mod/elgg_clean/graphics/homescreen.png'),
    );

    return $data;
}

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

elgg_register_event_handler('init', 'system', 'lorea_hydra_init');

function lorea_hydra_init() {

    elgg_unextend_view('page/elements/header', 'search/header');
    elgg_extend_view('page/elements/sidebar', 'search/header', 0);

    if (elgg_get_context() != "admin") {
        elgg_require_js("lorea_hydra/js");
    }

    elgg_register_event_handler('pagesetup', 'system', 'lorea_hydra_pagesetup', 1000);

    elgg_register_plugin_hook_handler('head', 'page', 'lorea_hydra_setup_head');

    $bower = elgg_get_site_url() . "mod/lorea_hydra/vendors/bower_components/";

    elgg_register_css("bootstrap", "{$bower}bootstrap/dist/css/bootstrap.css", 0);
/**    elgg_register_css("open", "https://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic,400italic");
    elgg_register_css("passion", "https://fonts.googleapis.com/css?family=Passion+One");*/
    elgg_register_css("lorea_hydra", elgg_get_site_url() . "mod/lorea_hydra/css/lorea_hydra.css", 10000);
    elgg_register_css("font-awesome", "{$bower}fontawesome/css/font-awesome.min.css");
    elgg_register_css("bootstrap-select", "{$bower}bootstrap-select/dist/css/bootstrap-select.min.css");
    elgg_register_css("jasny", "{$bower}jasny-bootstrap/dist/css/jasny-bootstrap.min.css");
    elgg_register_css("fuelux", "{$bower}fuelux/dist/css/fuelux.min.css");
    elgg_register_css("agency", elgg_get_site_url() . "mod/lorea_hydra/css/agency.css", 20000);
    elgg_register_css("home", elgg_get_site_url() . "mod/lorea_hydra/css/home.css", 30000);

    elgg_register_js('respond', "{$bower}respond/src/respond.js");
    elgg_define_js("bootstrap", array("src" => "{$bower}bootstrap/dist/js/bootstrap.min.js"));
    elgg_register_js("bootstrap-select", "{$bower}bootstrap-select/dist/js/bootstrap-select.min.js");
    elgg_register_js("jasny", "{$bower}jasny-bootstrap/dist/js/jasny-bootstrap.min.js");
    elgg_register_js("agency", elgg_get_site_url() . "mod/lorea_hydra/js/agency.js");
    elgg_register_js("cbpAnimatedHeader", elgg_get_site_url() . "mod/lorea_hydra/js/cbpAnimatedHeader.js");
    elgg_register_js("classie", elgg_get_site_url() . "mod/lorea_hydra/js/classie.js");
    elgg_register_js("contact_me", elgg_get_site_url() . "mod/lorea_hydra/js/contact_me.js");
    elgg_register_js("scrollspy", "{$bower}scrollspy/jquery.scrollspy.js");
    elgg_register_js("parallax", "{$bower}jquery-parallax/scripts/jquery.parallax-1.13.js");
    elgg_register_js("scrollto", "{$bower}jquery.scrollTo/jquery.scrollTo.min.js");
    elgg_define_js('fuelux', array(
        'src' => "{$bower}fuelux/dist/js/fuelux.min.js",
    ));


    if (elgg_get_context() != "admin") {
        elgg_load_js('respond');
        elgg_load_js("bootstrap");
        elgg_load_js("jscolor");
        elgg_load_js("lorea_hydra");
        elgg_load_js("bootstrap-select");
        elgg_load_js("jasny");
        //elgg_load_js("agency");
        //elgg_load_js("parallax");
        //elgg_load_js("scrollto");
        elgg_require_js("fuelux");
        elgg_load_css("bootstrap");
        elgg_load_css("open");
        elgg_load_css("passion");
        elgg_load_css("font-awesome");
        elgg_load_css("bootstrap-select");
        elgg_load_css("lorea_hydra");
        elgg_load_css("jasny");
        elgg_load_css("fuelux");
        //elgg_load_css("agency");
    }

    // non-members do not get visible links to RSS feeds
    if (!elgg_is_logged_in()) {
        elgg_unregister_plugin_hook_handler('output:before', 'layout', 'elgg_views_add_rss_link');
    }
    elgg_register_action("lorea_hydra/contact", elgg_get_plugins_path() . "lorea_hydra/actions/contact.php", "public");
}

/**
 * Rearrange menu items
 */
function lorea_hydra_pagesetup() {
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
function lorea_hydra_setup_head($hook, $type, $data) {
    $data['metas'][] = array(
        'name' => 'viewport',
        'content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0',
    );

    $data['links'][] = array(
        'rel' => 'apple-touch-icon',
        'href' => elgg_normalize_url('mod/lorea_hydra/graphics/homescreen.png'),
    );

    return $data;
}

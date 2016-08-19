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

elgg_register_event_handler('init', 'system', 'hydra_theme_init');

function hydra_theme_init() { 
    elgg_unextend_view('page/elements/header', 'search/header');
    elgg_extend_view('page/elements/sidebar', 'search/header', 0);

    if (elgg_get_context() != "admin") {
        elgg_require_js("lorea_hydra/js");
    }

    $bower = elgg_get_site_url() . "mod/lorea_hydra/vendors/bower_components/";
    elgg_register_css("bootstrap", "{$bower}bootstrap/dist/css/bootstrap.css", 0);
    elgg_register_css("bootstrap-select", "{$bower}bootstrap-select/dist/css/bootstrap-select.min.css");
    elgg_register_css("jasny", "{$bower}jasny-bootstrap/dist/css/jasny-bootstrap.min.css");
    elgg_register_css("lorea_hydra", elgg_get_site_url() . "mod/hydra_theme/css/lorea_hydra.css", 10000);
    elgg_define_js("bootstrap", array("src" => "{$bower}bootstrap/dist/js/bootstrap.min.js"));
    //elgg_register_js("bootstrap", "{$bower}bootstrap/dist/js/bootstrap.min.js");
    elgg_register_js("bootstrap-select", "{$bower}bootstrap-select/dist/js/bootstrap-select.min.js");
    elgg_register_js("jasny", "{$bower}jasny-bootstrap/dist/js/jasny-bootstrap.min.js");
    elgg_register_js("lorea_hydra", elgg_get_site_url() . "mod/hydra_theme/css/lorea_hydra.css", 10000);

    if (elgg_get_context() != "admin") {
        elgg_load_css("bootstrap");
        elgg_load_css("bootstrap-select");
        elgg_load_css("lorea_hydra");
        elgg_load_css("jasny");
        elgg_load_js("bootstrap");
        elgg_load_js("jasny");
        elgg_load_js("bootstrap-select");
        elgg_load_js("lorea_hydra");
    }
}


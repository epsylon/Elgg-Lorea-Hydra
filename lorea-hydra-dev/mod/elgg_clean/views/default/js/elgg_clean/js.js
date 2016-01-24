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

define(['jquery', 'elgg', 'fuelux', 'bootstrap'], function ($, elgg, fuelux, bootstrap) {
    // Make sure widget column heights are correct
    if ($('.profile').length) {
        $('#elgg-widget-col-1').css('min-height', $('.profile').outerHeight(true) + 1);
    }

    $("select").selectpicker();

    var config = {
        ".photo": {
            "add": "img-responsive"
        },
        ".elgg-col-1of3": {
            "add": "col-lg-4 col-md-4 col-xs-12",
            "remove": "elgg-col-1of3"
        },
        ".elgg-col-2of3": {
            "add": "col-lg-8 col-md-8 col-xs-12",
            "remove": "elgg-col-2of3"
        },
        ".elgg-col-1of2": {
            "add": "col-md-6",
            "remove": "elgg-col-1of2"
        },
        ".elgg-button": {
            "add": "btn",
            "remove": "elgg-button"
        },
        ".elgg-input-text": {
            "add": "form-control",
            "remove": "elgg-input-text"
        },
        ".elgg-input-tag": {
            "add": "form-control",
            "remove": "elgg-input-tags"
        },
        ".elgg-input-url": {
            "add": "form-control",
            "remove": "elgg-input-url"
        },
        ".search-input": {
            "add": "form-control",
            "remove": "search-input"
        },
        ".elgg-input-password": {
            "add": "form-control",
            "remove": "elgg-input-password"
        },
        ".elgg-state-selected": {
            "add": "active",
            "remove": "elgg-state-selected"
        },
        ".elgg-menu-footer-default": {
            "add": "pull-right nav nav-pills",
            "remove": "elgg-menu-footer-default"
        },
        "elgg-menu-footer-alt": {
            "add": "pull-left nav nav-pills",
            "remove": "elgg-menu-footer-alt"
        },
        ".elgg-menu-filter-default": {
            "add": "nav nav-pills",
            "remove": "elgg-menu-filter-default elgg-menu-filter"
        },
        ".elgg-tabs": {
            "add": "nav nav-pills",
            "remove": "elgg-tabs"
        },
        ".elgg-menu-item-edit a": {
            "add": "btn btn-default btn-xs"
        },
        "ul.elgg-menu-page": {
            "add": "nav nav-pills nav-stacked",
            "remove": "elgg-menu-page elgg-menu elgg-menu-page-default"
        },
        "ul.elgg-menu-groups-my-status": {
            "add": "nav nav-pills",
            "remove": "elgg-menu-groups-my-status"
        },
        ".elgg-input-tags": {
            "add": "form-control",
            "remove": "elgg-input-tags"
        },
        ".elgg-module-featured": {
            "add": "panel panel-default",
            "remove": "elgg-module elgg-module-featured"
        },
        ".panel .elgg-head": {
            "add": "panel-heading"
        },
        ".panel .elgg-body": {
            "add": "panel-body"
        },
        ".panel h2": {
            "add": "panel-body"
        },
        ".elgg-longtext-control": {
            "add": "btn btn-info btn-xs",
            "remove": "elgg-longtext-control"
        },
        ".elgg-access": {
            "add": "label label-default"
        },
        ".elgg-input-email": {
            "add": "form-control"
        },
        ".elgg-button-action": {
            "add": "btn-primary",
            "remove": "elgg-button-action"
        },
        ".elgg-button-submit": {
            "add": "btn-success",
            "remove": "elgg-button-submit"
        },
        "select": {
            "add": "col-md-3 form-control"
        },
        "ul.elgg-menu-groups-my-status li": {
            "css": {
                "width": "100%"
            }
        },
        "ul.elgg-menu-page a": {
            "css": {
                "param": "width",
                "value": "100%"
            }
        },
        ".elgg-layout-one-sidebar .elgg-main": {
            "add": "col-md-9",
            "remove": "elgg-layout-one-sidebar elgg-main"
        },
        ".elgg-sidebar": {
            "add": "col-md-3",
            "remove": "elgg-sidebar"
        },
        ".elgg-icon": {
            "add": "fa fa-lg",
            "remove": "elgg-icon"
        },
        ".elgg-icon-push-pin-alt": {
            "add": "fa-bookmark",
            "remove": "elgg-icon-push-pin-alt"
        },
        ".elgg-icon-rss": {
            "add": "fa-rss",
            "remove": "elgg-icon-rss"
        },
        ".elgg-icon-report-this": {
            "add": "fa-bullhorn",
            "remove": "elgg-icon-report-this"
        },
        ".elgg-icon-settings-alt": {
            "add": "fa-cogs",
            "remove": "elgg-icon-setting-alt"
        },
        ".elgg-icon-delete-alt": {
            "add": "fa-times",
            "remove": "elgg-icon-delete-alt"
        },
        ".elgg-icon-delete": {
            "add": "fa-times",
            "remove": "elgg-icon-delete"
        },
        ".elgg-icon-thumbs-up": {
            "add": "fa-thumbs-up",
            "remove": "elgg-icon-thumbs-up"
        },
        ".elgg-icon-thumbs-up-alt": {
            "add": "fa-thumbs-up",
            "remove": "elgg-icon-thumbs-up-alt"
        }
    };

    $.each(config, function (div, params) {

        $.each(params, function (action, div2) {
            switch (action) {
                case "add":
                    $(div).addClass(div2);
                    break;
                case "remove":
                    $(div).removeClass(div2);
                    break;
                case "css":
                    $(div).css(div2.param, div2.value);
                    break;
            }
        });

    });


    $("#page").animate({opacity: 1}, 10);
    // Apply bootstrap classes
    $("textarea").removeAttr("cols").removeAttr("rows").addClass("form-control");

});
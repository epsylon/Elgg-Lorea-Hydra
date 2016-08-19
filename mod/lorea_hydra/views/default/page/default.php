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
if (elgg_get_context() == 'admin') {
    if (get_input('handler') != 'admin') {
        elgg_deprecated_notice("admin plugins should route through 'admin'.", 1.8);
    }
    _elgg_admin_add_plugin_settings_menu();
    elgg_unregister_css('elgg');
    echo elgg_view('page/admin', $vars);
    return true;
}
$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));
$header = elgg_view('page/elements/header', $vars);
$content = elgg_view('page/elements/body', $vars);
$footer = elgg_view('page/elements/footer', $vars);
$body = "<div class='elgg-page elgg-page-default'>";
$body .= "<div class='elgg-page-messages'>";
$body .= $messages;
$body .= "</div>";
$body .= "<div class='elgg-page-header'>";
$body .= $header;
$body .= "</div>";
$body .= "<div class='elgg-page-body'>";
$body .= "<div id='page'>";
$body .= "<div class='container'>";
$body .= "<div class='row'>";
$body .= $content;
$body .= "</div>";
$body .= "</div>";
$body .= "</div>";
$body .= "</div>";
$body .= "<div class='elgg-page-footer'>";
$body .= "<div class='container'>";
$body .= $footer;
$body .= "</div>";
$body .= "</div>";
$body .= "</div>";
$body .= elgg_view('page/elements/foot');
$head = elgg_view('page/elements/head', $vars['head']);
$params = array(
    'head' => $head,
    'body' => $body,
);
if (isset($vars['body_attrs'])) {
    $params['body_attrs'] = $vars['body_attrs'];
}
echo elgg_view("page/elements/html", $params);

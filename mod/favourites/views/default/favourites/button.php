<?php
/**
 * Elgg favourites button
 *
 * @uses $vars['entity']
 */

if (!isset($vars['entity'])) {
    return true;
}

$guid = $vars['entity']->getGUID();

// check to see if the user has already marked this as favourite
if (elgg_is_logged_in() && $vars['entity']->canAnnotate(0, 'favourite')) {
    if (!elgg_annotation_exists($guid, 'favourite')) {
        $url = elgg_get_site_url() . "action/favourites/add?guid={$guid}";
        $params = array(
            'href' => $url,
            'text' => elgg_view_icon('star-empty'),
            'title' => elgg_echo('favourites:markthis'),
            'is_action' => true,
            'is_trusted' => true,
        );
        $favourites_button = elgg_view('output/url', $params);
    }
    else {
        $url = elgg_get_site_url() . "action/favourites/delete?guid={$guid}";
        $params = array(
            'href' => $url,
            'text' => elgg_view_icon('star-alt'),
            'title' => elgg_echo('favourites:remove'),
            'is_action' => true,
            'is_trusted' => true,
        );
        $favourites_button = elgg_view('output/url', $params);
    }
}

echo $favourites_button;

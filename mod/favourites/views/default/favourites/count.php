<?php
/**
 * Count of who has marked something as favourite
 *
 *  @uses $vars['entity']
 */


$list = '';
$num_of_markings = favourites_count($vars['entity']);
$guid = $vars['entity']->getGUID();

if ($num_of_markings) {
    // display the number of markings
    if ($num_of_markings == 1) {
        $favourites_string = elgg_echo('favourites:usermarkedthis', array($num_of_markings));
    }
    else {
        $favourites_string = elgg_echo('favourites:usersmarkedthis', array($num_of_markings));
    }
    
    $params = array(
        'text' => $favourites_string,
        'title' => elgg_echo('favourites:see'),
        'rel' => 'popup',
        'href' => "#favourites-$guid");
    
    $list = elgg_view('output/url', $params);
    $list .= "<div class='elgg-module elgg-module-popup elgg-favourites hidden clearfix' id='favourites-$guid'>";
    $list .= elgg_list_annotations(array(
        'guid' => $guid,
        'annotation_name' => 'favourite',
        'limit' => 99,
        'list_class' => 'elgg-list-favourites'
    ));
    $list .= "</div>";
    echo $list;
}

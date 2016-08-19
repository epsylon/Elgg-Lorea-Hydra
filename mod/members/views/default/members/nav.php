<?php
/**
 * Members navigation
 */

$tabs = array(
	'newest' => array(
		'title' => elgg_echo('members:label:newest'),
		'url' => "members/newest",
		'selected' => $vars['selected'] == 'newest',
	),
        'name' => array(
                'title' => elgg_echo('members:label:name'),
                'url' => "members/name",
        'selected' => $vars['selected'] == 'name',
        ),
        'suggested' => array(
                'title' => elgg_echo('members:label:suggested'),
                'url' => "suggested_friends",
                'selected' => $vars['selected'] == 'suggested',
        ),
        'online' => array(
                'title' => elgg_echo('members:label:online'),
                'url' => "members/online",
                'selected' => $vars['selected'] == 'online',
        ),
	'popular' => array(
		'title' => elgg_echo('members:label:popular'),
		'url' => "members/popular",
		'selected' => $vars['selected'] == 'popular',
	),
        'banned' => array(
                'title' => elgg_echo('members:label:banned'),
                'url' => "members/banned",
                'selected' => $vars['selected'] == 'banned',
        ),
/**        'today' => array(
                'title' => elgg_echo('members:label:today'),
                'url' => "members/today",
        'selected' => $vars['selected'] == 'today',
        ),
        'week' => array(
                'title' => elgg_echo('members:label:week'),
                'url' => "members/week",
        'selected' => $vars['selected'] == 'week',
        ),
        'month' => array(
                'title' => elgg_echo('members:label:month'),
                'url' => "members/month",
        'selected' => $vars['selected'] == 'month',
        ),
        'avatar' => array(
                'title' => elgg_echo('members:label:avatar'),
                'url' => "members/avatar",
        'selected' => $vars['selected'] == 'avatar',
        ),
*/
);

echo elgg_view('navigation/tabs', array('tabs' => $tabs));

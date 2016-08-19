<?php

namespace AU\ViewsCounter;

$view_override = elgg_get_config('views_counter_view_override');

if (is_array($view_override) && in_array($view_orig, $view_override)) {
	$vars['views_counter_full_view_override'] = true;
}

// Add the views counter to any elgg entity
echo elgg_view('views_counter/add', $vars);

// Shows the views counter number
echo elgg_view('views_counter/display_views_counter', $vars);

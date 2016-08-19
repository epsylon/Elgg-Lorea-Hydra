<?php

$entity = elgg_extract('entity', $vars);
if (elgg_view_exists("videolist/watch/$entity->videotype")) {
	echo elgg_view("videolist/watch/$entity->videotype", $vars);
} else {
	echo elgg_view("videolist/watch/default", $vars);
}

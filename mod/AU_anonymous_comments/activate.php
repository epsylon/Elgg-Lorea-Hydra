<?php

namespace AU\AnonymousComments;

$version = elgg_get_plugin_setting('version', PLUGIN_ID);
if (!$version) {
	elgg_set_plugin_setting('version', PLUGIN_VERSION, PLUGIN_ID);
}

$add_to_river = elgg_get_plugin_setting('add_to_river', PLUGIN_ID);

if (!$add_to_river) {
	elgg_set_plugin_setting('add_to_river', 'no', PLUGIN_ID);
}

//generate our fake user if it's not already existing
$user = get_anon_user();

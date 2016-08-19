<?php
/**
 * Tidypics Help
 *
 */

elgg_load_library('elgg:markdown');

$faq = elgg_get_plugins_path() . 'tidypics/FAQ.txt';
$text = Markdown(file_get_contents($faq));

$content = "<div class=\"elgg-markdown\">$text</div>";

echo elgg_view_module('inline', elgg_echo('tidypics:settings:help'), $content);

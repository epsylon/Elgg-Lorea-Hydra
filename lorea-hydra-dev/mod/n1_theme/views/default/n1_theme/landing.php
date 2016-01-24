<?php

elgg_load_css('n1:landing_page');

$title = elgg_echo('n1_theme:landing:title');
$subtitle = elgg_echo('n1_theme:landing:subtitle');

echo <<<HTML
<div id="n1-landing">
<div id="n1-landing-inner">
<p id="n1-landing-title">$title</p>
<p id="n1-landing-subtitle">$subtitle</p>
</div>
</div>
HTML;

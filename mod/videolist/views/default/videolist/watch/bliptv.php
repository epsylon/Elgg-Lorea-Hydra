<?php

$embedurl = $vars['entity']->embedurl;
$embedurl = preg_replace('/https?:/', 'https:', $embedurl);

echo "<iframe src=\"$embedurl\" frameborder=\"0\" allowfullscreen></iframe>";

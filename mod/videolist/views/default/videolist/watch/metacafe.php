<?php

$embedurl = $vars['entity']->embedurl;
$embedurl = preg_replace('/https?:/', 'https:', $embedurl);

echo "<embed flashVars=\"playerVars=autoPlay=no\" src=\"$embedurl\" wmode=\"transparent\" allowFullScreen=\"true\" allowScriptAccess=\"always\" name=\"Metacafe_$video_id\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\"></embed>";

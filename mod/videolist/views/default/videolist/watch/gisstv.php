<?php

$video_id = $vars['entity']->video_id;

echo "<video controls=\"\" tabindex=\"0\">
	<source type=\"video/ogg\" src=\"http://giss.tv/dmmdb//contents/$video_id\"></source>
</video>";

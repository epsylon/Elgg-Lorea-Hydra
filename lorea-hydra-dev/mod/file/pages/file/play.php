<?php
/**
 * Elgg file play audio & video files.
 *
 * @package ElggFile
 */
ob_end_clean();  

// Get the guid
$file_guid = get_input("guid");

// Get the file
$file = get_entity($file_guid);
if (!elgg_instanceof($file, 'object', 'file')) {
	register_error(elgg_echo("file:downloadfailed"));
	forward();
}

$mime = $file->getMimeType();
if (!$mime) {
	$mime = "application/octet-stream";
}

$filename = $file->originalfilename;
$size = $file->getSize() + 1;
// fix for IE https issue
header("Pragma: public");
header("Content-type: $mime");
header("Content-Disposition: inline; filename=\"$filename\"");
header("Content-Length: {$size}");
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

while (ob_get_level()) {
    ob_end_clean();
}
flush();
readfile($file->getFilenameOnFilestore());
ob_end_clean();
exit;

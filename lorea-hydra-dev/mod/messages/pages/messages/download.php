<?php
/**
 * Elgg file download.
 *
 * @package ElggMessages
 */

gatekeeper();

// Get the guid
$file_guid = get_input("file_guid");

$file = new MessagePluginFile($file_guid);


if (!$file) {
	register_error(elgg_echo("messages:downloadfailed") . $file_guid);
	forward(REFERER);
}

$mime = $file->getMimeType();
if (!$mime) {
	$mime = "application/octet-stream";
}

$filename = $file->originalfilename;

// fix for IE https issue
header("Pragma: public");

header("Content-type: $mime");
if (strpos($mime, "image/") !== false) {
	header("Content-Disposition: inline; filename=\"$filename\"");
} else {
	header("Content-Disposition: attachment; filename=\"$filename\"");
}

ob_clean();
flush();
readfile($file->getFilenameOnFilestore());
exit;

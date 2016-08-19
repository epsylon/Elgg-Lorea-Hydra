<?php
/**
 * Display an image
 */

$pdf_setting = elgg_get_plugin_setting('pdf', 'socialdocs'); 

$date = new DateTime();
$download_url = elgg_get_site_url() . "socialdocs/{$vars['entity']->getGUID()}/{$date->format('U')}";

if ($pdf_setting == 1)
{
	echo <<<HTML


		<div class="file-photo">

<iframe src="http://docs.google.com/viewer?url=$download_url&embedded=true" width="600" height="780" style="border: none;"></iframe>
		</div>
HTML;

}





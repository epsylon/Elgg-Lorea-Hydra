<?php
/**
 * Displays an image
 *
 * @uses $vars['entity']
 */
 
$file = $vars['entity'];
$image_url = $file->getIconURL('large');
$image_url = elgg_format_url($image_url);
$download_url = elgg_get_site_url() . "file/download/{$file->getGUID()}";

if ($vars['full_view']) {
	
echo <<<HTML
	<div class="row">
		<div class="col-sm-12">
			<a href="$download_url"><img class="img-responsive" src="$image_url" /></a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 well">
			<div>
				{$file->description}
			</div>
		</div>
	</div>
HTML;
}

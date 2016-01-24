<?php
/**
 * plays an audio file
 *
 * @uses $vars['entity']
 */

$file = $vars['entity'];
$guid = elgg_get_config('url').'file/play/'.$file->guid;
$mime = $file->getMimeType();
$audio_src = '<source src="'.$guid.'" type="'.$mime.'" ></source>';

if ($vars['full_view']) {
	
echo <<<HTML
	<div class="row">
		<div class="col-sm-12">
			<audio controls>
				{$audio_src}
			</audio>
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

<?php
/**
 * plays a video file
 *
 * @uses $vars['entity']
 */
 
$file = $vars['entity'];
$guid = elgg_get_config('url').'file/play/'.$file->guid;

if ($vars['full_view']) {
	
echo <<<HTML
	<div class="row">
		<div class="col-sm-12">
			<div class="embed-responsive embed-responsive-4by3">
				<video controls class="embed-responsive-item" src="{$guid}"></video>
			</div>
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

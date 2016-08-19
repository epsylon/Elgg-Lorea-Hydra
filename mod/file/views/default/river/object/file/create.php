<?php
/**
 * File river view.
 */

$object = $vars['item']->getObjectEntity();
$image = elgg_view_entity_icon($object, 'medium');
$guid = elgg_get_config('url').'file/play/'.$object->guid;
$mime = $object->getMimeType();
$audio_src = '<source src="'.$guid.'" type="'.$mime.'" ></source>';

$image = <<<HTML
	<div class="row">
		<div class="col-sm-3">
			{$image}
		</div>
		<div class="col-sm-8">
			<div>
				{$object->description}
			</div>
		</div>
	</div>
HTML;

$audio = <<<HTML
	<div class="row">
		<div class="col-sm-5">
			<audio controls>
				{$audio_src}
			</audio>
		</div>
		<div class="col-sm-6">
			<div>
				{$object->description}
			</div>
		</div>
	</div>
HTML;

$video = <<<HTML
	<div class="row">
		<div class="col-sm-5">
			<div class="embed-responsive embed-responsive-4by3">
				<video controls class="embed-responsive-item" src="{$guid}"></video>
			</div>
		</div>
		<div class="col-sm-6">
			<div>
				{$object->description}
			</div>
		</div>
	</div>
HTML;
			
switch ($object->simpletype) {
    case "image":
        $message = $image;
		break;
    case "audio":
        $message = $audio;
		break;
    case "video":
		$message = $video;
        break;
    default:
       $message = $object->description;
}

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => $message
));
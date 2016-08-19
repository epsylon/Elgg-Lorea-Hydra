<?php
/**
 * Elgg show the users who has marked the object as favourite
 *
 * @uses $vars['annotation']
 */

if (!isset($vars['annotation'])) {
    return true;
}

$marking = $vars['annotation'];

$user = $marking->getOwnerEntity();
if (!$user) {
    return true;
}

$user_icon = elgg_view_entity_icon($user, 'tiny');
$user_link = elgg_view('output/url', array(
    'href' => $user->getURL(),
    'text' => $user->name,
    'is_trusted' => true));

$favourites_string = elgg_echo('favourites:this');

$friendlytime = elgg_view_friendly_time($marking->time_created);

if ($marking->canEdit()) {
    $delete_button = elgg_view("output/confirmlink", array(
        'href' => "action/favourites/delete?id={$marking->id}",
        'text' => "<span class=\"elgg-icon elgg-icon-delete float-alt\"></span>",
        'confirm' => elgg_echo('favourites:delete:confirm'),
        'encode_text' => false));
}

$body = <<<HTML
<p class="mbn">
	$delete_button
	$user_link $favourites_string
	<span class="elgg-subtext">
		$friendlytime
	</span>
</p>
HTML;

echo elgg_view_image_block($user_icon, $body);

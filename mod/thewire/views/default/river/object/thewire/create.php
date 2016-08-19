<?php
/**
 * File river view.
 */

$object = $vars['item']->getObjectEntity();
$excerpt = strip_tags($object->description);
$excerpt =  preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width='300' height='200' src='http://www.youtube.com/embed/$1' frameborder='0'></iframe>",$excerpt);

$excerpt =  preg_replace('#http://(www\.)?vimeo\.com/([^ ?\n/]+)((\?|/).*?(\n|\s))?#i', '<object width="auto" height="auto"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=$2&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=$2&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="400" height="300"></embed></object>',$excerpt);
$smiley_url = $vars['url'] . "action/thewire/get_smiley?_" . time() . "&smiley=";
$smileys = array(
        ":)" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/ss.png") . "'>",
		":D" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/d.png") . "'>",
		"8)" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/mafia.png") . "'>",
		":P" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/p.png") . "'>",
		":o" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/oh.png") . "'>",
		":O" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/oh.png") . "'>",
		":0" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/oh.png") . "'>",
		":(" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/sad.png") . "'>",
		":'(" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/cry.png") . "'>",
		";)" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/zmik.png") . "'>",
		":lol:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/Smileylol.gif") . "'>",
		":mad:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/7_mad.gif") . "'>",
		":heartbeat:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/heartbeating.gif") . "'>",
		":love:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/Smilelove.gif") . "'>",
		":eprop:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/eprop.gif")."'>",
		":wave:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/Smileywave.gif") . "'>",
		":sunny:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/sunnySmiley.gif") . "'>",
		":wha:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/wha.gif") . "'>",
		":yes:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/yes.gif") . "'>",
		":sleepy:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/Smileysleep.gif") . "'>",
		":rolleyes:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/Smileyrolleyes.gif") . "'>",
		":lookaround:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/Smileylookaround.gif") . "'>",
		":eek:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/Smileyeek.gif") . "'>",
		":confused_2:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/Smileyconfused.gif") . "'>",
		":nono:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/SmileyAnimatedNoNo.gif") . "'>",
		":fun:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/propeller.gif") . "'>",
		":goodjob:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/goodjob.gif") . "'>",
		":giggle:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/emot-giggle.gif") . "'>",
		":cry:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/blueAnimatedCry.gif") . "'>",
		":shysmile:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/Animatedshysmile.gif") . "'>",
		":jealous:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/Alicejealous.gif") . "'>",
		":whocares:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/19_indifferent.gif") . "'>",
		":spinning:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/Smileyspinning.gif") . "'>",
		":coolman:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/25_coolguy.gif") . "'>",
		":littlekiss:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/AliceSmileyAnimatedBlinkKiss.gif") . "'>",
		":laugh:" => "<img src='" . elgg_add_action_tokens_to_url($smiley_url . "animated_smileys/LaughingAgua.gif") . "'>",
		
		);
		
$excerpt = thewire_filter($excerpt);



$subject = $vars['item']->getSubjectEntity();
$subject_link = elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
	'class' => 'elgg-river-subject',
	'is_trusted' => true,
));

$object_link = elgg_view('output/url', array(
	'href' => "thewire/owner/$subject->username",
	'text' => elgg_echo('thewire:wire'),
	'class' => 'elgg-river-object',
	'is_trusted' => true,
));

$summary = elgg_echo("river:create:object:thewire", array($subject_link, $object_link));

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => str_ireplace(array_keys($smileys), array_values($smileys), $excerpt),
	'summary' => $summary,
));
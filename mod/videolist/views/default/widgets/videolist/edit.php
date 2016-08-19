<?php
/**
 * Elgg video list widget edit
 *
 * @package ElggVideolist
 */

// set default value
if (!isset($vars['entity']->videos_num)) {
	$vars['entity']->videos_num = 4;
}

$params = array(
	'name' => 'params[videos_num]',
	'value' => $vars['entity']->videos_num,
	'options' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10),
);
$dropdown = elgg_view('input/dropdown', $params);

?>
<div>
	<?php echo elgg_echo('videolist:num_videos'); ?>:
	<?php echo $dropdown; ?>
</div>

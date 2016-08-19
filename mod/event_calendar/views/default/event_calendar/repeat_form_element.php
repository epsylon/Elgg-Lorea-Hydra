<?php
$event = $vars['event'];
$fd = $vars['form_data'];
$days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');

if ($fd['repeats'] == 'yes') {
	echo elgg_view('input/checkbox',array('name'=>'repeats','value'=>'yes','checked'=>'checked'));
} else {
	echo elgg_view('input/checkbox',array('name'=>'repeats','value'=>'yes'));
}
echo elgg_echo('event_calendar:repeat_interval_label').' ';
echo elgg_view('input/dropdown',array('name'=>'repeat_interval','value'=>$fd['repeat_interval'],'options_values'=>array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8')));
echo ' '.elgg_echo('event_calendar:repeat_weeks');
echo ' '.elgg_echo('event_calendar:on_these_days');

echo '<div class="event-calendar-repeating-wrapper">';

foreach($days as $day) {
	$label = elgg_echo("event_calendar:day_abbrev:$day");
	echo <<<HTML
<a id="event-calendar-repeating-$day" href="javascript:void(0);" class="event-calendar-repeating-unselected">
	 $label
</a>
HTML;

}

echo '</div>';

foreach($days as $day) {
	echo elgg_view('input/hidden', array('name' => "event-calendar-repeating-$day-value", 'value' => $fd["event-calendar-repeating-$day-value"]));
}
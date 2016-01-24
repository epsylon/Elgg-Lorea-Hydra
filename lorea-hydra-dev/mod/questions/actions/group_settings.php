<?php

$group_guid = (int) get_input('group_guid');
$solution_time = (int) get_input('solution_time');

$forward_url = REFERER;

if (empty($group_guid)) {
	register_error(elgg_echo('InvalidParameterException:MissingParameter'));
	forward(REFERER);
}

elgg_entity_gatekeeper($group_guid, 'group');
$group = get_entity($group_guid);
if (!$group->canEdit()) {
	register_error(elgg_echo('InvalidParameterException:NoEntityFound'));
	forward(REFERER);
}

// save the setting
$group->setPrivateSetting('questions_solution_time', $solution_time);

system_message(elgg_echo('questions:action:group_settings:success'));
$forward_url = $group->getURL();

forward($forward_url);

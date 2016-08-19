<?php
/**
* Elgg Messages Extended
*/
elgg_register_event_handler('init', 'system', 'messages_extended_init');

/**
 * Messages Extended init
 *
 * @return void
 */
function messages_extended_init() {
	elgg_extend_view('css/elgg', 'messages_extended/css');
	elgg_register_plugin_hook_handler('output:before', 'layout', 'messages_extended_view');
}

function messages_extended_view($hook, $type, $return, $params) {
	global $CONFIG;

	$context = elgg_get_context();

	if ($context != 'messages') {
		return $return;
	}

	$message = get_entity(get_input('guid'));

	if (!$message || !elgg_instanceof($message, "object", "messages")) {
		return $return;
	}

	if (isset($CONFIG->messages_extended_once)) {
		return $return;
	}

	$return['content'] .= elgg_view('messages_extended/history', [
		'message' => $message
	]);

	$CONFIG->messages_extended_once = true;

	return $return;
}


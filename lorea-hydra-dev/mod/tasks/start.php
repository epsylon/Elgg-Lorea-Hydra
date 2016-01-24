<?php
/**
 * Elgg Tasks Management
 *
 * @package ElggTasks
 */

elgg_register_event_handler('init', 'system', 'tasks_init');

/**
 * Initialize the tasks management plugin.
 *
 */
function tasks_init() {

	// register a library of helper functions
	elgg_register_library('elgg:tasks', elgg_get_plugins_path() . 'tasks/lib/tasks.php');

	$item = new ElggMenuItem('tasks', elgg_echo('tasks'), 'tasks/all');
	elgg_register_menu_item('site', $item);

	// Register a page handler, so we can have nice URLs
	elgg_register_page_handler('tasks', 'tasks_page_handler');

	// Register a url handler
	elgg_register_entity_url_handler('object', 'task', 'tasks_url');

	// Register some actions
	$action_base = elgg_get_plugins_path() . 'tasks/actions/tasks';
	elgg_register_action("tasks/edit", "$action_base/edit.php");
	elgg_register_action("tasks/delete", "$action_base/delete.php");
	elgg_register_action("tasks/comments/add", "$action_base/comments/add.php");
	// Extend the main css and js views
	elgg_extend_view('css/elgg', 'tasks/css');
	elgg_extend_view('js/elgg', 'tasks/js');
	
	// register the blog's JavaScript
	elgg_register_simplecache_view('js/tasks/tasklists');
	elgg_register_js('elgg.tasks', elgg_get_simplecache_url('js', 'tasks/tasklists'));
	
	elgg_register_ajax_view('object/task');
	elgg_register_ajax_view('tasks/tasklist_graph');

	// Register entity type for search
	elgg_register_entity_type('object', 'task');
	
	// Register a different form for annotations
	elgg_register_plugin_hook_handler('comments', 'object', 'tasks_comments_hook');

	// Register granular notification for this type
	register_notification_object('object', 'task', elgg_echo('tasks:new'));
	elgg_register_plugin_hook_handler('notify:entity:message', 'object', 'tasks_notify_message');

	// add to groups
	add_group_tool_option('tasks', elgg_echo('groups:enabletasks'), true);
	elgg_extend_view('groups/tool_latest', 'tasks/group_module');

	//add a widget
	elgg_register_widget_type('tasks', elgg_echo('tasks:active'), elgg_echo('tasks:widget:description'));

	// Language short codes must be of the form "tasks:key"
	// where key is the array key below
	elgg_set_config('tasks', array(
		'title' => 'text',
		'description' => 'longtext',
		'list_guid' => 'tasks/list',
		'enddate' => 'date',
		'priority' => 'tasks/priority',
		'tags' => 'tags',
		'access_id' => 'access',
	));
	
	elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'tasks_owner_block_menu');

	elgg_register_event_handler('pagesetup', 'system', 'tasks_pagesetup');

	// write permission plugin hooks
	elgg_register_plugin_hook_handler('permissions_check', 'object', 'tasks_write_permission_check');
	elgg_register_plugin_hook_handler('container_permissions_check', 'object', 'tasks_container_permission_check');
	
	// icon url override
	elgg_register_plugin_hook_handler('entity:icon:url', 'object', 'tasks_icon_url_override');

	// entity menu
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'tasks_entity_menu_setup');

	// register ecml views to parse
	elgg_register_plugin_hook_handler('get_views', 'ecml', 'tasks_ecml_views_hook');
	
	elgg_register_plugin_hook_handler('format', 'friendly:time', 'tasks_get_friendly_time');
        elgg_register_event_handler('upgrade', 'system', 'tasks_run_upgrades');
}

function tasks_run_upgrades($event, $type, $details) {
        if (include_once(elgg_get_plugins_path() . 'upgrade-tools/lib/upgrade_tools.php')) {
        	upgrade_module_run('tasks');
	}
}


/**
 * Dispatcher for tasks.
 * URLs take the form of
 *  All tasks:        tasks/all
 *  User's tasks:     tasks/owner/<username>
 *  Friends' tasks:   tasks/friends/<username>
 *  View task:        tasks/view/<guid>/<title>
 *  New task:         tasks/add/<guid> (container: user, group; list: tasklist)
 *  Edit task:        tasks/edit/<guid>
 *  Group tasks:      tasks/group/<guid>/all
 *
 * Title is ignored
 *
 * @param array $page
 */
function tasks_page_handler($page) {

	elgg_load_library('elgg:tasks');

	if (!isset($page[0])) {
		$page[0] = 'all';
	}

	elgg_push_breadcrumb(elgg_echo('tasks'), 'tasks/all');

	$base_dir = elgg_get_plugins_path() . 'tasks/pages/tasks';

	$page_type = $page[0];
	switch ($page_type) {
		case 'owner':
			include "$base_dir/owner.php";
			break;
		case 'friends':
			include "$base_dir/friends.php";
			break;
		case 'view':
			set_input('guid', $page[1]);
			include "$base_dir/view.php";
			break;
		case 'add':
			set_input('guid', $page[1]);
			include "$base_dir/new_task.php";
			break;
		case 'edit':
			set_input('guid', $page[1]);
			include "$base_dir/edit_task.php";
			break;
		case 'group':
			include "$base_dir/owner.php";
			break;
		case 'all':
		default:
			include "$base_dir/world.php";
			break;
	}

	return;
}

/**
 * Override the task url
 * 
 * @param ElggObject $entity task object
 * @return string
 */
function tasks_url($entity) {
	$title = elgg_get_friendly_title($entity->title);
	return "tasks/view/$entity->guid/$title";
}

/**
 * Extend permissions checking to extend can-edit for write users.
 *
 * @param unknown_type $hook
 * @param unknown_type $entity_type
 * @param unknown_type $returnvalue
 * @param unknown_type $params
 */
function tasks_write_permission_check($hook, $entity_type, $returnvalue, $params)
{
	$entity = $params['entity'];
	if ($entity->getSubtype() == 'task') {

		$user = $params['user'];
		$container = $entity->getContainerEntity();
		if (elgg_instanceof($container, 'group')) {
			return $container->canWriteToContainer($user->guid, 'object', $entity->getSubtype());
		}
	}
}

/**
 * Extend container permissions checking to extend can_write_to_container for write users.
 *
 * @param unknown_type $hook
 * @param unknown_type $entity_type
 * @param unknown_type $returnvalue
 * @param unknown_type $params
 */
/*
function tasks_container_permission_check($hook, $entity_type, $returnvalue, $params) {

	if (elgg_get_context() == "tasks") {
		if (elgg_get_page_owner_guid()) {
			if (can_write_to_container(elgg_get_logged_in_user_guid(), elgg_get_page_owner_guid())) return true;
		}
		if ($page_guid = get_input('task_guid',0)) {
			$entity = get_entity($task_guid);
		} else if ($parent_guid = get_input('list_guid',0)) {
			$entity = get_entity($list_guid);
		}
		if ($entity instanceof ElggObject) {
			if (
					can_write_to_container(elgg_get_logged_in_user_guid(), $entity->container_guid)
					|| in_array($entity->write_access_id,get_access_list())
				) {
					return true;
			}
		}
	}

}
*/

/**
 * Override the default entity icon for tasks
 *
 * @return string Relative URL
 */
function tasks_icon_url_override($hook, $type, $returnvalue, $params) {
	$entity = $params['entity'];
	$size = $params['size'];
	if (elgg_instanceof($entity, 'object', 'task')) {
		$status = $entity->status;
		if($status == 'unassigned' || $status == 'reopened') {
			$status = 'new';
		}
		if (in_array($size, array('tiny', 'small', 'medium', 'large')) &&
			in_array($status, array('active', 'assigned', 'closed', 'done', 'new'))){
			return "mod/tasks/graphics/task-icons/$status-$size.png";
		}
	}
}

/**
 * Add a menu item to the user ownerblock
 */
function tasks_owner_block_menu($hook, $type, $return, $params) {
	if (elgg_instanceof($params['entity'], 'user')) {
		$url = "tasks/owner/{$params['entity']->username}";
		$item = new ElggMenuItem('tasks', elgg_echo('tasks'), $url);
		$return[] = $item;
	} else {
		if ($params['entity']->tasks_enable != "no") {
			$url = "tasks/group/{$params['entity']->guid}/all";
			$item = new ElggMenuItem('tasks', elgg_echo('tasks:group'), $url);
			$return[] = $item;
		}
	}

	return $return;
}

/**
 * Tasks extra menu item
 *
 */
function tasks_pagesetup() {
	if (elgg_is_logged_in()) {
		
		$container = elgg_get_page_owner_entity();
		if (!$container || !elgg_instanceof($container, 'group') || $container->tasks_enable != 'yes') {
			return;
		}
		
		$address = urlencode(current_page_url());
		
		elgg_register_menu_item('extras', array(
			'name' => 'task',
			'text' => elgg_view_icon('checkmark'),
			'href' => "tasks/add/$container->guid?referer=$address",
			'title' => elgg_echo('tasks:this'),
			'rel' => 'nofollow',
		));
	}
}

/**
 * Add links/info to entity menu particular to tasks plugin
 */
function tasks_entity_menu_setup($hook, $type, $return, $params) {
	if (elgg_in_context('widgets')) {
		return $return;
	}

	$entity = $params['entity'];
	$handler = elgg_extract('handler', $params, false);
	if ($handler != 'tasks') {
		return $return;
	}

	// remove delete if not owner or admin
	if (!elgg_is_admin_logged_in() && elgg_get_logged_in_user_guid() != $entity->getOwnerGuid()) {
		foreach ($return as $index => $item) {
			if ($item->getName() == 'delete') {
				unset($return[$index]);
				break;
			}
		}
	}
	
	if ($entity->status == 'active') {
		$options = array(
			'name' => 'active',
			'text' => elgg_echo('tasks:active'),
			'href' => false,
			'priority' => 150,
		);
		$return[] = ElggMenuItem::factory($options);
	}
	
	$priorities = array(
		'1' => 'low',
		'2' => 'normal',
		'3' => 'high',
	);
	
	$priority = $priorities[$entity->priority];
	
	$options = array(
		'name' => 'priority',
		'text' => elgg_echo("tasks:priority:$priority"),
		'href' => false,
		'priority' => 150,
	);
	
	$return[] = ElggMenuItem::factory($options);
	
	return $return;
}

function tasks_comments_hook($hook, $entity_type, $returnvalue, $params) {
	if($params['entity']->getSubtype() == 'task') {
		return elgg_view('tasks/page/elements/comments', $params);
	}
	return $returnvalue;
}

/**
* Returns a more meaningful message
*
* @param unknown_type $hook
* @param unknown_type $entity_type
* @param unknown_type $returnvalue
* @param unknown_type $params
*/
function tasks_notify_message($hook, $entity_type, $returnvalue, $params) {
	$entity = $params['entity'];
	if (elgg_instanceof($entity, 'object', 'task')) {
		$descr = $entity->description;
		$title = $entity->title;
		$owner = $entity->getOwnerEntity();
		return $owner->name . ' ' . elgg_echo("tasks:via") . ': ' . $title . "\n\n" . $descr . "\n\n" . $entity->getURL();
	}
	return null;
}




/**
 * Return views to parse for tasks.
 *
 * @param unknown_type $hook
 * @param unknown_type $entity_type
 * @param unknown_type $return_value
 * @param unknown_type $params
 */
function tasks_ecml_views_hook($hook, $entity_type, $return_value, $params) {
	$return_value['object/task'] = elgg_echo('item:object:task');

	return $return_value;
}

function tasks_get_friendly_time($hook, $type, $return_value, $params) {
	$time = (int) $params['time'];
	if ($time > time()) {
		$diff = $time - time();

		$minute = 60;
		$hour = $minute * 60;
		$day = $hour * 24;

		if ($diff < $minute) {
				return elgg_echo("friendlytime:justnow");
		} else if ($diff < $hour) {
			$diff = round($diff / $minute);
			if ($diff == 0) {
				$diff = 1;
			}

			if ($diff > 1) {
				return elgg_echo("friendlytime:future:minutes", array($diff));
			} else {
				return elgg_echo("friendlytime:future:minutes:singular", array($diff));
			}
		} else if ($diff < $day) {
			$diff = round($diff / $hour);
			if ($diff == 0) {
				$diff = 1;
			}

			if ($diff > 1) {
				return elgg_echo("friendlytime:future:hours", array($diff));
			} else {
				return elgg_echo("friendlytime:future:hours:singular", array($diff));
			}
		} else {
			$diff = round($diff / $day);
			if ($diff == 0) {
				$diff = 1;
			}

			if ($diff > 1) {
				return elgg_echo("friendlytime:future:days", array($diff));
			} else {
				return elgg_echo("friendlytime:future:days:singular", array($diff));
			}
		}
		$return_value = $time;
	}
	return $return_value;
}

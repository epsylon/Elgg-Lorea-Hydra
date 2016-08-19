<?php
/**
 * Members index
 *
 */

$num_members = get_number_users();

$title = elgg_echo('members');

$options = array('type' => 'user', 'full_view' => false);
switch ($vars['page']) {
	case 'popular':
		$options['relationship'] = 'friend';
		$options['inverse_relationship'] = false;
		$content = elgg_list_entities_from_relationship_count($options);
		break;
	case 'online':
		$content = get_online_users();
		break;
        case 'avatar':
                $options['limit'] = 70;
                $options['metadata_names'] = 'icontime';
                $options['list_type'] = "gallery";
                $options['gallery_class'] = "elgg-gallery-users";
                $options['size'] = 'small';
                $content = "<center>".elgg_list_entities_from_metadata($options)."</center>";
                break;
        case 'banned':
                admin_gatekeeper();
                $db_prefix = elgg_get_config('dbprefix');
                $joins = array("INNER JOIN {$db_prefix}users_entity u on e.guid = u.guid",);
                $options['joins'] = $joins;
                $options['wheres'] = array("u.banned='yes'");

                $content = elgg_list_entities_from_metadata($options);
                break;
        case 'today':
                $db_prefix = elgg_get_config('dbprefix');
                $joins = array("JOIN {$db_prefix}users_entity u on e.guid = u.guid");
                $time = time() - 86400;

                $options['joins'] = $joins;
                $options['wheres'] = "u.last_action >= {$time}";
                $options['order_by'] = "u.last_action DESC";
                $content = elgg_list_entities_from_metadata($options);
                break;
        case 'week':
                $db_prefix = elgg_get_config('dbprefix');
                $joins = array("JOIN {$db_prefix}users_entity u on e.guid = u.guid");
                $time = time() - 604800;

                $options['joins'] = $joins;
                $options['wheres'] = "u.last_action >= {$time}";
                $options['order_by'] = "u.last_action DESC";
                $content = elgg_list_entities_from_metadata($options);
                break;
/*
        case 'month':
                $db_prefix = elgg_get_config('dbprefix');
                $joins = array("JOIN {$db_prefix}users_entity u on e.guid = u.guid");
                $time = time() - 18144000;



			$group_options["order_by"] = "u.name ASC";

                $options['joins'] = $joins;
                $options['wheres'] = "u.last_action >= {$time}";
                //$options['limit'] = false;
                //$options['pagination'] = false;
                //$options['list_type'] = "gallery";
                //$options['gallery_class'] = "elgg-gallery-users";
                //$options['size'] = 'tiny';
                $content = elgg_list_entities_from_metadata($options);
                break;
*/
        case 'name':
                $db_prefix = elgg_get_config('dbprefix');
                $joins = array("JOIN {$db_prefix}users_entity u on e.guid = u.guid");

                $options['joins'] = $joins;
                $options['order_by'] = "u.name ASC";
                $content = elgg_list_entities_from_metadata($options);
                break;
	case 'newest':
	default:
		$content = elgg_list_entities($options);
		break;
}

$params = array(
	'content' => $content,
	'sidebar' => elgg_view('members/sidebar'),
	'title' => $title . " ($num_members)",
	'filter_override' => elgg_view('members/nav', array('selected' => $vars['page'])),
);

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);

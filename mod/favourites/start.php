<?php

elgg_register_event_handler('init', 'system', 'favourites_init');

function favourites_init() {
    elgg_extend_view('css/elgg', 'favourites/css');
    elgg_extend_view('js/elgg', 'favourites/js');

    elgg_register_page_handler('favourites','favourites_page_handler');

    // registered with priority < 500 so other plugins can remove favourites
    elgg_register_plugin_hook_handler('register', 'menu:river', 'favourites_river_menu_setup', 400);
    elgg_register_plugin_hook_handler('register', 'menu:entity', 'favourites_entity_menu_setup', 400);

    $actions_base = elgg_get_plugins_path() . 'favourites/actions/favourites';
    elgg_register_action('favourites/add', "$actions_base/add.php");
    elgg_register_action('favourites/delete', "$actions_base/delete.php");

    if ( elgg_is_logged_in() ) {
        elgg_register_menu_item(
            'site',
            array(
                'name' => 'favourites',
                'text' => elgg_echo('favourites:menu'),
                'href' => "favourites/view/"
            )
        );
    }

}


/**
 * Add a mark as favourite to entity menu at end of the menu
 */
function favourites_entity_menu_setup($hook, $type, $return, $params) {
    if (elgg_in_context('widgets')) {
        return $return;
    }

    $entity = $params['entity'];

    if(!is_allowed_type($entity)) {
        return $return;
    }
    
    // favourites button
    $options = array(
        'name' => 'favourite',
	'text' => elgg_view('favourites/button', array('entity' => $entity)),
	'href' => false,
	'priority' => 1002,
    );
    $return[] = ElggMenuItem::factory($options);

    // favourites count
    $count = elgg_view('favourites/count', array('entity' => $entity));
    if ($count) {
        $options = array(
            'name' => 'favourites_count',
            'text' => $count,
            'href' => false,
            'priority' => 1003,
        );
	$return[] = ElggMenuItem::factory($options);
    }

    return $return;
}

function is_allowed_type($entity) {
    $plugin = elgg_get_plugin_from_id('favourites');
    $allowed_object_subtypes_array = explode(', ', $plugin->allowed_object_subtypes);
    
    foreach($allowed_object_subtypes_array as $sub_type) {
        if(elgg_instanceof($entity, 'object', $sub_type)) {
            return true;
        }
    }
    return true;
}
/**
 * Add a mark as favourite button to river actions
 */
function favourites_river_menu_setup($hook, $type, $return, $params) {
    if (elgg_is_logged_in()) {	
        $item = $params['item'];
        $object = $item->getObjectEntity();
        
        if(!is_allowed_type($object)) {
            return $return;
        }
    
        if (!elgg_in_context('widgets') && $item->annotation_id == 0) {
            if ($object->canAnnotate(0, 'favourite')) {
                $options = array(
                    'name' => 'favourite',
                    'href' => false,
                    'text' => elgg_view('favourites/button', array('entity' => $object)),
                    'is_action' => true,
                    'priority' => 102,
                );
                $return[] = ElggMenuItem::factory($options);
                
                // favourites count
                $count = elgg_view('favourites/count', array('entity' => $object));
                if ($count) {
                    $options = array(
                        'name' => 'favourites_count',
                        'text' => $count,
                        'href' => false,
                        'priority' => 103,
                    );
                    $return[] = ElggMenuItem::factory($options);
                }
            }
        }
    }

    return $return;
}

/**
 * Count how many people have marked an entity as favourite.
 *
 * @param  ElggEntity $entity
 *
 * @return int Number of markings
 */
function favourites_count($entity) {
    $type = $entity->getType();
    $params = array('entity' => $entity);
    $number = elgg_trigger_plugin_hook('favourites:count', $type, $params, false);

    if ($number) {
        return $number;
    }
    else {
        return $entity->countAnnotations('favourite');
    }
}

/**
 * Notify $owner that $user marked his $entity as favourite.
 *
 * @param type $owner
 * @param type $user
 * @param type $entity 
 */
function favourites_notify_user(ElggUser $owner, ElggUser $user, ElggEntity $entity) {
	
    if (!$owner instanceof ElggUser) {
        return false;
    }

    if (!$user instanceof ElggUser) {
        return false;
    }

    if (!$entity instanceof ElggEntity) {
        return false;
    }

    $title_str = $entity->title;
    if (!$title_str) {
        $title_str = elgg_get_excerpt($entity->description);
    }

    $site = get_config('site');

    $subject = elgg_echo('favourites:notifications:subject', array(
                         $user->name,
                         $title_str));

    $body = elgg_echo('favourites:notifications:body', array(
                      $owner->name,
                      $user->name,
                      $title_str,
                      $site->name,
                      $entity->getURL(),
                      $user->getURL()));

    notify_user($owner->guid,
                $user->guid,
                $subject,
                $body);
}

function favourites_page_handler($page) {
        elgg_set_context('favourites');
        echo elgg_view_page(
                elgg_echo("favourites:items"),
                elgg_view_layout(
                        'one_sidebar',
                        array(
                                'title' => elgg_echo("favourites:items"),
                                'content' => elgg_view('favourites/view'),
                                'sidebar' => elgg_view('favourites/sidebar'),
                        )
                )
        );
        return true;
}


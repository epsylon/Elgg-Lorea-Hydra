<?php


elgg_register_event_handler('init', 'system', function() {
    
            elgg_unregister_action('comments/add');
            elgg_register_action('comments/add', dirname(__FILE__) . '/actions/comment.php');
    
});
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if(elgg_is_logged_in()){
    
    $spy = elgg_get_logged_in_user_guid();
    
    $target = elgg_get_page_owner_guid();
    if(is_numeric($target) && is_numeric($spy) && $spy != $target){
        if(check_entity_relationship($spy, "viewed", $target)){
            remove_entity_relationship($spy, "viewed", $target);
            add_entity_relationship($spy, "viewed", $target);            
        }
        else{
                add_entity_relationship($spy, "viewed", $target);
        }
    } 
}


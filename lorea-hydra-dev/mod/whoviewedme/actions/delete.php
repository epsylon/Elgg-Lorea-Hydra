<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$spy = get_input('guid');
$target = elgg_get_logged_in_user_guid();

if(check_entity_relationship($spy, "viewed", $target)){
    remove_entity_relationship($spy, "viewed", $target);    
}




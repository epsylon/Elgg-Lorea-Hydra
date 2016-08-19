<?php
/**
 * Tasks remove comment action
 *
 * @package ElggTasks
 */

group_gatekeeper();
elgg_load_library('elgg:tasks');

if (elgg_annotation_exists($annotation->guid)) {
       elgg_delete_annotation_by_id($annotation_id->id);
     }

// Forward to the page the action occurred on
forward(REFERER);

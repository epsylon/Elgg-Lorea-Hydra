<?php
/**
 * ElggPG -- Fingerprint output view
 *
 * @uses $vars['user'] The user entity
 *
 * @package        Lorea
 * @subpackage     ElggPG
 *
 * Copyright 2011-2013 Lorea Faeries <federation@lorea.org>
 *
 * This file is part of the ElggPG plugin for Elgg.
 *
 * ElggPG is free software: you can redistribute it and/or modify it
 * under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * ElggPG is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this program. If not, see
 * <http://www.gnu.org/licenses/>.
 */

$fingerprint = elgg_extract('value', $vars);

// @todo Add access to fingerprint metadata
$entity = elgg_get_page_owner_entity();
if (elgg_instanceof($entity, 'user')
    && ($entity->isFriend() || $entity->guid == elgg_get_logged_in_user_guid()
        || elgg_is_admin_logged_in())) {

    $output = '';
    for ($i=0; $i<strlen($fingerprint); $i++) {
    	$output .= $fingerprint[$i];
    	if ($i % 4 == 3) {
    		$output .= " ";
    	}
    }
    
    if (elgg_in_context('profile')) {
        echo elgg_view('output/url', array(
            'text' => substr($output, 0, 4 * 4 + 4),
            'href' => 'elggpg/owner/' .elgg_get_page_owner_entity()->username,
            'title' => $output,
        ));
    } else {
        echo $output;
    }
} else {
    echo elgg_echo('access:limited:label');
}

<?php
/**
 * Linkup -- Simple markup to link entities across applications.
 *
 * It recognizes: @username, !group-alias, !group-guid, #task-guid, #hashtag,
 * and *entity-guid.
 *
 * @package        Lorea
 * @subpackage     Linkup
 * @homepage       http://lorea.org/plugin/linkup
 * @copyright      2012,2013 Lorea Faeries <federation@lorea.org>
 * @license        COPYING, http://www.gnu.org/licenses/agpl
 *
 * Copyright 2012-2013 Lorea Faeries <federation@lorea.org>
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Affero General Public License
 * as published by the Free Software Foundation, either version 3 of
 * the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this program. If not, see
 * <http://www.gnu.org/licenses/>.
 */

elgg_register_event_handler('init', 'system', 'linkup_init');

function linkup_init() {
    // Register tests
    elgg_register_plugin_hook_handler('unit_test', 'system', 'linkup_test');

	// Register CSS
	elgg_extend_view('css.elgg', 'linkup/css');

    // Register hook
    elgg_register_plugin_hook_handler('output:before', 'layout', 'linkup_event_handler');

    // Extend CSS
    elgg_extend_view('css/elgg', 'linkup/css');
}

/**
 * @todo I'm ashamed
 */
function linkup_test($hook, $type, $value, $params) {
	//    $value[] = elgg_get_config('pluginspath') . "linkup/tests/linkup_test.php";
    return $value;
}

/**
 * Markup function
 *
 * Detect linkup patterns and make links where needed.
 *
 * Matches a marker character followed by printable characters, and
 * prefixed to avoid matching CSS DOM IDs. First match is the prefix,
 * second the marker, and third is the subject.
 */
function linkup_event_handler($hook, $type, $returnvalue, $params) {

	if (elgg_get_viewtype() != 'default') {
		// only mess with html views
		return $returnvalue;
	}
	$html = mb_convert_encoding($returnvalue['content'], 'HTML-ENTITIES', 'UTF-8');

	if (empty($html)) {
		return $returnvalue;
	}

	libxml_use_internal_errors(TRUE);
	
	try {

		$dom  = new DOMDocument();
		$dom->loadHTML($html);

		foreach ($dom->childNodes AS $node) {

			linkup_dom_recurse($node, 'linkup_dom_replace');

		}

		// Remove tags added by DOMDocument
		$matches = array('/^\<\!DOCTYPE.*?<html[^>]*><body[^>]*>/isu',
						 '|</body></html>$|isu');

		$content = preg_replace($matches, '', $dom->saveHTML());

		// convert back to original encoding
		$returnvalue['content'] = mb_convert_encoding($content, 'UTF-8', 'HTML-ENTITIES');

	} catch (Exception $e) {
	   
		error_log("===== linkup error $e->class $e->message");

	}

	return $returnvalue;

}

/**
 * Utility to traverse a DOMDocument and execute a callback function
 * on all children.
 *
 * @param $root      a DOMNode
 * @param $callback  a function
 * @return void
 */
function linkup_dom_recurse($root, $callback) {
	
	if ($root->hasChildNodes()) {
		
		foreach ($root->childNodes AS $node) {
			
			linkup_dom_recurse($node, $callback);

		}

	} else {

		if (is_callable($callback)) {

			$callback($root);

		}
	}	

}

/**
 * linkup marking callback will markup only a safe set of conditions:
 *
 * - only TextNodes will be affected
 * - only if their parent is not an attribute (e.g., title, href)
 * - only if the parent tag can contain an A tag 
 *
 * @internal
 * @see linkup_skip_tags()
 */
function linkup_dom_replace($node) {

	if ($node->nodeType == XML_TEXT_NODE 
		&& $node->parentNode->nodeType != XML_ATTRIBUTE_NODE
		&& !in_array($node->parentNode->tagName, linkup_skip_tags())) {

		$html = linkup_regexp($node->nodeValue);

		if (!empty($html) && $node->nodeValue != $html) {

			// Get what's inside the formatted <body> node from a new DOMDocument
			$fix = new DOMDocument();
			$fix->loadHTML(trim($html));
			// get <body>(.*)</body>
			$fix = $fix->documentElement->firstChild;

			if (!is_null($fix)) {
				$parent   = $node->parentNode;
				$new_node = $parent->ownerDocument->importNode($fix, TRUE);
				$parent->replaceChild($new_node, $node);
			}

		}
		
	}

}

/**
 * linkup_regexp -- markup text with HTML links
 *
 * This function expects plain text with a specific markup.
 * It is called internally by the event handler to execute on selected
 * strings: that means, do not try it on any HTML.
 *
 * @see README.org for markup details
 *
 * @internal
 * @param String $text
 * @return String HTML markup as a string
 */
function linkup_regexp($text) {
	return preg_replace_callback("/(^|[^\w&\"\]])([@!\#\*:])([a-z0-9+-]+)(\b)/u",
								 "linkup_markup", $text);

}

/**
 * linkup_skip_tags -- tags to skip wjen looking for markup
 *
 * @todo the whole range of tag that can contain A are 'flow elements'
 * and 'phrasing elements' as defined at
 *
 * http://dev.w3.org/html5/markup/common-models.html
 */
function linkup_skip_tags() {
	static $skip = array('a', 
						 'button',
						 'canvas',
						 'class',
						 'code',
						 'embed',
						 'head',
						 'iframe',
						 'input',
						 'link',
						 'meta',
						 'object',
						 'param',
						 'pre',
						 'script',
						 'style',
						 'textarea',
						 '');

	return $skip;
}

/**
 * Markup callback
 *
 * Generate HTML markup from linkup patterns, for a single matched
 * pattern. It is used as a regular expression callback.
 *
 * It also takes care of permissions and entity validity, so that no
 * link will be made to unauthorized or non-existing entities.
 * 
 * @return String, the resulting markup
 */
function linkup_markup($matches) {

    $prefix  = $matches[1];
    $marker  = $matches[2];
    $subject = $matches[3];
    $text    = "$marker$subject";
    
    switch($marker) {
    case "@": // user
        if (preg_match("/^[a-z][\w\.-]+/i", $subject)) {
            $entity = get_user_by_username($subject);
            $text   = linkup_markup_user($entity, $text);
            // TODO elgg_trigger_plugin_hook('mention', 'user');
        }
        break;

    case "!": // group
        if (preg_match("/^[0-9]+$/", $subject)) {
            // Get group by GUID
            $entity = get_entity($subject);
            // TODO if user can access group
        } else if (preg_match("/^[a-z][\w+-]+$/i", $subject)) {
            // Get group by alias
            if (!elgg_is_active_plugin('group_alias')) { break; }
            $entity = get_group_from_group_alias($subject);
        }
        $text = linkup_markup_group($entity, $text);
        break;

    case "#": // hashtag or task
		if (preg_match("/^[0-9]+$/", $subject) && elgg_is_active_plugin('tasks')) {
        	// Get task by GUID
			$entity = get_entity($subject);
			if (elgg_instanceof($entity, 'object', 'task') ||
				elgg_instanceof($entity, 'object', 'tasklist') ||
				elgg_instanceof($entity, 'object', 'tasklist_top')) {
				// Linkup task
				$text = linkup_markup_task($entity, $text);
				break;
			}
		}
        // Linkup hashtag
        $text = linkup_link($text, "hashtag", "/tag/$subject");
        break;

    case "*": // entity
        // Check that the subject is a GUID and current user can access
        // the corresponding entity
        if (!preg_match("/^[0-9]+$/", $subject)) { break; }
        $entity = get_entity($subject);
        if (elgg_instanceof($entity, 'user')) {
            $text = linkup_markup_user($entity);
        }
		else if (elgg_instanceof($entity, 'group')) {
            $text = linkup_markup_group($entity);
        }
		else if (elgg_instanceof($entity, 'object', 'task') ||
				elgg_instanceof($entity, 'object', 'tasklist') ||
				elgg_instanceof($entity, 'object', 'tasklist_top')) {
			$text = linkup_markup_task($entity, $text);
		}
		else if (elgg_instanceof($entity, 'object')) {
			// get subtype, check permissions, linkup
			if (!elgg_trigger_plugin_hook('linkup', "object:{$entity->getSubtype()}", array('entity' => $entity))) {
				// Default object view
				$text = linkup_markup_object($entity);
			}
        }
        break;
    }

    return "$prefix$text";
}


// TODO Move the following to a library

/**
 * Generic linkup markup
 *
 */
function linkup_link($anchor, $css, $url, $title = "") {

    $vars = array('class' => "linkup $css", 'href' => $url, 'text' => $anchor);
    if (!empty($title)) {
        $vars['title'] = $title;
    }

    return elgg_view('output/url', $vars);

}

/**
 * Markup for a group
 */
function linkup_markup_group($entity, $default = "") {

    if (elgg_instanceof($entity, 'group')) {
        if (elgg_is_active_plugin('group_alias')) {
            $anchor = "!{$entity->alias}";
        } else {
            $anchor = "!{$entity->username}";
        }
        $css     = "group";
        $url     = $entity->getURL();

        return linkup_link($anchor, $css, $url, elgg_echo('group') . ": {$entity->name}");
    }
    return $default;
}

/**
 * Markup for a generic object
 */
function linkup_markup_object($entity, $default = "") {

    if (elgg_instanceof($entity, 'object') && $entity->isEnabled()) {

		$subtype = $entity->getSubtype();
		if (empty($subtype)) {
			$subtype = 'default';
		}

        $anchor = "{$entity->name}";
        $css    = elgg_get_friendly_title("object-{$subtype}");
        $url    = $entity->getURL();

        return linkup_link($anchor, $css, $url, elgg_echo("linkup:object:$subtype", array($entity->guid)));
    }

    return $default;
}

/**
 * Markup for a task
 */
function linkup_markup_task($entity, $default = "") {

	if (!elgg_instanceof($entity, 'object')) {
		return $default;
	}

	$subtypes = array('task', 'tasklist', 'tasklist_top');
	$subtype  = $entity->getSubtype();

	if (!in_array($subtype, $subtypes)) {
		return $default;
	}

	$anchor = "#$entity->guid";
	$css    = "$subtype";
	if ('task' == $subtype) {
		$css.= " task-status-{$entity->status}";
	}
	$url    = $entity->getURL();
	$title  = elgg_echo('task') . " $entity->title";

	return linkup_link($anchor, $css, $url, $title);

}

/**
 * Markup for a user
 */
function linkup_markup_user($entity, $default = "") {

    if (elgg_instanceof($entity, 'user') && !$entity->isBanned()) {

        $anchor = "@{$entity->username}";
        $css    = "user";
        $url    = $entity->getURL();

        return linkup_link($anchor, $css, $url, $entity->name);
    }

    return $default;
}


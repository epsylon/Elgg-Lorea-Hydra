<?php

namespace image_proxy;

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init');

function init() {
	//@TODO - can we do this without parsing all views?
	elgg_register_plugin_hook_handler('view', 'all', __NAMESPACE__ . '\\view_hook');
}

/**
 * replace any http images with https urls
 * 
 * @param type $h
 * @param type $t
 * @param type $r
 * @param type $p
 * @return type
 */
function view_hook($h, $t, $r, $p) {
	
	$http_url = str_replace('https://', 'http://', elgg_get_site_url());

	if (preg_match_all( '/<img[^>]+src\s*=\s*["\']?([^"\' ]+)[^>]*>/', $r, $extracted_image)) {
		foreach ($extracted_image[0] as $key => $i) {
			
			if (strpos($extracted_image[1][$key], elgg_get_site_url()) !== false) {
				continue; // already one of our links
			}

			// check if this is our url being requested over http, and rewrite to https
			if (strpos($extracted_image[1][$key], $http_url) === 0) {
				$https_image = str_replace('http://', 'https://', $extracted_image[1][$key]);
				$replacement_image = str_replace($extracted_image[1][$key], $https_image, $i);
				$r = str_replace($i, $replacement_image, $r);
				continue;
			}
			
			if (!is_https($extracted_image[1][$key])) {
				// replace this url
				$url = urlencode($extracted_image[1][$key]);
				if (strpos($url, 'http') === 0) {
					$token = get_token($extracted_image[1][$key]);
					$new_url = elgg_normalize_url('mod/image_proxy/image.php?url=' . $url . '&token=' . $token);
					
					$replacement_image = str_replace($extracted_image[1][$key], $new_url, $i);
					$r = str_replace($i, $replacement_image, $r);
				}
			}
		}
	}
	
	return $r;
}

/**
 * detect if the current page is using https
 * 
 * @staticvar type $is_https
 * @return type
 */
function is_https($url) {
	static $is_https;
	
	if (!is_array($is_https)) {
		$is_https = array();
	}
	
	if (isset($is_https[$url])) {
		return $is_https[$url];
	}
	
	$parts = parse_url($url);
	
	$is_https[$url] = strtolower($parts['scheme']) === 'https';
	
	return $is_https[$url];
}


function get_token($url) {
	
	if (elgg_get_config('image_proxy_secret')) {
		$site_secret = elgg_get_config('image_proxy_secret');
	}
	else {
		$site_secret = get_site_secret();
	}
	return sha1($site_secret . $url);
}

<?php
/**
 * Displays an autocomplete text input.
 *
 * @package Elgg
 * @subpackage Core
 *
 * @todo This currently only works for ONE AUTOCOMPLETE TEXT FIELD on a page.
 *
 * @uses $vars['value']       Current value for the text input
 * @uses $vars['match_on']    Array | str What to match on. all|array(groups|users|friends)
 * @uses $vars['match_owner'] Bool.  Match only entities that are owned by logged in user.
 * @uses $vars['livesearsh_url'] Alternative livesearch URL
 * @uses $vars['class']       Additional CSS class
 * 
 * @override views/default/input/autocomplete.php
 */

if (isset($vars['class'])) {
	$vars['class'] = "elgg-input-autocomplete {$vars['class']}";
} else {
	$vars['class'] = "elgg-input-autocomplete";
}

if (isset($vars['livesearch_url'])) {
	$livesearch_url = $vars['livesearch_url'];
	unset($vars['livesearch_url']);
} else {
	$livesearch_url = elgg_get_site_url() . 'livesearch';
}

$defaults = array(
	'value' => '',
	'disabled' => false,
);

$vars = array_merge($defaults, $vars);

$params = array();
if (isset($vars['match_on'])) {
	$params['match_on'] = $vars['match_on'];
	unset($vars['match_on']);
}
if (isset($vars['match_owner'])) {
	$params['match_owner'] = $vars['match_owner'];
	unset($vars['match_owner']);
}
$ac_url_params = http_build_query($params);

elgg_load_js('elgg.autocomplete');
elgg_load_js('jquery.ui.autocomplete.html');

?>

<script type="text/javascript">
elgg.provide('elgg.autocomplete');
elgg.autocomplete.url = "<?php echo $livesearch_url . '?' . $ac_url_params; ?>";
</script> 
<input type="text" <?php echo elgg_format_attributes($vars); ?> />

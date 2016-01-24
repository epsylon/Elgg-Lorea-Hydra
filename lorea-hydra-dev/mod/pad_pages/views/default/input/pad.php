<?php
/**
 * Collaborative pages pad input
 * Displays a text pad input field
 *
 * @package PadPages
 *
 * @uses $vars['padId'] Id for the pad
 * @uses $vars['options'] array with etherpad-jquery options api
 * @uses $vars['class'] Additional CSS class
 */

if (isset($vars['class'])) {
	$vars['class'] = "elgg-input-pad {$vars['class']}";
} else {
	$vars['class'] = "elgg-input-pad";
}

if(!isset($vars['options'])){
	$vars['options'] = array();
}

if(isset($vars['padId'])){
	$vars['options']['padId'] = $vars['padId'];
}

$json_defaults = array(
	'host' => 'http://localhost:9001',
	'baseUrl' => '/p/',
	'showControls' => true,
	'showChat' => false,
	'showLineNumbers' => false,
	'userName' => elgg_get_logged_in_user_entity()->username,
	'useMonospaceFont' => false,
	'noColors' => 'false',
);

$defaults = array(
	'id' => 'pad',
);

$vars['options'] = array_merge($json_defaults, $vars['options']);
$vars = array_merge($defaults, $vars);

$json = json_encode($vars['options']);
$id = $vars['id'];

unset($vars['padId']);
unset($vars['options']);
elgg_load_js('vendors:etherpad-lite-jquery');
?>
<div <?php echo elgg_format_attributes($vars); ?>></div>
<script type="text/javascript">
<?php
echo "	$('#$id').css({height:'400px'}).pad($json);
	$('#$id iframe').css({width:'100%', height:'100%'});";
?>
</script>


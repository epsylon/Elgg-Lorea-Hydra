<?php
/**
 * Modbash Clean Elgg Theme
 *
 * Copyright (c) 2015 ModBash
 *
 * @author     Shane Barron <admin@modbash.com>
 * @copyright  2015 SocialApparatus
 * @license    GNU General Public License (GPL) version 2
 * @version    1
 * @link       http://modbash.com
 */
$class = 'elgg-layout clearfix';
if (isset($vars['class'])) {
    $class = "$class {$vars['class']}";
}
?>

<div class="<?php echo $class; ?>">
    <div>
<?php
echo elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));

echo elgg_view('page/layouts/elements/header', $vars);

// @todo deprecated so remove in Elgg 2.0
if (isset($vars['area1'])) {
    echo $vars['area1'];
}
if (isset($vars['content'])) {
    echo $vars['content'];
}

echo elgg_view('page/layouts/elements/footer', $vars);
?>
    </div>
    <div class="elgg-sidebar">
<?php
// With the mobile experience in mind, the content order is changed in aalborg theme,
// by moving sidebar below main content.
// On smaller screens, blocks are stacked in left to right order: content, sidebar.
echo elgg_view('page/elements/sidebar', $vars);
?>
    </div>
</div>

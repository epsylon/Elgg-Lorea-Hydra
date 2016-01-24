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
?>

<div>
    <label><?php echo elgg_echo('user:name:label'); ?></label>
    <?php echo elgg_view('input/text', array('name' => 'name', 'value' => $vars['entity']->name)); ?>
</div>
<?php
$sticky_values = elgg_get_sticky_values('profile:edit');

$profile_fields = elgg_get_config('profile_fields');
if (is_array($profile_fields) && count($profile_fields) > 0) {
    foreach ($profile_fields as $shortname => $valtype) {
        $metadata = elgg_get_metadata(array(
            'guid'          => $vars['entity']->guid,
            'metadata_name' => $shortname,
            'limit'         => false
        ));
        if ($metadata) {
            if (is_array($metadata)) {
                $value = '';
                foreach ($metadata as $md) {
                    if (!empty($value)) {
                        $value .= ', ';
                    }
                    $value .= $md->value;
                    $access_id = $md->access_id;
                }
            } else {
                $value = $metadata->value;
                $access_id = $metadata->access_id;
            }
        } else {
            $value = '';
            $access_id = ACCESS_DEFAULT;
        }

        // sticky form values take precedence over saved ones
        if (isset($sticky_values[$shortname])) {
            $value = $sticky_values[$shortname];
        }
        if (isset($sticky_values['accesslevel'][$shortname])) {
            $access_id = $sticky_values['accesslevel'][$shortname];
        }
        ?>
        <label style="margin-top:10px;"><?php echo elgg_echo("profile:{$shortname}") ?></label>
        <div class="row">
            <?php
            echo ($valtype == "longtext" ? "<div class='col-md-12'>" : "<div class='col-md-8'>");
            echo elgg_view("input/{$valtype}", array(
                'name'  => $shortname,
                'value' => $value,
            ));
            ?>
        </div>
        <?php
        echo ($valtype == "longtext" ? "<div class='col-md-12'>" : "<div class='col-md-4'>");
        echo elgg_view('input/access', array('name'  => "accesslevel[$shortname]",
            'value' => $access_id,
        ));
        ?>
        </div>
</div>
        <?php
    }
}

elgg_clear_sticky_form('profile:edit');
?>
<div class="elgg-foot">
    <?php
    echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $vars['entity']->guid));
    echo elgg_view('input/submit', array('value' => elgg_echo('save'),'style'=>'margin-top:10px;'));
    ?>
</div>

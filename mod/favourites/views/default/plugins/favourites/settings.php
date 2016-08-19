<?php

//$allowed_object_subtypes = "";//can_infinitive_scroll();

?>

<p>
    <label for=""><?php echo elgg_echo('favourites:allowed_object_subtypes_label'); ?></label>
    <?php echo elgg_view('input/text',
            array('name' => 'params[allowed_object_subtypes]',
                  'value' => $vars['entity']->allowed_object_subtypes)); ?>
</p>
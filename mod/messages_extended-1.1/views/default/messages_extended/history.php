<div class="messages_extened-history">
    <h3><?= elgg_echo('messages_extended:history:title'); ?></h3>
    <hr/>
    <?php
    global $CONFIG;

    $title = str_replace('RE: ', '', $vars['message']->title);

    $messages = elgg_list_entities_from_metadata(array(
        'type' => 'object',
        'subtype' => 'messages',
        'owner_guids' => $vars['message']->owner_guid,
        'metadata_name_value_pairs' => array(
            array(
                'name' => 'fromId',
                'value' => array(
                    $vars['message']->fromId,
                    $vars['message']->toId
                )
            )
        ),
        'joins' => array(
            'JOIN ' . $CONFIG->dbprefix . 'objects_entity oe ON oe.guid = e.guid'
        ),
        'wheres' => array(
            'oe.title LIKE "%' . sanitise_string($title) . '"'
        ),
        'full_view' => false,
    ));

    // We don't need to have a check if something is found, because the current item is always in there.
    echo $messages;
    ?>
    <script>
        $('#elgg-object-<?= $vars['message']->guid; ?>').css('font-weight', 'bold');
    </script>
</div>

<?php
  $group = $vars['entity'];
  $parent = au_subgroups_get_parent_group($group);
  
  if ($parent && !$group->isMember() ) {
?>

<div class="">
  <?php
  
  echo elgg_echo('au_subgroups:needjoinparent');
  ?>
  
</div>
<?php
  }
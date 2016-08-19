<?php
/**
 * ElggPG -- Send key form
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
	$currentuser = $vars['currentuser'];
?>

<div>
  <h2><?php echo elgg_echo('elggpg:sendamessage'); ?></h2>
  <form action="<?php echo $vars['url']; ?>action/elggpg/send" method="post" enctype="multipart/form-data">
    <?php echo elgg_view('input/securitytoken'); ?>
    <input type="hidden" name="username" value="<?php echo $currentuser->username; ?>" />
    <input type="hidden" name="send_to" value="<?php echo $currentuser->getGUID(); ?>" />

    <p><label><?php echo elgg_echo("messages:title"); ?>: <br /><input type='text' name='title' value='<?php echo $msg_title; ?>' class="input-text" /></label></p>
    <p class="longtext_editarea"><label><?php echo elgg_echo("messages:message"); ?>: <br />
    <?php
      echo elgg_view("input/plaintext", array(
        "name" => "message",
        "value" => "",
      ));
    ?>
    </label></p>
    <p><input type="submit" class="elgg-button elgg-button-submit" value="<?php echo elgg_echo("messages:fly"); ?>" /></p>
  </form>
</div>

<?php

$plugin = $vars["entity"];

$noyes_options = array(
	"no" => elgg_echo("option:no"),
	"yes" => elgg_echo("option:yes"),
);

$user_options = array(
	"disable" => elgg_echo("account_removal:admin:settings:user_options:disable"),
	"remove" => elgg_echo("account_removal:admin:settings:user_options:remove"),
	"disable_and_remove" => elgg_echo("account_removal:admin:settings:user_options:disable_and_remove"),
);

?>
<div>
	<?php
		echo elgg_echo("account_removal:admin:settings:user_options");
		echo "&nbsp;" . elgg_view("input/dropdown", array(
			"name" => "params[user_options]",
			"options_values" => $user_options,
			"value" => $plugin->user_options
		));
	?>
</div>

<div>
	<?php
		echo elgg_echo("account_removal:admin:settings:groupadmins_allowed");
		echo "&nbsp;" . elgg_view("input/dropdown", array(
			"name" => "params[groupadmins_allowed]",
			"options_values" => $noyes_options,
			"value" => $plugin->groupadmins_allowed
		));
	?>
</div>

<div>
	<?php
		echo elgg_echo("account_removal:admin:settings:reason_required");
		echo "&nbsp;" . elgg_view("input/dropdown", array(
			"name" => "params[reason_required]",
			"options_values" => $noyes_options,
			"value" => $plugin->reason_required
		));
	?>
</div>
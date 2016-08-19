<?php
/**
 * special autocomplete input
 */
$name = elgg_extract("name", $vars); // input name of the selected user
$id = elgg_extract("id", $vars);
$relationship = elgg_extract("relationship", $vars);

$destination = $id . "_autocomplete_results";

$minChars = (int) elgg_extract("minChars", $vars, 3);
if ($minChars < 1) {
	$minChars = 3;
}

echo elgg_view('input/text', [
	'id' => $id . '_autocomplete',
	'class' => 'elgg-input-autocomplete'	
]);

echo elgg_format_element('div', ['id' => $destination, 'class' => 'mtm clearfloat']);
?>
<script type="text/javascript">
	$(document).ready(function() {

		$("#<?php echo $id; ?>_autocomplete").each(function() {
			$(this)
			// don't navigate away from the field on tab when selecting an item
			.bind( "keydown", function(event) {
				if (event.keyCode === $.ui.keyCode.TAB &&
						$(this).data("autocomplete").menu.active) {
					event.preventDefault();
				}
			})
			.autocomplete({
				source: function(request, response) {
					$.getJSON(elgg.get_site_url() + "groups/group_invite_autocomplete", {
						q: request.term,
						'user_guids': function() {
							var result = "";
							
							$("#<?php echo $destination; ?> input[name='<?php echo $name; ?>[]']").each(function(index, elem) {
								if (result == "") {
									result = $(this).val();
								} else {
									result += "," + $(this).val();
								}
							});
		
							return result;
						},
						'group_guid' : <?php echo $vars["group_guid"]; ?>
						<?php
						if (!empty($relationship)) {
							echo ", 'relationship' : '" . $relationship . "'";
						}
						?>
					}, response );
				},
				search: function() {
					// custom minLength
					var term = this.value;
					if (term.length < <?php echo $minChars; ?>) {
						return false;
					}
				},
				focus: function(event) {
					// prevent value inserted on focus
					return false;
				},
				select: function(event, ui) {
					this.value = "";
					var result = "";
					
					result += "<div class='group_tools_group_invite_autocomplete_autocomplete_result elgg-discover_result elgg-discover'>";
					if (ui.item.type == "user") {
						result += "<input type='hidden' value='" + ui.item.value + "' name='<?php echo $name; ?>[]' />";
					} else if (ui.item.type == "email") {
						result += "<input type='hidden' value='" + ui.item.value + "' name='<?php echo $name; ?>_email[]' />";
					}
					result += ui.item.content;
					
					result += "<?php echo addslashes(elgg_view_icon("delete-alt", "elgg-discoverable float-alt")); ?>";
                                        // some filter is breaking the following line, so we do this
                                        // to bypass the filter :P
                                        var divThis = "</d";
                                        divThis += "iv>";
					result += divThis;
					
					$('#<?php echo $destination; ?>').append(result);
					return false;
				},
				autoFocus: true,
				messages: {
			        noResults: '',
			        results: function() {}
			    }
			}).data("ui-autocomplete")._renderItem = function(ul, item) {
				var list_body = "";
				list_body = item.content;
				
				return $("<li></li>")
					.data("item.autocomplete", item)
					.append("<a>" + list_body + "</a>")
					.appendTo(ul);
			};
		});

		$('#<?php echo $destination; ?> .elgg-icon-delete-alt').live("click", function() {
			$(this).parent('div').remove();
		});
	});
	
</script>

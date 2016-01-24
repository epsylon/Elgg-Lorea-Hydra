<?php
/**
 * Messages JavaScript
 *
 */

$refresh_time = elgg_get_plugin_setting("messages_refresh_rate", "messages");

if ($refresh_time == '') {
	$refresh_time = '180000';
}

?>
<script type="text/javascript">
var userGUID = elgg.get_logged_in_user_guid();

var refreshId = setInterval(function() {
	elgg.action('messages/refreshmsgs', {
		data: { user_guid: userGUID },
		success: function(data)
		{
			$('span#messages-new').remove();
			$('span#messages-topbar-icon').after(data.output.unread_messages);
		}
	});
}, <?php echo $refresh_time; ?>);
	$(document).ready(function() {
	elgg.action('messages/refreshmsgs', {
		data: { user_guid: userGUID },
		success: function(data)
		{
			$('span#messages-new').remove();
			$('span#messages-topbar-icon').after(data.output.unread_messages);
		}
	});
});
</script>


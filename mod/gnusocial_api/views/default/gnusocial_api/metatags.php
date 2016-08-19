<?php
/**
 * Adds required HTML head tags for GNUSocial Services.
 *
 * @package GNUSocialAPI
 */

if ($api_key = elgg_get_plugin_setting('consumer_key', 'gnusocial_api')) {
	$tags = <<<__HTML
<script src="http://platform.gnusocial.com/anywhere.js?id=$api_key&v=1" type="text/javascript"></script>
<script type="text/javascript">
	twttr.anywhere(function (T) {
		T(".gnusocial_anywhere").hovercards();
	});
</script>
__HTML;

	echo $tags;
}

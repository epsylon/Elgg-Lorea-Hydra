<?php
$owner = elgg_get_page_owner_entity();
echo '<link rel="openid2.provider openid.server" href="' . elgg_get_site_url() . 'mod/openid_server/server.php" />';
if ($owner) {
	echo '<link rel="openid2.local_id openid.delegate" href="' . elgg_get_site_url() . 'profile/' . $owner->username . '" />';
}

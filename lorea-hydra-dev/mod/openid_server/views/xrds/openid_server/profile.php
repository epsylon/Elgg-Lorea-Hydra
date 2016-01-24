<?php
	/*
	XRDS info to validate delegated identities
	*/
	$user = elgg_get_page_owner_entity();
?>
          <Service priority="0">
            <Type>http://specs.openid.net/auth/2.0/signon</Type>
            <LocalID><?php echo $vars['url']; ?>mod/openid_server/server.php</LocalID>
            <URI><?php echo $vars['url']; ?>mod/openid_server/server.php</URI>
          </Service>

<?php
	/*
	XRD info to identify do eaut email to profile mapping
        and identify openid 2.0 server.
	*/
?>
          <Service priority="0">
            <Type>http://specs.eaut.org/1.0/template</Type>
            <URI><?php echo $vars['url']; ?>profile/%7Busername%7D</URI>
          </Service>
          <Service priority="10">
            <Type>http://specs.openid.net/auth/2.0/server</Type>
            <URI><?php echo $vars['url']; ?>mod/openid_server/server.php</URI>
          </Service>


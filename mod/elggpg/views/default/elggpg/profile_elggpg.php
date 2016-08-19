<?php

$owner = $vars['entity'];

echo "PGP".$owner->openpgp_publickey;

if(!empty($owner->openpgp_publickey)) {

        echo "<div class=\"even\"><div class=\"profile_donation\">";
        echo $owner->openpgp_publickey;
        echo "</div></div>";
}

?>

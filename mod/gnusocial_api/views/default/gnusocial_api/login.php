<?php
/**
 * Extension of login form for GNUSocial sign in
 */

$url = elgg_get_site_url() . 'gnusocial_api/forward';
$img_url = elgg_get_site_url() . 'mod/gnusocial_api/graphics/gnusocial.png';

$login = <<<__HTML
<div class="login_with_gnusocial">
	<a href="$url">
		<img src="$img_url" alt="GNUSocial" />
	</a>
</div>
__HTML;

echo $login;

<?php
return array(
	'gnusocial_api' => 'GNUSocial Services',

	'gnusocial_api:requires_oauth' => 'GNUSocial Services requires the OAuth Libraries plugin to be enabled.',

	'gnusocial_api:consumer_key' => 'Consumer Key',
	'gnusocial_api:consumer_secret' => 'Consumer Secret',

	'gnusocial_api:settings:instructions' => 'You must obtain a consumer key and secret from <a href="https://dev.gnusocial.com/apps/new" target="_blank">GNUSocial</a>. Fill out the new app application. Select "Browser" as the application type and "Read & Write" for the access type. The callback url is %sgnusocial_api/authorize',

	'gnusocial_api:usersettings:description' => "Link your %s account with GNUSocial.",
	'gnusocial_api:usersettings:request' => "You must first <a href=\"%s\">authorize</a> %s to access your GNUSocial account.",
	'gnusocial_api:usersettings:cannot_revoke' => "You cannot unlink you account with GNUSocial because you haven't provided an email address or password. <a href=\"%s\">Provide them now</a>.",
	'gnusocial_api:authorize:error' => 'Unable to authorize GNUSocial.',
	'gnusocial_api:authorize:success' => 'GNUSocial access has been authorized.',

	'gnusocial_api:usersettings:authorized' => "You have authorized %s to access your GNUSocial account: @%s.",
	'gnusocial_api:usersettings:revoke' => 'Click <a href="%s">here</a> to revoke access.',
	'gnusocial_api:usersettings:site_not_configured' => 'An administrator must first configure GNUSocial before it can be used.',

	'gnusocial_api:revoke:success' => 'GNUSocial access has been revoked.',

	'gnusocial_api:post_to_gnusocial' => "Send users' wire posts to GNUSocial?",

	'gnusocial_api:login' => 'Allow users to sign in with GNUSocial?',
	'gnusocial_api:new_users' => 'Allow new users to sign up using their GNUSocial account even if user registration is disabled?',
	'gnusocial_api:login:success' => 'You have been logged in.',
	'gnusocial_api:login:error' => 'Unable to login with GNUSocial.',
	'gnusocial_api:login:email' => "You must enter a valid email address for your new %s account.",

	'gnusocial_api:invalid_page' => 'Invalid page',

	'gnusocial_api:deprecated_callback_url' => 'The callback URL has changed for GNUSocial API to %s.  Please ask your administrator to change it.',

	'gnusocial_api:interstitial:settings' => 'Configure your settings',
	'gnusocial_api:interstitial:description' => 'You\'re almost ready to use %s! We need a few more details before you can continue. These are optional, but will allow you login if GNUSocial goes down or you decide to unlink your accounts.',

	'gnusocial_api:interstitial:username' => 'This is your username. It cannot be changed. If you set a password, you can use the username or your email address to log in.',

	'gnusocial_api:interstitial:name' => 'This is the name people will see when interacting with you.',

	'gnusocial_api:interstitial:email' => 'Your email address. Users cannot see this by default.',

	'gnusocial_api:interstitial:password' => 'A password to login if GNUSocial is down or you decide to unlink your accounts.',
	'gnusocial_api:interstitial:password2' => 'The same password, again.',

	'gnusocial_api:interstitial:no_thanks' => 'No thanks',

	'gnusocial_api:interstitial:no_display_name' => 'You must have a display name.',
	'gnusocial_api:interstitial:invalid_email' => 'You must enter a valid email address or nothing.',
	'gnusocial_api:interstitial:existing_email' => 'This email address is already registered on this site.',
	'gnusocial_api:interstitial:password_mismatch' => 'Your passwords do not match.',
	'gnusocial_api:interstitial:cannot_save' => 'Cannot save account details.',
	'gnusocial_api:interstitial:saved' => 'Account details saved!',
);

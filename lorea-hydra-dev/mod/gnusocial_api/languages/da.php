<?php
return array(
	'gnusocial_api' => 'GNUSocial Services',

	'gnusocial_api:requires_oauth' => 'GNUSocial Services kræver at OAuth Libraries plugin er aktiveret.',

	'gnusocial_api:consumer_key' => 'Consumer Key',
	'gnusocial_api:consumer_secret' => 'Consumer Secret',

	'gnusocial_api:settings:instructions' => 'Du skal indhente en Consumer Key og Consumer Secret fra <a href="https://dev.gnusocial.com/apps/new" target="_blank">GNUSocial</a>. Udfyld den nye app ansøgning. Vælg "Browser" som ansøgningstype og "Read & Write" som adgangstype. Callback url er %sgnusocial_api/authorize',

	'gnusocial_api:usersettings:description' => "Link din %s konto med GNUSocial.",
	'gnusocial_api:usersettings:request' => "Du skal først <a href=\"%s\">autorisere</a> %s for at få adgang til din GNUSocial konto.",
	'gnusocial_api:usersettings:cannot_revoke' => "You cannot unlink you account with GNUSocial because you haven't provided an email address or password. <a href=\"%s\">Provide them now</a>.",
	'gnusocial_api:authorize:error' => 'Kunne ikke autorisere GNUSocial.',
	'gnusocial_api:authorize:success' => 'GNUSocial adgang er blevet autoriseret.',

	'gnusocial_api:usersettings:authorized' => "Du har autoriseret %s til at tilgå din GNUSocial konto: @%s.",
	'gnusocial_api:usersettings:revoke' => 'Klik <a href="%s">her</a> for at tilbagekalde adgangstilladelse.',
	'gnusocial_api:usersettings:site_not_configured' => 'An administrator must first configure GNUSocial before it can be used.',

	'gnusocial_api:revoke:success' => 'GNUSocial adgang er blevet tilbagekaldt.',

	'gnusocial_api:post_to_gnusocial' => "Send brugernes wire indlæg til GNUSocial?",

	'gnusocial_api:login' => 'Tillad nye brugere at registrere sig med GNUSocial?',
	'gnusocial_api:new_users' => 'Tillad nye brugere at tilmelde sig ved hjælp af deres GNUSocial konto, selvom brugerregistrering er deaktiveret?',
	'gnusocial_api:login:success' => 'Du er blevet logget ind.',
	'gnusocial_api:login:error' => 'Kunne ikke logge ind med GNUSocial.',
	'gnusocial_api:login:email' => "Du skal indtaste en gyldig e-mail adresse til din nye %s konto.",

	'gnusocial_api:invalid_page' => 'Invalid page',

	'gnusocial_api:deprecated_callback_url' => 'Callback URL\'en er ændret for GNUSocial API til %s.  Bed din administrator om at ændre det.',

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

<?php
return array(
	'gnusocial_api' => 'Sevizi GNUSocial',

	'gnusocial_api:requires_oauth' => 'Per essere attivati i servizi GNUSocial richiedono la libreria per il plugin OAuth.',

	'gnusocial_api:consumer_key' => 'Consumer Key',
	'gnusocial_api:consumer_secret' => 'Consumer Secret',

	'gnusocial_api:settings:instructions' => 'You must obtain a consumer key and secret from <a rel="nofollow" href="https://dev.gnusocial.com/apps/new" target="_blank">GNUSocial</a>. Fill out the new app application. Select "Browser" as the application type and "Read & Write" for the access type. The callback url is %sgnusocial_api/authorize',

	'gnusocial_api:usersettings:description' => "Colelgamento al tuo %s account su GNUSocial.",
	'gnusocial_api:usersettings:request' => "Dovresti <a href=\"%s\">autorizzare</a> %s l'accesso al tuo account GNUSocial.",
	'gnusocial_api:usersettings:cannot_revoke' => "Non puoi disconnetter il tuo account da GNUSocial perché non hai fornito un indirizzo email o password. <a href=\"%s\">Forniscili ora</a>.",
	'gnusocial_api:authorize:error' => 'Impossibile autorizzare GNUSocial.',
	'gnusocial_api:authorize:success' => 'L\'accesso a GNUSocial è stato autorizzato.',

	'gnusocial_api:usersettings:authorized' => "hai autorizzato %s ad accedere al tuo account GNUSocial: @%s",
	'gnusocial_api:usersettings:revoke' => 'clicca <a href="%s">qui</a> per revocare l\'accesso.',
	'gnusocial_api:usersettings:site_not_configured' => 'Un amministratore deve configurare GNUSocial prima dell\'uso.',

	'gnusocial_api:revoke:success' => 'L\'accesso a GNUSocial è stato revocato.',

	'gnusocial_api:post_to_gnusocial' => "Send users' wire posts to GNUSocial?",

	'gnusocial_api:login' => 'Vuoi permettere agli utenti esistenti che hanno connesso il loro account GNUSocial ad entrare tramite GNUSocial',
	'gnusocial_api:new_users' => 'Allow new users to sign up using their GNUSocial account even if user registration is disabled?',
	'gnusocial_api:login:success' => 'Benvenuto/a su  .',
	'gnusocial_api:login:error' => 'Impossibile fare login con GNUSocial.',
	'gnusocial_api:login:email' => "Devi inserire un indirizzo e-mail valido per il tuo nuovo account %s .",

	'gnusocial_api:invalid_page' => 'pagina non valida',

	'gnusocial_api:deprecated_callback_url' => 'The callback URL has changed for GNUSocial API to %s.  Please ask your administrator to change it.',

	'gnusocial_api:interstitial:settings' => 'Configura i tuoi settings',
	'gnusocial_api:interstitial:description' => 'Sei quasi pronto ad usare %s! abbiamo bisogno di alcuni ulteriori dettagli prima di continuare. Sono opzionali, ma ti permetteranno di fare login se GNUSocial avesse problemi o se decidi di scollegare i tuoi account.',

	'gnusocial_api:interstitial:username' => 'Questo è il tuo username, che non potrà essere cambiato. Se imposti una password, per fare login puoi utilizzare gli username o indirizzo e-mail.',

	'gnusocial_api:interstitial:name' => 'questo è il nome che la gente vedrà quando dovrà interagire con te.',

	'gnusocial_api:interstitial:email' => 'Tuo indirizzo e-mail. Gli utenti non potranno vederlo di default.',

	'gnusocial_api:interstitial:password' => 'Una password per entrare se GNUSocial non funziona o decidi di collegare i tuoi account.',
	'gnusocial_api:interstitial:password2' => 'Ripeti la password.',

	'gnusocial_api:interstitial:no_thanks' => 'No grazie',

	'gnusocial_api:interstitial:no_display_name' => 'Devi avere un nome utente.',
	'gnusocial_api:interstitial:invalid_email' => 'Devi inserire un indirizzo e-mail valido o niente.',
	'gnusocial_api:interstitial:existing_email' => 'Questo indirizzo e-mail è già registrato in questo sito.',
	'gnusocial_api:interstitial:password_mismatch' => 'Le tue password non coincidono.',
	'gnusocial_api:interstitial:cannot_save' => 'Impossibile salvare i dettagli dell\'account.',
	'gnusocial_api:interstitial:saved' => 'Dettagli account salvati!',
);

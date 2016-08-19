<?php
return array(
	'gnusocial_api' => 'Sevizi di GNUSocial',

	'gnusocial_api:requires_oauth' => 'I servizi di GNUSocial richiedono il plugin delle librerie OAuth per essere attivati.',

	'gnusocial_api:consumer_key' => 'Consumer Key',
	'gnusocial_api:consumer_secret' => 'Consumer Secret',

	'gnusocial_api:settings:instructions' => 'Bisogna ottenere una "consumer key" e un "consumer secret " da <a rel="nofollow" href="https://dev.gnusocial.com/apps/new" target="_blank">GNUSocial</a>. Completare la richiesta per la nuova app. Selezionare "Browser" come "application type" e "Read & Write" come tipo di accesso. L\'URL di callback è  %sgnusocial_api/authorize',

	'gnusocial_api:usersettings:description' => "Collega il tuo %s profilo con GNUSocial.",
	'gnusocial_api:usersettings:request' => "Innanzitutto devi  <a href=\"%s\">autorizzare</a> %s l'accesso al tuo account GNUSocial.",
	'gnusocial_api:usersettings:cannot_revoke' => "Non puoi scollegare questo tuo profilo da GNUSocial, perché non hai fornito un indirizzo email o una password. <a href=\"%s\">Forniscili ora</a>.",
	'gnusocial_api:authorize:error' => 'Impossibile autorizzare GNUSocial.',
	'gnusocial_api:authorize:success' => 'L\'accesso a GNUSocial è stato autorizzato.',

	'gnusocial_api:usersettings:authorized' => "Hai autorizzato %s ad accedere al tuo profilo GNUSocial: @%s",
	'gnusocial_api:usersettings:revoke' => 'Clicca <a href="%s">qui</a> per revocare l\'accesso.',
	'gnusocial_api:usersettings:site_not_configured' => 'Un amministratore deve configurare GNUSocial prima di poterlo usare.',

	'gnusocial_api:revoke:success' => 'L\'accesso a GNUSocial è stato revocato.',

	'gnusocial_api:post_to_gnusocial' => "Inoltrare i telegrammi dell'utente su GNUSocial?",

	'gnusocial_api:login' => 'Permettere agli utenti di registrarsi con GNUSocial?',
	'gnusocial_api:new_users' => 'Permette ai nuovi utenti di registrarsi utilizzando il loro profilo GNUSocial anche se la registrazione degli utenti è disabilitata?',
	'gnusocial_api:login:success' => 'Avete avuto accesso al sito.',
	'gnusocial_api:login:error' => 'Impossibile accedere con GNUSocial.',
	'gnusocial_api:login:email' => "Devi inserire un indirizzo email valido per il tuo nuovo profilo %s .",

	'gnusocial_api:invalid_page' => 'Pagina non valida',

	'gnusocial_api:deprecated_callback_url' => 'L\'URL di callback per l\'API di GNUSocial è cambiato in %s.  Per cortesia chiedi al tuo amministratore di cambiarlo.',

	'gnusocial_api:interstitial:settings' => 'Configura le tue impostazioni',
	'gnusocial_api:interstitial:description' => 'Sei quasi pronto ad usare %s! Abbiamo bisogno di alcuni ulteriori dettagli prima di poter continuare. Sono opzionali, ma ti permetteranno di accedere se GNUSocial avesse dei problemi, o se decidessi di scollegare i tuoi profili.',

	'gnusocial_api:interstitial:username' => 'Questo è il tuo nome utente, che non potrà essere cambiato. Se imposti una password, per accedere puoi utilizzare il tuo nome utente o il tuo indirizzo email.',

	'gnusocial_api:interstitial:name' => 'Questo è il nome che gli utenti vedranno quando dovranno interagire con te.',

	'gnusocial_api:interstitial:email' => 'Tuo indirizzo email. Di norma gli utenti non possono visualizzarlo.',

	'gnusocial_api:interstitial:password' => 'Una password per accedere se GNUSocial non funziona, o se decidi di scollegare da GNUSocial la tua registrazione a questo sito.',
	'gnusocial_api:interstitial:password2' => 'Ripeti la password.',

	'gnusocial_api:interstitial:no_thanks' => 'No grazie',

	'gnusocial_api:interstitial:no_display_name' => 'Devi avere un nome utente.',
	'gnusocial_api:interstitial:invalid_email' => 'Devi inserire un indirizzo email valido o niente.',
	'gnusocial_api:interstitial:existing_email' => 'Questo indirizzo email è già utilizzato in questo sito.',
	'gnusocial_api:interstitial:password_mismatch' => 'Le tue password non coincidono.',
	'gnusocial_api:interstitial:cannot_save' => 'Impossibile salvare i dettagli del profilo.',
	'gnusocial_api:interstitial:saved' => 'Dettagli profilo salvati!',
);

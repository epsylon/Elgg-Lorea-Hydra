<?php
return array(
	'gnusocial_api' => 'GNUSocial Services',

	'gnusocial_api:requires_oauth' => 'GNUSocial Services vereist dat de OAuth libraries-plugin is ingeschakeld.',

	'gnusocial_api:consumer_key' => 'Consumer Key',
	'gnusocial_api:consumer_secret' => 'Consumer Secret',

	'gnusocial_api:settings:instructions' => 'Je moet een Consumer Key en Consumer Secret aanvragen bij <a href="https://dev.gnusocial.com/apps/new" target="_blank">GNUSocial</a>. Vul het formulier in voor een nieuwe applicatie. Selecteer "Browser" voor het applicatietype en "Read & Write" voor de rechten. De callback-URL is %sgnusocial_api/authorize',

	'gnusocial_api:usersettings:description' => "Koppel je %s account met GNUSocial.",
	'gnusocial_api:usersettings:request' => "Je moet eerst %2$s <a href=\"%1$s\">autoriseren</a> om toegang te krijgen tot je GNUSocial account.",
	'gnusocial_api:usersettings:cannot_revoke' => "Je kunt je account niet ontkoppelen van GNUSocial omdat je geen e-mailadres of wachtwoord hebt opgegeven. <a href=\"%s\">Vul dit nu in!</a>",
	'gnusocial_api:authorize:error' => 'Fout tijdens het autoriseren van GNUSocial.',
	'gnusocial_api:authorize:success' => 'GNUSocialtoegang is geautoriseerd.',

	'gnusocial_api:usersettings:authorized' => "Je hebt %s geautoriseerd om toegang te krijgen tot je GNUSocialaccount: @%s.",
	'gnusocial_api:usersettings:revoke' => 'Klik <a href="%s">hier</a> om de toegang in te trekken.',
	'gnusocial_api:usersettings:site_not_configured' => 'Een beheerder moet GNUSocial eerst instellen voordat het gebruikt kan worden.',

	'gnusocial_api:revoke:success' => 'GNUSocialtoegang is ingetrokken.',

	'gnusocial_api:post_to_gnusocial' => "Wil je dat jouw Wire-berichten ook op je GNUSocialtijdlijn gepost worden? ",

	'gnusocial_api:login' => 'Mogen bestaande gebruikers die hun GNUSocialaccount hebben gekoppeld zich aanmelden met GNUSocial?',
	'gnusocial_api:new_users' => 'Mogen nieuwe gebruikers zich registreren met hun GNUSocialaccount, zelfs als registratie is uitgeschakeld?',
	'gnusocial_api:login:success' => 'Je bent aangemeld.',
	'gnusocial_api:login:error' => 'Aanmelden met GNUSocial mislukt.',
	'gnusocial_api:login:email' => "Je moet een geldig e-mailadres opgeven voor je nieuwe %s account.",

	'gnusocial_api:invalid_page' => 'Ongeldige pagina',

	'gnusocial_api:deprecated_callback_url' => 'De callback-URL voor de GNUSocial-API van %s is gewijzigd. Vraag de beheerder om dit aan te passen.',

	'gnusocial_api:interstitial:settings' => 'Configureer je instellingen',
	'gnusocial_api:interstitial:description' => 'Je bent bijna klaar om gebruik te maken van %s! We hebben echter nog een paar gegevens nodig voordat je verder kunt. Deze zijn optioneel, maar maken het mogelijk dat je je kunt aanmelden als GNUSocial niet beschikbaar is of als je de koppeling met GNUSocial verwijdert. ',

	'gnusocial_api:interstitial:username' => 'Dit is je gebruikersnaam. Deze kan niet worden aangepast. Als je een wachtwoord opgeeft, kun je je aanmelden met deze gebruikersnaam of je e-mailadres.',

	'gnusocial_api:interstitial:name' => 'Dit is de naam die mensen zien als ze via de site contact met jou hebben.',

	'gnusocial_api:interstitial:email' => 'Je e-mailadres. Gebruikers kunnen dit standaard <em>niet</em> zien.',

	'gnusocial_api:interstitial:password' => 'Een wachtwoord om je aan te melden als GNUSocial niet beschikbaar is of als je accounts niet meer gekoppeld zijn.',
	'gnusocial_api:interstitial:password2' => 'Hetzelfde wachtwoord, nogmaals',

	'gnusocial_api:interstitial:no_thanks' => 'Nee, dank je',

	'gnusocial_api:interstitial:no_display_name' => 'Je moet een weergavenaam hebben.',
	'gnusocial_api:interstitial:invalid_email' => 'Je moet óf niets, óf een geldig e-mailadres opgeven.',
	'gnusocial_api:interstitial:existing_email' => 'Dit e-mailadres is al geregistreerd op deze site.',
	'gnusocial_api:interstitial:password_mismatch' => 'Je wachtwoorden komen niet overeen.',
	'gnusocial_api:interstitial:cannot_save' => 'De accountdetails kunnen niet worden opgeslagen.',
	'gnusocial_api:interstitial:saved' => 'Accountdetails opgeslagen!',
);

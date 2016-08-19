<?php
return array(
	'gnusocial_api' => 'GNUSocial-Service',

	'gnusocial_api:requires_oauth' => 'Für die GNUSocial-Services muss das OAuth-Libraries-Plugin aktiviert sein.',

	'gnusocial_api:consumer_key' => 'Consumer Key',
	'gnusocial_api:consumer_secret' => 'Consumer Secret',

	'gnusocial_api:settings:instructions' => 'Es ist ein Consumer Key und und ein Consumer Secret von <a href="https://dev.gnusocial.com/apps/new" target="_blank">GNUSocial</a> notwendig.  Fülle auf GNUSocial die Angaben für eine neue Applikation aus. Wähle "Browser" als Applikationstyp und "Read & Write" für die Zugangsberechtigung. Die Callback-URL, die Du angeben mußt, ist %sgnusocial_api/authorize.',

	'gnusocial_api:usersettings:description' => "Verbinde Deinen %s-Account mit GNUSocial.",
	'gnusocial_api:usersettings:request' => "Du mußt zuerst eine <a href=\"%s\">Authorisierung</a> für %s einrichten, damit der Zugriff auf Deinen GNUSocial-Account möglich ist.",
	'gnusocial_api:usersettings:cannot_revoke' => "Du kannst die Verbindung Deines Accounts mit GNUSocial nicht aufheben, da Du keine Email-Addresse oder kein Passwort für Deinen Account angegeben hast. <a href=\"%s\">Gebe diese Angaben jetzt ein</a>.",
	'gnusocial_api:authorize:error' => 'GNUSocial-Authorisierung fehlgeschlagen.',
	'gnusocial_api:authorize:success' => 'GNUSocial-Zugriff wurde authorisiert.',

	'gnusocial_api:usersettings:authorized' => "Du hast %s authorisiert, auf Deinen GNUSocial-Account zuzugreifen: @%s.",
	'gnusocial_api:usersettings:revoke' => '<a href="%s">HIER</a> klicken, um den Zugriff auf Deinen GNUSocial-Account zu widerrufen..',
	'gnusocial_api:usersettings:site_not_configured' => 'Bevor GNUSocial verwendet werden kann, muss erst ein Administrator die Konfiguration vornehmen.',

	'gnusocial_api:revoke:success' => 'GNUSocial-Zugriff wurde widerrufen.',

	'gnusocial_api:post_to_gnusocial' => "Nachrichten von Benutzern im Heißen Draht an GNUSocial senden?",

	'gnusocial_api:login' => 'Anmeldung mit GNUSocial-Accountdaten auf Deiner Elgg-Community-Seite erlauben?',
	'gnusocial_api:new_users' => 'Erlaube neuen Benutzern, sich mit ihren GNUSocial-Accountdaten anzumelden, selbst wenn die Account-Registrierung auf Deiner Elgg-Community-Seite deaktiviert ist?',
	'gnusocial_api:login:success' => 'Du bist nun angemeldet.',
	'gnusocial_api:login:error' => 'Die Anmeldung mit Deinen GNUSocial-Accountdaten ist fehlgeschlagen.',
	'gnusocial_api:login:email' => "Du mußt als erstes eine gültige Email-Adresse für Deinen neuen %s-Account eingeben.",

	'gnusocial_api:invalid_page' => 'Ungültige Seite.',

	'gnusocial_api:deprecated_callback_url' => 'Die Callback-URL für die GNUSocial-API hat sich zu %s geändert. Bitte den Administrator dieser Community-Seite, sie zu ändern.',

	'gnusocial_api:interstitial:settings' => 'Account konfigurieren',
	'gnusocial_api:interstitial:description' => 'Du kannst Dich in wenigen Augenblicken auf %s anmelden! Wir benötigen nur noch einige wenige Angaben. Diese Angaben sind optional, aber sie ermöglichen es Dir, Dich auf dieser Community-Seite anzumelden, falls GNUSocial einmal nicht erreichbar ist oder Du Dich entschließen solltest, die Verbindung zu Deinem GNUSocial-Account zu trennen.',

	'gnusocial_api:interstitial:username' => 'Dies ist Dein Benutzername. Er kann nicht geändert werden. Wenn Du ein Passwort angibst, kannst Du Deinen Benutzernamen oder Deine Email-Adresse für die Anmeldung auf dieser Community-Seite verwenden.',

	'gnusocial_api:interstitial:name' => 'Dies ist der Name, den die anderen Mitglieder sehen werden, wenn sie mit Dir interagieren.',

	'gnusocial_api:interstitial:email' => 'Deine Email-Adresse. Standardmäßig können die anderen Mitglieder der Community-Seite diese nicht sehen.',

	'gnusocial_api:interstitial:password' => 'Ein Passwort, damit Du Dich auf dieser Community-Seite anmelden kannst, falls GNUSocial nicht erreichbar ist oder Du Dich entschließen solltest, die Verbindung zu Deinem GNUSocial-Account zu trennen.',
	'gnusocial_api:interstitial:password2' => 'Das gleiche Passwort noch einmal.',

	'gnusocial_api:interstitial:no_thanks' => 'Nein danke.',

	'gnusocial_api:interstitial:no_display_name' => 'Du mußt einen Namen eingeben.',
	'gnusocial_api:interstitial:invalid_email' => 'Du mußt entweder eine gültige Email-Adresse oder gar keine eingeben.',
	'gnusocial_api:interstitial:existing_email' => 'Diese Email-Adresse ist bereits auf dieser Community-Seite registriert.',
	'gnusocial_api:interstitial:password_mismatch' => 'Die beiden Passwort-Eingaben stimmen nicht überein.',
	'gnusocial_api:interstitial:cannot_save' => 'Das Speichern der Eingaben ist fehlgeschlagen!',
	'gnusocial_api:interstitial:saved' => 'Die Eingaben wurden gespeichert.',
);

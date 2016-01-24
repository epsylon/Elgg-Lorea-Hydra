<?php
return array(
	'gnusocial_api' => 'Usługi GNUSociala',

	'gnusocial_api:requires_oauth' => 'Usługi GNUSociala wymagają włączonego pluginu dostarczającego bibliotekę OAuth.',

	'gnusocial_api:consumer_key' => 'Klucz konsumenta',
	'gnusocial_api:consumer_secret' => 'Sekretny klucz konsumenta',

	'gnusocial_api:settings:instructions' => 'Musisz uzyskać klucz (ang. consumer key) na stronie <a href="https://dev.gnusocial.com/apps/new" target="_blank">GNUSocial</a>. Wypełnij zgłoszenie nowej aplikacji. Wybierz "Browser" jako typ aplikacji oraz "Read & Write" jako rodzaj dostępu. Url wywołania zwrotnego (ang. callback) to %sgnusocial_api/authorize',

	'gnusocial_api:usersettings:description' => "Połącz swoje %s konto z GNUSocialem.",
	'gnusocial_api:usersettings:request' => "Musisz się najpierw <a href=\"%s\">uwierzytelnić</a> %s aby mieć dostęp to konta na GNUSocialze.",
	'gnusocial_api:usersettings:cannot_revoke' => "Nie można rozłączyć twojego konta na GNUSocialze, ponieważ nie wprowadziłeś adresu e-mail ani hasła. <a href=\"%s\">Wprowadź je teraz</a>.",
	'gnusocial_api:authorize:error' => 'Nie powiodła się aautoryzacja na GNUSocialze.',
	'gnusocial_api:authorize:success' => 'Autoryzowano dostęp do GNUSociala.',

	'gnusocial_api:usersettings:authorized' => "Autoryzowałeś dostęp %s do twojego konta na GNUSocialze: @%s.",
	'gnusocial_api:usersettings:revoke' => 'Kliknij <a href="%s">tutaj</a> aby cofnąć dostęp.',
	'gnusocial_api:usersettings:site_not_configured' => 'Administrator musi skonfigurować GNUSociala, zanim będzie można go użyć.',

	'gnusocial_api:revoke:success' => 'Cofnięto dostęp do GNUSociala.',

	'gnusocial_api:post_to_gnusocial' => "Wysyłać  wpisy mikrobloga na GNUSocial'a?",

	'gnusocial_api:login' => 'Zezwolić użytkownikom na logowanie poprzez GNUSocial\'a?',
	'gnusocial_api:new_users' => 'Czy pozwolić na rejestrację przy użyciu kont na GNUSocialze, nawet gdy rejestracja jest wyłączona?',
	'gnusocial_api:login:success' => 'Zostałeś zalogowany.',
	'gnusocial_api:login:error' => 'Nie powiodło się logowanie na GNUSocialze.',
	'gnusocial_api:login:email' => "Musisz podać poprawny adres e-mail do twojego nowego %s konta.",

	'gnusocial_api:invalid_page' => 'Błędna strona',

	'gnusocial_api:deprecated_callback_url' => 'Adres zwrotny URL został zmieniony w API GNUSociala na %s. Poproś administratora o zmianę.',

	'gnusocial_api:interstitial:settings' => 'Zmień swoje ustawienia',
	'gnusocial_api:interstitial:description' => 'Już prawie wszystko gotowe aby używać %s! Potrzebujemy jeszcze tylko kilku dodatkowych informacji. Są one opcjonalne, ale pozwolą na logowanie się w przypadku jeśli GNUSocial będzie niedostępny lub zdecydujesz się rozłączyć konta.',

	'gnusocial_api:interstitial:username' => 'To twój login. Nie może zostać zmieniony. Jeśli ustawisz hasło, będziesz mógł użyć loginu lub adresu e-mail aby się zalogować.',

	'gnusocial_api:interstitial:name' => 'To jest nazwa, którą inne osoby zobaczą wchodząc z Tobą w interakcje.',

	'gnusocial_api:interstitial:email' => 'Twój adres e-mail. Inni użytkownicy domyślnie go nie zobaczą.',

	'gnusocial_api:interstitial:password' => 'Hasło na wypadek niedostępności GNUSociala lub rozłączenia kont.',
	'gnusocial_api:interstitial:password2' => 'To samo hasło, ponownie.',

	'gnusocial_api:interstitial:no_thanks' => 'Nie, dziękuję',

	'gnusocial_api:interstitial:no_display_name' => 'Musisz posiadać nazwę do wyświetlania.',
	'gnusocial_api:interstitial:invalid_email' => 'Musisz podać poprawny adres e-mail lub pozostawić to pole pustym.',
	'gnusocial_api:interstitial:existing_email' => 'Ten adres e-mail jest już zarejestrowany na tej stronie.',
	'gnusocial_api:interstitial:password_mismatch' => 'Twoje hasła do siebie nie pasują.',
	'gnusocial_api:interstitial:cannot_save' => 'Nie udało się zapisać szczegółów konta.',
	'gnusocial_api:interstitial:saved' => 'Szczegóły konta zostały zapisane!',
);

<?php
return array(
	'gnusocial_api' => 'GNUSocial-kirjautuminen',

	'gnusocial_api:requires_oauth' => 'Tämä liitännäinen vaatii, että OAuth-kirjastoliitännäinen on käytössä.',

	'gnusocial_api:consumer_key' => 'Asiakasavain',
	'gnusocial_api:consumer_secret' => 'Asiakassalasana',

	'gnusocial_api:settings:instructions' => 'Sinun pitää hankkia asiakasavain ja -salasana osoitteesta <a href="https://dev.gnusocial.com/apps/new" target="_blank">GNUSocial</a>. Luo uusi sovellus, valitse sovellustyypiksi "Selain" ja anna oikeuksiksi "Lue ja kirjoita". Yhteysosoite on %sgnusocial_api/authorize',

	'gnusocial_api:usersettings:description' => "Yhdistää %s-tilisi GNUSocialiin.",
	'gnusocial_api:usersettings:request' => "Käyttääksesi toimintoa, <a href=\"%s\">anna lupa</a> sivustolle %s päästä käsiksi GNUSocial-tiliisi.",
	'gnusocial_api:usersettings:cannot_revoke' => "Et voi poistaa yhteyttä GNUSocial-tiliin, koska et ole syöttänyt säköpostiosoitetta tai salasanaa. <a href=\"%s\">Lisää ne nyt</a>.",
	'gnusocial_api:authorize:error' => 'GNUSocialiin yhdistäminen epäonnistui.',
	'gnusocial_api:authorize:success' => 'Yhteys GNUSocialiin on muodostettu.',

	'gnusocial_api:usersettings:authorized' => "Olet sallinut %s-sivustolle pääsyn GNUSocial-tiliisi: @%s.",
	'gnusocial_api:usersettings:revoke' => 'Klikkaa <a href="%s">tästä</a> peruaksesi yhteyden.',
	'gnusocial_api:usersettings:site_not_configured' => 'Sivuston ylläpitäjän pitää syöttää GNUSocialiin liittyvät asetukset ennen kuin sitä voidaan käyttää.',

	'gnusocial_api:revoke:success' => 'GNUSocial-yhteys peruttu.',

	'gnusocial_api:post_to_gnusocial' => "Lähetä tilapäivitykset GNUSocialiin?",

	'gnusocial_api:login' => 'Salli kirjautuminen GNUSocial-tilin avulla?',
	'gnusocial_api:new_users' => 'Salli uusien käyttäjien rekisteröityä GNUSocial-tilin avulla vaikka rekisteröityminen olisi otettu pois käytöstä?',
	'gnusocial_api:login:success' => 'Olet kirjautunut sisään.',
	'gnusocial_api:login:error' => 'GNUSocialin avulla kirjautuminen epäonnistui.',
	'gnusocial_api:login:email' => "Syötä sähköpostiosoite uudelle %s-tilillesi.",

	'gnusocial_api:invalid_page' => 'Virhellinen sivu',

	'gnusocial_api:deprecated_callback_url' => 'GNUSocialin yhteysosoite €s on muuttunut. Pyydä sivuston ylläpitäjää vaihtamaan osoite.',

	'gnusocial_api:interstitial:settings' => 'Määrittele asetuksesi',
	'gnusocial_api:interstitial:description' => 'Olet lähes valmis käyttämään %s-sivustoa! Syötä vielä nämä lisätiedot ennen kuin jatkat. Nämä ovat vapaaehtoisia, mutta niiden avulla voit kirjautua, jos GNUSocialiin ei saada yhteyttä, tai jos päätät poistaa yhteyden käyttäjätiliesi väliltä.',

	'gnusocial_api:interstitial:username' => 'Tämä on käyttäjätunnuksesi, jota et voi enää myöhemmin vaihtaa. Jos syötät salasanan, voit käyttää käyttäjätunnustasi tai sähköpostiosoitettasi kirjautumiseen.',

	'gnusocial_api:interstitial:name' => 'Tämä on nimi, jonka muut sivuston jäsenet näkevät.',

	'gnusocial_api:interstitial:email' => 'Sähköpostiosoitteesi. Tämä ei näy oletuksena muille käyttäjille.',

	'gnusocial_api:interstitial:password' => 'Salasana, jonka avulla kirjaudut jos GNUSocialiin ei saada yhteyttä, tai jos päätät poistaa yhteyden käyttäjätiliesi väliltä.',
	'gnusocial_api:interstitial:password2' => 'Salasana uudelleen.',

	'gnusocial_api:interstitial:no_thanks' => 'Ei kiitos',

	'gnusocial_api:interstitial:no_display_name' => 'Sinun pitää syöttää nimesi.',
	'gnusocial_api:interstitial:invalid_email' => 'Sinun pitää syöttää kelvollinen salasana tai jättää kenttä tyhjäksi.',
	'gnusocial_api:interstitial:existing_email' => 'Tämä sähköpostiosoite on jo rekisteröity tällä sivustolla.',
	'gnusocial_api:interstitial:password_mismatch' => 'Salasanat eivät täsmää.',
	'gnusocial_api:interstitial:cannot_save' => 'Tietojen tallentaminen epäonnistui.',
	'gnusocial_api:interstitial:saved' => 'Tiedot tallennettu!',
);

<?php
return array(
	'gnusocial_api' => 'Services GNUSocial',

	'gnusocial_api:requires_oauth' => 'GNUSocial Services nécessitent les bibliothèques OAuth plugin pour être activés.',

	'gnusocial_api:consumer_key' => 'Clé client',
	'gnusocial_api:consumer_secret' => 'Secret du client',

	'gnusocial_api:settings:instructions' => 'Vous devez obtenir une clé client et le code secret à partir de <a href="https://gnusocial.com/oauth_clients" target="_blank">GNUSocial</a> . La plupart des champs sont explicites, la principale donnée dont vous aurez besoin est l\'url de retour qui prend la forme http://[VotreSite]/action/gnusociallogin/return - [VotreSite] est l\'url de votre réseau Elgg.',

	'gnusocial_api:usersettings:description' => "Lier votre compte %s avec GNUSocial.",
	'gnusocial_api:usersettings:request' => "Vous devez d'abord <a href=\"%s\">autoriser</a> %s pour accéder à votre compte GNUSocial.",
	'gnusocial_api:usersettings:cannot_revoke' => "Vous ne pouvez pas enlever le lien entre votre compte et GNUSocial parce que vous n'avez pas fournit d'adresse mail ou de mot de passe. <a href=\"%s\">Donnez les maintenant</a>.",
	'gnusocial_api:authorize:error' => 'Impossible d\'autoriser GNUSocial.',
	'gnusocial_api:authorize:success' => 'L\'accès à GNUSocial a été autorisé.',

	'gnusocial_api:usersettings:authorized' => "Vous avez autorisé %s à accéder à votre compte GNUSocial : @%s.",
	'gnusocial_api:usersettings:revoke' => 'Cliquez <a href="%s">ici</a> pour révoquer l\'accès.',
	'gnusocial_api:usersettings:site_not_configured' => 'Un administrateur doit d\'abord configurer GNUSocial avant qu\'il puisse être utiliser.',

	'gnusocial_api:revoke:success' => 'L\'accès à GNUSocial a été révoqué.',

	'gnusocial_api:post_to_gnusocial' => "Envoyer les messages du microblog des utilisateurs à GNUSocial?",

	'gnusocial_api:login' => 'Permettre aux utilisateurs de connecter avec GNUSocial?',
	'gnusocial_api:new_users' => 'Permet aux nouveaux utilisateurs de s\'inscrire en utilisant leur compte GNUSocial, même si l\'enregistrement manuel est désactivé ?',
	'gnusocial_api:login:success' => 'Vous êtes connecté',
	'gnusocial_api:login:error' => 'Impossible de se connecter à GNUSocial.',
	'gnusocial_api:login:email' => "Vous devez entrer une adresse email valide pour votre nouveau compte %s.",

	'gnusocial_api:invalid_page' => 'Page invalide',

	'gnusocial_api:deprecated_callback_url' => 'L\'URL de retour de l\'API GNUSocial est modifié comme suit %s. Merci de demandez à votre administrateur de la changer.',

	'gnusocial_api:interstitial:settings' => 'Configurer vos paramètres',
	'gnusocial_api:interstitial:description' => 'Vous êtes presque prêt à utiliser %s ! Nous avons besoin de quelques détails supplémentaires avant que vous pussiez continuer. Ils sont facultatifs, mais ils vous permettrons de vous connecter si GNUSocial ne fonctionne pas ou si vous décidez de rompre le lien des comptes.',

	'gnusocial_api:interstitial:username' => 'Voici votre nom utilisateur (login). Il ne peut être changé. Si vous donnez un mot de passe, vous pouvez utiliser le nom d\'utilisateur ou votre adresse mail pour vous connecter.',

	'gnusocial_api:interstitial:name' => 'Voici le nom public que vous verrez quand on interagira avec vous.',

	'gnusocial_api:interstitial:email' => 'Votre adresse mail. Les utilisateurs ne peuvent la voir par défaut.',

	'gnusocial_api:interstitial:password' => 'Une mot de passe pour se connecter si GNUSocial ne fonctionne pas ou si vous décidez de rompre le lien des comptes.',
	'gnusocial_api:interstitial:password2' => 'Même mot de passe à nouveau.',

	'gnusocial_api:interstitial:no_thanks' => 'Non merci',

	'gnusocial_api:interstitial:no_display_name' => 'Vous devez avoir un nom à afficher.',
	'gnusocial_api:interstitial:invalid_email' => 'Vous devez entrer une adresse mail valide ou rien.',
	'gnusocial_api:interstitial:existing_email' => 'Cette adresse mail est déjà enregistrée sur le site.',
	'gnusocial_api:interstitial:password_mismatch' => 'Vos mots de passe ne sont pas les mêmes.',
	'gnusocial_api:interstitial:cannot_save' => 'Impossible de  sauvegarder les détails du compte.',
	'gnusocial_api:interstitial:saved' => 'Détails du compte sauvegardés !',
);

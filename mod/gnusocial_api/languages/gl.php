<?php
return array(
	'gnusocial_api' => 'Servizos de GNUSocial',

	'gnusocial_api:requires_oauth' => '«Servizos de GNUSocial» necesita o complemento «Bibliotecas de OAuth».',

	'gnusocial_api:consumer_key' => 'Chave de cliente',
	'gnusocial_api:consumer_secret' => 'Segredo de cliente',

	'gnusocial_api:settings:instructions' => 'Debe obter unha chave e un segredo de cliente de <a href="https://dev.gnusocial.com/apps/new" target="_blank">GNUSocial</a>. Complete o formulario de solicitude para un novo programa. Seleccione o tipo de programa «Navegador» e acceso de «Lectura e escritura». O URL de resposta é «%sgnusocial_api/authorize».',

	'gnusocial_api:usersettings:description' => "Ligue a súa conta %s con GNUSocial.",
	'gnusocial_api:usersettings:request' => "Primeiro debe <a href=\"%s\">autorizar</a> o acceso de %s á súa conta de GNUSocial.",
	'gnusocial_api:usersettings:cannot_revoke' => "Non pode desligar a súa conta de GNUSocial porque non indicou un enderezo de correo ou contrasina. <a href=\"%s\">Indíqueos</a>.",
	'gnusocial_api:authorize:error' => 'Non se concedeu autorización para acceder a GNUSocial.',
	'gnusocial_api:authorize:success' => 'Autorizouse o acceso a GNUSocial.',

	'gnusocial_api:usersettings:authorized' => "Concedeu a %s autorización para acceder á súa conta de GNUSocial: @%s.",
	'gnusocial_api:usersettings:revoke' => 'Prema <a href="%s">aquí</a> para revogar o acceso.',
	'gnusocial_api:usersettings:site_not_configured' => 'Un administrador debe configurar GNUSocial para poder usalo.',

	'gnusocial_api:revoke:success' => 'Revogouse o acceso a GNUSocial.',

	'gnusocial_api:post_to_gnusocial' => "Enviar as publicación do usuario na liña a GNUSocial?",

	'gnusocial_api:login' => 'Permitir aos usuarios acceder mediante GNUSocial?',
	'gnusocial_api:new_users' => 'Permitir que os novos usuarios se rexistren usando a súa conta de GNUSocial aínda cando o rexistro de novos usuarios estea desactivado?',
	'gnusocial_api:login:success' => 'Accedeu correctamente.',
	'gnusocial_api:login:error' => 'Non foi posíbel acceder mediante GNUSocial.',
	'gnusocial_api:login:email' => "Debe indicar un enderezo de correo electrónico válido para a súa nova conta, «%s».",

	'gnusocial_api:invalid_page' => 'Páxina non válida',

	'gnusocial_api:deprecated_callback_url' => 'O URL de resposta para a API de GNUSocial cambiou a %s. Pídalle ao administrador que o actualice.',

	'gnusocial_api:interstitial:settings' => 'Cambiar a configuración persoal',
	'gnusocial_api:interstitial:description' => 'Está a piques de poder usar %s! Só faltan algúns detalles. Trátase de detalles opcionais, pero permitiranlle acceder ao sitio aínda que GNUSocial non funcione ou en caso de que decida desligar a conta de GNUSocial da súa conta neste sitio.',

	'gnusocial_api:interstitial:username' => 'Este é o seu nome de usuario. Non pode cambialo. Se define un contrasinal, pode usar o nome de usuario ou o enderezo de correo electrónico para identificarse.',

	'gnusocial_api:interstitial:name' => 'Este é o nome que a xente verá cando interactúe con vostede.',

	'gnusocial_api:interstitial:email' => 'O seu enderezo de correo electrónico. De maneira predeterminada, o resto de usuarios non pode velo.',

	'gnusocial_api:interstitial:password' => 'Un contrasinal para acceder se GNUSocial non está a funcionar ou se decide desligar a conta de GNUSocial da conta deste sitio.',
	'gnusocial_api:interstitial:password2' => 'O mesmo contrasinal, outra vez.',

	'gnusocial_api:interstitial:no_thanks' => 'Non, grazas',

	'gnusocial_api:interstitial:no_display_name' => 'Ten que ter un nome para mostrar',
	'gnusocial_api:interstitial:invalid_email' => 'Debe escribir un enderezo de correo electrónico válido ou deixar o campo baleiro',
	'gnusocial_api:interstitial:existing_email' => 'O enderezo de correo electrónico indicado xa está rexistrado no sitio.',
	'gnusocial_api:interstitial:password_mismatch' => 'Os contrasinais non coinciden.',
	'gnusocial_api:interstitial:cannot_save' => 'Non foi posíbel gardar os detalles da conta.',
	'gnusocial_api:interstitial:saved' => 'Gardáronse os detalles da conta.',
);

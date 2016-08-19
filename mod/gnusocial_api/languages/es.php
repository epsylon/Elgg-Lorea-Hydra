<?php
return array(
	'gnusocial_api' => 'Servicios de GNUSocial',

	'gnusocial_api:requires_oauth' => 'Los servicios de GNUSocial requieren que el plugin de la biblioteca OAuth Librares est&eacute; habilitada.',

	'gnusocial_api:consumer_key' => 'Clave p&uacute;blica',
	'gnusocial_api:consumer_secret' => 'Clave privada',

	'gnusocial_api:settings:instructions' => 'Debes obtener una clave p&uacute;blica y privada en GNUSocial. Llena el formulario para la nueva aplicaci&oacute;n. Selecciona "Browser" como el nuevo tipo de aplicaci&oacute;n y "Read & Write" para el tipo de acceso. La URL de callback es: %sgnusocial_api/authorize',

	'gnusocial_api:usersettings:description' => "Enlaza tu cuenta con GNUSocial.",
	'gnusocial_api:usersettings:request' => "Debes antes <a href=\"%s\">autorizar</a> el acceso a la cuenta.",
	'gnusocial_api:usersettings:cannot_revoke' => "No pueds desenlazar tu cuenta con GNUSocial debido a que no has provisto una direcci&oacute;n de email y contrase&ntilde;a. <a href=\"%s\">Proveer una ahora</a>.",
	'gnusocial_api:authorize:error' => 'No se pudo autorizar a GNUSocial.',
	'gnusocial_api:authorize:success' => 'El acceso a Twiiter ha sido autorizado.',

	'gnusocial_api:usersettings:authorized' => "Has sido autorizado %s para acceder a tu cuenta de GNUSocial: @%s.",
	'gnusocial_api:usersettings:revoke' => 'Click <a href="%s">aqu&iacute;</a> para revocar el acceso.',
	'gnusocial_api:usersettings:site_not_configured' => 'Un administrador debe configurar GNUSocial primero para que esta caracter&iacute;stica est&eacute; disponible.',

	'gnusocial_api:revoke:success' => 'El acceso a GNUSocial ha sido revocado.',

	'gnusocial_api:post_to_gnusocial' => "¿Enviar los posts de los usuarios a GNUSocial?",

	'gnusocial_api:login' => 'Permitir a los usuarios ingresar con GNUSocial?',
	'gnusocial_api:new_users' => '&iquest;Permitir a los usuarios nuevos a inscribirse con su cuenta de GNUSocial, incluso si el registro de usuario está desactivada?',
	'gnusocial_api:login:success' => 'Debes haber inicado sesi&oacute;n.',
	'gnusocial_api:login:error' => 'No se puede iniciar sesion en GNUSocial.',
	'gnusocial_api:login:email' => "Debes ingresar una direcci&oacute;n de email v&aacute;lida para la nueva cuenta %s.",

	'gnusocial_api:invalid_page' => 'P&aacute;gina inv&aacute;lida',

	'gnusocial_api:deprecated_callback_url' => 'La dirección URL de devolución de llamada para la API de GNUSocial ha cambiado a %s.  Por favor consulta al administrador como cambiarla.',

	'gnusocial_api:interstitial:settings' => 'Configuraciones',
	'gnusocial_api:interstitial:description' => 'Est&aacute;s casi listo para usar %s! Necesitamos algunos detalles adicionales antes de continuar. Esto es opcional, pero habilitar&aacute; el inicio de sesi&oacute;n si GNUSocial deshabilita tu cuenta.',

	'gnusocial_api:interstitial:username' => 'Este es tu nombre de usuario y no puede ser cambiado. Si configuras una contrase&ntilde;a, puedes usar tu nombre de usuario o email para iniciar sesi&oacute;n.',

	'gnusocial_api:interstitial:name' => 'Este es el nombre con el que ser&aacute;s visible y la gente podr&aacute; contactarte.',

	'gnusocial_api:interstitial:email' => 'Tu direcci&oacute;n de email. Esta no ser&aacute; vista por los dem&aacute;s usuarios.',

	'gnusocial_api:interstitial:password' => 'Una contrase&ntilde;a si GNUSocial decide cancelar tu cuenta.',
	'gnusocial_api:interstitial:password2' => 'Repite la contrase&ntilde;.',

	'gnusocial_api:interstitial:no_thanks' => 'No, gracias',

	'gnusocial_api:interstitial:no_display_name' => 'Debes tener un nombre para mostrar.',
	'gnusocial_api:interstitial:invalid_email' => 'Debes ingresar una direcci&oacute;n de eamil v&aacute;lida o dejar vacio.',
	'gnusocial_api:interstitial:existing_email' => 'esta direcci&oacute;n de email ya est6aacute; usada en este sitio.',
	'gnusocial_api:interstitial:password_mismatch' => 'Las contrase&ntilde;as no coinciden.',
	'gnusocial_api:interstitial:cannot_save' => 'No se pudieron guardar los detalles de la cuenta.',
	'gnusocial_api:interstitial:saved' => 'Configuraci&oacute;n de la cuenta guardada',
);

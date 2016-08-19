<?php
/**
 * Translation strings for Spanish by psy@faeries
 *
 * @package        Lorea
 *
 * Copyright 2011-2016 Lorea Faeries <https://code.lorea.io>
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Affero General Public License
 * as published by the Free Software Foundation, either version 3 of
 * the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this program. If not, see
 * <http://www.gnu.org/licenses/>.
 */

$spanish = array(
	'security_tools' => "Herramientas de seguridad",

	// settings
	'security_tools:settings:secure_upgrade' => "Realizar de forma segura un: upgrade.php",
	'security_tools:settings:secure_upgrade:description' => "Realizando de manera segura el upgrade.php significa que las administradoras logueadas pueden lanzar: upgrade.php",

	'security_tools:settings:mails' => "Correos de Seguridad",
	'security_tools:settings:mails_admin_admins' => "Notificar al resto de administradoras cuando se crea/elimina a una",
	'security_tools:settings:mails_admin_admins:description' => "Notificar al resto de administradoras cuando una habitante pasa a ser una de ellas u otra deja de serlo.",
	'security_tools:settings:mails_admin_user' => "Notificar a la habitante al crear/eliminar los permisos de administración",
	'security_tools:settings:mails_admin_user:description' => "Notificar a la habitante al crear/eliminar los permisos de administración",
	'security_tools:settings:mails_password_change' => "Notificar a la habitante cuando se cambie la contraseña",
	'security_tools:settings:mails_password_change:description' => "Notificar a la habitante cuando se cambie la contraseña desde la página de opciones",
	'security_tools:settings:mails_banned' => "Notificar a la habitante cuando se banea/desbanea",
	'security_tools:settings:mails_banned:description' => "Notificar a la habitante si ha sido baneada/debaneada por otra habitante.",
	'security_tools:settings:mails_verify_email_change' => "Verificar el cambio de dirección de correo",
	'security_tools:settings:mails_verify_email_change:description' => "Si la habitante cambia de correo, sea necesario que verifique en su nueva cuenta que realmente es suya. También recibirá un mensaje en su cuenta antigua para advertir que dejara de ser utilizada en cuanto se compruebe el proceso.",

	'security_tools:settings:other' => "Otros",
	'security_tools:settings:disable_autocomplete_on_password_fields' => "Desactivar el autocompletado en los campos de contraseña (recomendado!)",
	'security_tools:settings:disable_autocomplete_on_password_fields:description' => "Desactivar el autocompletado en los campos de contraseña (recomendado!). De ésta forma se evitará que queden en la caché de los navegadores utilizados por las habitantes.",

	// email change
	'security_tools:usersettings:email:request' => "Para completar el proceso de cambio de dirección de correo, revisa la bandeja de entrada en %s",
	'security_tools:email_change_confirmation:error:user' => "Tú no eres la habitante para la cual fue hecha ésta petición!",
	'security_tools:email_change_confirmation:error:request' => "No hay direcciones de correo pendientes de ser cambiadas",
	'security_tools:email_change_confirmation:error:code' => "El código de validación que has proporcionado es inválido. Revisa el correo que te hemos enviado",

	// admin notifications
	'security_tools:notify_admins:make_admin:subject' => "Hay una nueva administradora en la red %s",
	'security_tools:notify_admins:make_admin:message' => "Hola,

La habitante %s ha sido asignada como nueva administradora de la red por %s.
Puedes visitar el perfil de la nueva administradora en %s.

Si consideras que se trata de un error, entra aquí %s y deshaz la accción.",

	'security_tools:notify_admins:remove_admin:subject' => "Se ha quitado a una administradora de sus funciones en %s",
	'security_tools:notify_admins:remove_admin:message' => "Hola,

La habitante %s ya no será administradora por más tiempo. La acción ha sido llevada a cabo por %s.
Puedes visitar el perfil de la antigua administradora en %s.

Si consideras que se trata de un error, entra aquí %s y deshaz la accción.",

	// user notifications
	'security_tools:notify_user:make_admin:subject' => "Te han entregado permisos de administración en la red %s",
	'security_tools:notify_user:make_admin:message' => "Hola %s,

Has recibido permisos de administración por parte de %s.

Seguro que estás a la altura de la responsabilidad. Puedes comenzar desde aquí %s.

Si consideras que se trata de un error, contacta inmediatamente con las administradoras de la red",

	'security_tools:notify_user:remove_admin:subject' => "Te han quitado los permisos de administración en la red %s",
	'security_tools:notify_user:remove_admin:message' => "Hola %s,

Te han quitado los permisos de administración. La acción la ha llevado a cabo %s.

Si consideras que se trata de un error, contacta inmediatamente con las administradoras de la red",

	'security_tools:notify_user:password:subject' => "Tu contraseña ha sido cambiada",
	'security_tools:notify_user:password:message' => "Hola %s,

Tu contraseña para la red %s ha sido cambiada.

Sino querías que ésto sucediera o no has sido tú quien lo ha solicitado, ve directamente a %s y solicita una nueva contraseña. Después ponte en contacto con las administradoras, si lo consideras necesario.",

	'security_tools:notify_user:email_change_request:subject' => "Petición de cambio de dirección de correo para la red %s",
	'security_tools:notify_user:email_change_request:message' => "Hola %s,

Has realizado una petición para cambiar tu dirección de correo en la redn %s.

Para confirmarla, utiliza el siguiente enlace:
%s",

	'security_tools:notify_user:email_change:subject' => "Dirección de correo cambiada para %s",
	'security_tools:notify_user:email_change:message' => "Hola %s,

Tu dirección de correo electrónico para %s ha sido cambiada.

Sino querías que ésto sucediera o no has sido tú quien lo ha solicitado, ve directamente a %s y solicita una nueva contraseña. Después ponte en contacto con las administradoras, si lo consideras necesario.",

	'security_tools:notify_user:ban:subject' => "Te han baneado en %s",
	'security_tools:notify_user:ban:message' => "Hola %s,

Tu cuenta ha sido baneada de %s. A partir de ahora no podrás volver a utilizar la red con esa identidad.

Si consideras que se trata de un error, contacta inmediatamente con las administradoras de la red",

	'security_tools:notify_user:unban:subject' => "Te han quitado el ban de la red %s",
	'security_tools:notify_user:unban:message' => "Hola %s,

Tu identidad en la red %s ya no está baneada. Puedes volver a usarla de nuevo.
Para entrar: %s.

Si consideras que se trata de un error, contacta inmediatamente con las administradoras de la red",
	
);

add_translation("es", $spanish);

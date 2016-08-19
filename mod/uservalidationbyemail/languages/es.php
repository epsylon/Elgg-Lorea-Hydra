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

return array(
	'admin:users:unvalidated' => 'Sin validar',
	
	'email:validate:subject' => "%s por favor confirma tu dirección de email para %s!",
	'email:validate:body' => "%s,

Antes de comenzar a usar %s, debes confirmar tu dirección de email.

Por favor confirma tu registro a trav&eacute;s del siguiente enlace:

%s

Si no puedes hacer click en el enlace, copia y pega la URL en el navegador.

%s
%s
",
	'email:confirm:success' => "Has confirmado tu dirección de email!",
	'email:confirm:fail' => "Tu direcci&oacute;n de email no pudo ser verificada...",

	'uservalidationbyemail:emailsent' => "Correo electrónico enviado a <em> %s </em>",
	'uservalidationbyemail:registerok' => "Para activar tu cuenta, por favor confirma tu dirección de email a trav&eacute;s del enlace que se te ha enviado.",
	'uservalidationbyemail:login:fail' => "Tu cuenta no ha sido validada debido a intentos fallidos anteriores. Otra confirmación de dirección de email ha sido enviada.",

	'uservalidationbyemail:admin:no_unvalidated_users' => 'No hay habitantes sin validar.',

	'uservalidationbyemail:admin:unvalidated' => 'Sin validar',
	'uservalidationbyemail:admin:user_created' => '%s ha sido registrado',
	'uservalidationbyemail:admin:resend_validation' => 'Reeniar validaci&oacute;n',
	'uservalidationbyemail:admin:validate' => 'Validar',
	'uservalidationbyemail:confirm_validate_user' => '&iquest;Validar %s?',
	'uservalidationbyemail:confirm_resend_validation' => '&iquest;Reenviar confirmaci&oacute;n de email a %s?',
	'uservalidationbyemail:confirm_delete' => '&iquest;borrar %s?',
	'uservalidationbyemail:confirm_validate_checked' => '&iquest;Validar a las habitantes marcadas?',
	'uservalidationbyemail:confirm_resend_validation_checked' => '&iquest;Reenviar validaci&oacute;n a las habitantes marcadas?',
	'uservalidationbyemail:confirm_delete_checked' => '&iquest;Borrar a las habitantes marcadas?',
	
	'uservalidationbyemail:errors:unknown_users' => 'Uusarios desconocidos',
	'uservalidationbyemail:errors:could_not_validate_user' => 'No se pudo validar a la habitante.',
	'uservalidationbyemail:errors:could_not_validate_users' => 'No se pudieron validar a las habitantes marcadas.',
	'uservalidationbyemail:errors:could_not_delete_user' => 'No se pudo borrar a la habitante.',
	'uservalidationbyemail:errors:could_not_delete_users' => 'No se pudo borrar a las habitantes marcadas.',
	'uservalidationbyemail:errors:could_not_resend_validation' => 'No se pudo reenviar la confirmaci&oacute;n de validaci&oacute;n.',
	'uservalidationbyemail:errors:could_not_resend_validations' => 'No se pudo reenviar la confirmaci&oacute;n de validaci&oacute;n para las habitantes marcadas.',

	'uservalidationbyemail:messages:validated_user' => 'Habitante validada.',
	'uservalidationbyemail:messages:validated_users' => 'Todas las habitantes marcadas han sido validadas.',
	'uservalidationbyemail:messages:deleted_user' => 'Habitante borrada.',
	'uservalidationbyemail:messages:deleted_users' => 'Todas las habitantes marcadas han sido borradas.',
	'uservalidationbyemail:messages:resent_validation' => 'Solicitud de validaci&oacute;n reenviada.',
	'uservalidationbyemail:messages:resent_validations' => 'Solicitud de validaci&oacute;n reenviada a todas las habitantes marcadas.'

);

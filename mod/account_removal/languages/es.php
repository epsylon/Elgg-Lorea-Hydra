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

$language = array(
	'account_removal' => "Borrar cuenta",
	'account_removal:menu:title' => "Borrar cuenta",
	'account_removal:disable:default' => "La cuenta ha sido desactiva por petición de la habitante",
	'account_removal:admin:settings:user_options' => "Elige la opción disponible para borrar cuentas",
	'account_removal:admin:settings:user_options:disable' => "Desactivar",
	'account_removal:admin:settings:user_options:remove' => "Borrar",
	'account_removal:admin:settings:user_options:disable_and_remove' => "Desactivar y Borrar",
	'account_removal:admin:settings:groupadmins_allowed' => "Admins del grupo pueden desactivar-se/borrar-se",
	'account_removal:admin:settings:reason_required' => "Razón para borrar la cuenta requerida",
	'account_removal:user:error:admin' => "Admins no pueden desactivar-se/borrar-se",
	'account_removal:user:error:user' => "Solo tú puedes desactivarte/borrarte",
	'account_removal:user:error:no_user' => "Entrada inválida; No encontrado",
	'account_removal:user:title' => "Borrar cuenta",
	'account_removal:forms:user:user_options:description:disable' => "Puedes <b>desactivar</b> tu cuenta aquí. Estó hace que tu perfil sea desactivado, lo que significa que nadie podrá verlo, ni podrá ser listado.<br /><br />Todo tu contenido, como blogs, ficheros y páginas seguirán siendo accesible para el resto de habitantes",
	'account_removal:forms:user:user_options:description:remove' => "Puedes <b>borrar</b> tu cuenta aquí. Ésto hace que tu perfil sea totalemente borrado, lo que significa que nadie podrá verlo, ni podrá ser listado.<br /><br />Ademas, todo tu contenido, como blogs, ficheros y páginas será borrado definitivamente y de manera IRREVERSIBLE!",
	'account_removal:forms:user:user_options:description:disable_and_remove' => "Puedes <b>desactivar</b> o <b>borrar</b> tu cuenta aquí. Así desactivarás y borrarás tu perfil. Estó hace que tu perfil sea desactivado, lo que significa que nadie podrá verlo, ni podrá ser listado.<br /><br />Todo tu contenido, como blogs, ficheros y páginas será borrado definitivamente y de manera IRREVERSIBLE!",
	'account_removal:forms:user:user_options:description:general' => "<br />Cuando aceptes el borrado de cuenta recibirás un email de confirmación. La cuenta será borrada cuando completes las instrucciones de dicho email.",
	'account_removal:forms:user:user_options:disable' => "Desactivar la cuenta",
	'account_removal:forms:user:user_options:remove' => "Borrar la cuenta",
	'account_removal:forms:user:reason' => "Introduce una razón por la que cierras la cuenta",
	'account_removal:forms:user:required' => "Ésta información es requerida!",

	'account_removal:forms:user:js:error:reason' => "Necesitas explicar una razón",
	'account_removal:forms:user:js:confirm:disable' => "Seguro que quieres desactivar la identidad?",
	'account_removal:forms:user:js:confirm:remove' => "Seguro que quieres borrar la identidad?",

	'account_removal:forms:user:error:no_user' => "Entrada inválida!",
	'account_removal:forms:user:error:group_owner' => "No puedes desactivar o borrar tu cuenta ya que aún administras los siguientes grupos.",
	'account_removal:message:disable:subject' => "Has solicitado que se desactive tu cuenta en %s",
	'account_removal:message:disable:body' => "Estimada %s,
Has solicitado que se desactive tu identidad.
Todo el contenido que has creado en la red seguirá disponible para el resto de habitantes. Sin embargo, no podrás volver a entrar y tu identidad dejará de ser listada.

Para confirmar que deseas irte de nuestro lado, al menos un tiempo, sigue el enlace:
%s

Que la verdad siempre te acompañe!",
	
	'account_removal:message:remove:subject' => "Has solicitado que se borre tu cuenta en %s",
	'account_removal:message:remove:body' => "Estimada %s,
Has solicitado que se borre tu identidad.
Todo el contenido que has creado en la red será borrado inmediatamente.

Para confirmar que deseas destruirlo todo, sigue el enlace:
%s

Que la verdad siempre te acompañe!",
	'account_removal:message:thank_you:remove:subject' => "Gracias por usar %s",
	'account_removal:message:thank_you:remove:body' => "Estimada %s,
Te damos las gracias por utilizar %s. Esperemos que la experiencia te sirva.

Si en algún momento deseas volver, puedes crearte otra cuenta. Nuestra puerta siempre estará abierta a gente como tú.

Gracias de nuevo por todo.",
	
	'account_removal:message:thank_you:disable:subject' => "Gracias por usar %s",
	'account_removal:message:thank_you:disable:body' => "Estimada %s,
Te damos las gracias por utilizar %s. Esperemos que la experiencia te sirva.

Si en algún momento deseas volver, puedes crearte otra cuenta o pedir a alguna administradora que reactive tu cuenta. Nuestra puerta siempre estará abierta a gente como tú.

Gracias de nuevo por todo.",
	'account_removal:actions:remove:error:user_guid:admin' => "Las administradoras no puedes desactivarse o borrarse a sí mismas",
	'account_removal:actions:remove:error:user_guid:user' => "Solo puedes desactivar / borrar a ti mismo",
	'account_removal:actions:remove:error:user_guid:unknown' => "Entrada inválida!",
	'account_removal:actions:remove:error:group_owner' => "No puedes desactivar o borrar tu cuenta ya que aún administras los siguientes grupos",
	'account_removal:actions:remove:error:reason' => "Necesitas introducir una razón",
	'account_removal:actions:remove:error:type_match' => "El tipo de borrado de cuenta no está disponible",
	'account_removal:actions:remove:error:token_mismatch' => "El token de confirmación utilizado no coincide. Vuelve a realizar todo el proceso.",	
	'account_removal:actions:remove:success:remove' => "Tu identidad ha sido correctamente borrada",
	'account_removal:actions:remove:success:disable' => "Tu identidad ha sido correctamente desactivada",
	'account_removal:actions:remove:success:request' => "Tu petición ha sido enviada correctamente. Revisa el mensaje de confirmación que se ha enviado a tu cuenta de correo asociada a la identidad.",
	'' => "",
);

add_translation("es", $language);

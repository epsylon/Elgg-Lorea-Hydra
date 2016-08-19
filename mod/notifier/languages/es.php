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
	'notifier:' => '',
	'notifier:notification' => 'Notificación',
	'notifier:notifications' => 'Notificación',
	'notifier:view:all' => 'Ver todas las notificaciones',
	'notifier:all' => 'Todas las notificaciones',
	'notifier:none' => 'Sin notificaciones',
	'notifier:unreadcount' => 'Notificaciones pendientes (%s)',
	'notification:method:notifier' => 'Notificador',
	'notifier:dismiss_all' => 'Descartar todas',
	'notifier:clear_all' => 'Limpiar todas',
	'notifier:deleteconfirm' => 'Ésto borra todas las notificaciones, incluídas aquellas que no han sido leídas aún. Seguro que quieres continuar?',

	'item:object:notification' => 'Objetos del notificador',

	// System messages
	'notifier:message:dismissed_all' => 'Todas las notificaciones han sido descartadas correctamente',
	'notifier:message:deleted_all' => 'Se han limpiado todas las notificaciones',
	'notifier:message:deleted' => 'La notificación se ha borrado correctamente',

	// Error messages
	'notifier:error:not_found' => 'No se encuentra ésta notificación',
	'notifier:error:target_not_found' => 'No se encuentra el contenido así que es probable que haya sido borrado.',
	'notifier:error:cannot_delete' => 'No es posible borrar la notificación',

	// River strings that are not available in Elgg core
	'river:comment:object:groupforumtopic' => '%s ha respondido en la discusión titulada %s',
	'river:mention:object:comment' => '%s te ha mencionado en %s',

	// This is used to create messages like "Lisa and George like your post"
	'notifier:two_subjects' => '%s y %s',
	// This is used to create messages like "Lisa and 5 others like your post"
	'notifier:multiple_subjects' => '%s y %s otras habitantes',

	// Likes plugin
	'likes:notifications:summary' => '%s se interesado por tu entrada %s',
	'likes:notifications:summary:2' => '%s y %s se han interesado por tu entrada %s',
	'likes:notifications:summary:n' => '%s se ha interesado por tu entrada %s',

	// Friends
	'friend:notifications:summary' => '%s se ha hecho contacto tuyo',
	'friend:notifications:summary:2' => '%s y %s se han hecho contactos tuyos',
	'friend:notifications:summary:n' => '%s se ha hecho contacto tuyo',

	// Comments
	'comment:notifications:summary' => '%s comentó en %s',
	'comment:notifications:summary:2' => '%s y %s comentarion en %s',
	'comment:notifications:summary:n' => '%s ha comentado en %s',

	// Groups
	'groups:notifications:invitation' => '%s te ha invitado al grupo %s',
	'groups:notifications:invitation:hidden' => 'Tienes una noticia %s de %s',
	'groups:notifications:membership_request' => '%s te ha pedido que participes en el grupo %s',
	'groups:invitation' => 'invitación de grupo',

	// Plugin settings
	'notifier:settings:desc' => 'Notificaciones por defecto para las habitantes nuevas?',
	'notifier:settings:enable_personal' => 'Notificaciones personales',
	'notifier:settings:enable_personal:desc' => "Se añade una notificación cuando sucede alguna acción (comentar, interesarse, etc).",
	'notifier:settings:enable_collections' => 'Contactos',
	'notifier:settings:enable_collections:desc' => "Se añade una notificación cuando un contacto realiza un contenido nuevo.",
	'notifier:settings:groups:desc' => 'Notificaciones por defecto para quienes participan por primera vez en un grupo',
	'notifier:settings:enable_groups' => 'Notificaciones de grupo',
	'notifier:settings:enable_groups:desc' => 'Se añade una notificación cuando se produce un contenido nuevo en un grupo en el que la habitante participa.',
);

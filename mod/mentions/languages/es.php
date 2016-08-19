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
	'mentions:notification:subject' => '%s te ha mencionado en %s',
	'mentions:notification:body' => '%s te ha mencionado en %s.

Para ver la entrada completa, haz click en el siguiente enlace:
%s
',
	'mentions:notification_types:object:blog' => 'una entrada de blog',
	'mentions:notification_types:object:bookmarks' => 'un marcador',
	'mentions:notification_types:object:groupforumtopic' => 'en una discusión de grupo',
	'mentions:notification_types:object:discussion_reply' => 'en la respuesta a una discusión',
	'mentions:notification_types:object:thewire' => 'en un cable',
	'mentions:notification_types:object:comment' => 'en un comentario',
	'mentions:settings:send_notification' => 'Enviarte una notificación cuando alguien te menciona (@tu_usuaria) en una entrada?',

	// admin
	'mentions:fancy_links' => 'Remplazar @menciones con una pequeña imagen del perfil de habitante',

	'mentions:settings:failed' => 'No es posible salvar la configuración de menciones.'
);

add_translation("es", $spanish);

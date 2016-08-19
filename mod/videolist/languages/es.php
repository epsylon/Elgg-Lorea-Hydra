
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

	/**
	 * Menu items and titles
	 */

	'videolist' => "Vídeos",
	'videolist:owner' => "Vídeos de %s",
        'videolist:video_name' => 'Título',
	'videolist:friends' => "Vídeos de contactos",
	'videolist:all' => "Todos los vídeos",
	'videolist:add' => "Añadir un vídeo",
	'videolist:group' => "Vídeos del grupo",
	'groups:enablevideolist' => 'Vídeos',
	'videolist:edit' => "Editar éste vídeo",
	'videolist:delete' => "Borrar éste vídeo",
	'videolist:new' => "Añadir un vídeo",
	'videolist:notification' =>
'%s ha añadido un nuevo vídeo:

%s
%s

Sigue el enlace para ver y comentar:
%s
',
	'videolist:delete:confirm' => 'Seguro que deseas borrar el vídeo?',
	'item:object:videolist_item' => 'Vídeos',
	'videolist:nogroup' => 'El grupo no tiene vídeos, de momento...',
	'videolist:more' => 'Más vídeos',
	'videolist:none' => 'No se han publicado vídeos, de momento...',

	/**
	* River
	**/

	'river:create:object:videolist_item' => '%s ha enlazado el vídeo %s',
	'river:update:object:videolist_item' => '%s ha actualizado el vídeo %s',
	'river:comment:object:videolist_item' => '%s ha comentado en el vídeo %s',

	/**
	 * Form fields
	 */

	'videolist:title' => 'Título',
	'videolist:description' => 'Descripción',
	'videolist:video_url' => 'URL del video (Vimeo o Youtube)',
	'videolist:access_id' => 'Quién puede ver el vídeo?',
	'videolist:tags' => 'Añadir etiquetas',

	/**
	 * Status and error messages
	 */
	'videolist:error:no_save' => 'Ha ocurrido un error al salvar el vídeo, intenta de nuevo',
	'videolist:saved' => 'El vídeo se ha enlazado correctamente!',
	'videolist:deleted' => 'El vídeo se ha borrado correctamente!',
	'videolist:deletefailed' => 'El vídeo no puede ser borrado, intenta de nuevo',
        'videolist:error:invalid_url' => 'La fuente del video no está soportada',  

	/**
	 * Widget
	 **/

	'videolist:num_videos' => 'Número de vídeos a mostrar',
	'videolist:widget:description' => 'Tu lista personal de vídeos',
	
);

add_translation("es", $spanish);

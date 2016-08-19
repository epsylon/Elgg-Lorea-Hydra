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
        'favourites:groups' => 'Grupos favoritos',
        'favourites:users' => 'Habitantes favoritas',
        'favourites:menu' => 'Favoritos',
        'favourites:items' => 'Todos los favoritos',
	'favourites:this' => 'marcar ésto como favorito',
	'favourites:deleted' => 'Tu marca de favorito ha sido borrada',
	'favourites:see' => 'Ver quienes han marcado ésto como favorito',
	'favourites:remove' => 'Borrar marcado como favorito',
	'favourites:notdeleted' => 'Ha habido un problema borrando el favorito. Intente de nuevo',
	'favourites:added' => 'Marcado como favorito',
	'favourites:failure' => 'Ha habido un problema marcando la entidad como favorita',
	'favourites:alreadyfavourite' => 'Ya has marcado ésto como favorito!',
	'favourites:notfound' => 'La entidad que tratas de marcar como favorita no puede ser encontrada',
	'favourites:markthis' => 'Marcar ésto como favorito',
	'favourites:usermarkedthis' => '%s lo ha marcado como favorito',
	'favourites:usersmarkedthis' => '%s lo han marcado como favorito',
	'favourites:river:annotate' => 'marcado como favorito',
	'favourites:delete:confirm' => 'Seguro que quieres borrar éste favorito?',

	'river:favourites' => 'marcado como favorito %s %s',

	'favourites:notifications:subject' => '%s ha marcado "%s como favorito"',
	'favourites:notifications:body' =>
'Hola %1$s,

%2$s marc&oacute; "%3$s" como favorito en %4$s

Ver la entrada original en:
%5$s

O ver el perfil de %2$s en:
%6$s

',
	'favourites:allowed_object_subtypes_label' => 'Lista de objetos separados por coma de subtipos permitidos para ser marcados como favoritos (dejar en blanco para permitir favoritos en todos los lugares posibles: ',
);

add_translation('es', $spanish);

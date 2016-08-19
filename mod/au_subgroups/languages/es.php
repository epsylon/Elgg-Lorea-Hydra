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
    'au_subgroups' => "Sub-Grupos",
    'au_subgroups:subgroup' => "Sub-Grupo",
    'au_subgroups:subgroups' => "Sub-Grupos",
    'au_subgroups:parent' => "Grupo creador",
    'au_subgroups:add:subgroup' => 'Crear un Sub-Grupo',
    'au_subgroups:nogroups' => 'No se han creado Sub-Grupos',
    'au_subgroups:needjoinparent' => 'Ésto es un sub-grupo, necesitas entrar en el grupo principal antes para poder llegar a él',
    'au_subgroups:error:notparentmember' => "Las habitantes no pueden entrar en un sub-grupo sino son participantes del grupo creador",
    'au_subtypes:error:create:disabled' => "La creación de sub-grupos ha sido desactivada para éste grupo",
    'au_subgroups:noedit' => "No se puede editar el grupo",
    'au_subgroups:subgroups:delete' => "Borrar grupo",
    'au_subgroups:delete:label' => "Que debería suceder con el contenido de éste grupo? Cualquier opción seleccionada será aplicada al resto de sub-grupos que serán borrados.",
    'au_subgroups:deleteoption:delete' => 'Borrar todo el contenido del grupo',
    'au_subgroups:deleteoption:owner' => 'Transferir todo el contenido a sus creadoras originales',
    'au_subgroups:deleteoption:parent' => 'Transferir todo el contenido al grupo creador',
    'au_subgroups:subgroup:of' => "Sub-Grupo de %s",
    'au_subgroups:setting:display_alphabetically' => "Mostrar los grupos personales de forma alfabética?",
    'au_subgroups:setting:display_subgroups' => 'Mostrar los sub-grupos en la lista estandar de grupos?',
    'au_subgroups:setting:display_featured' => 'Mostrar los grupos destacados en el listado personal de grupos?',
    'au_subgroups:error:invite' => "La acción ha sido cancelada. Las siguientes habitantes no participan en el grupo creador y por tanto no pueden ser añadidas/invitadas.",
    'au_subgroups:option:parent:members' => "Participantes en el grupo creador",
    'au_subgroups:subgroups:more' => "Ver todos los Sub-Grupos",
    'group:setmanager' => "Seleccionar como gestora",
    'group:removemanager' => "Quitar de gestora",
    'au_subgroups:group:enable' => "Sub-Grupos",
    'au_subgroups:group:memberspermissions' => "Sub-Grupos: Cualquier participante puede crear sub-grupos? (Sino solo podrán las admin del grupo)",
    'au_subgroups:widget:order' => 'Ordenar resultados por',
    'au_subgroups:option:default' => 'Tiempo de creación',
    'au_subgroups:option:alpha' => 'Alfabético',
    'au_subgroups:widget:numdisplay' => 'Número de sub-grupos a mostrar',
    'au_subgroups:widget:description' => 'Listar sub-grupos para éste grupo',
    'au_subgroups:move:edit:title' => "Hacer éste grupo un sub-grupo de otro grupo",
    'au_subgroups:transfer:help' => "Puedes hacer que éste grupo sea un sub-grupo de otro grupo siempre y cuando tengar los permisos suficientes. Si las habitantes no participan en el nuevo grupo, serán eliminados de éste grupo y recibirán una invitación para que se unan al nuevo grupo creados y a todos los sub-grupos que le correspondan. <b>Ésto transferirá cualquier sub-grupo de éste grupo</b>",
    'au_subgroups:search:text' => "Buscar grupos",
    'au_subgroups:search:noresults' => "No se han encontrado grupos",
    'au_subgroups:error:timeout' => "Tiempo de búsqueda terminado",
    'au_subgroups:error:generic' => "Ha ocurrido un error durante la búsqueda",
    'au_subgroups:move:confirm' => "Seguro que quieres hacer que ésto sea un sub-grupo de otro grupo?",
    'au_subgroups:error:permissions' => "Deberías de editar los permisos del sub-grupo por cada grupo creador que lo sostiene. Además, tampoco puedes mover un grupo a un sub-grupo de sí mismo.",
    'au_subgroups:move:success' => "El grupo se ha movido correctamente",
    'au_subgroups:noparent' => 'Configurar sin creadora',
    'au_subgroups:error:invalid:group' => "Identificador de grupo inválida",
    'au_subgroups:invite:body' => "Hola %s,

El grupo %s ha sudo movido como sub-grupo del grupo %s.
Como no participas en el nuevo grupo, te enviamos una invitación para que re-entres al grupo. Aceptando la invitación el resto se configurará de manera automática.

Click debajo para ver tus invitaciones:

%s",

);
					
add_translation("es",$spanish);

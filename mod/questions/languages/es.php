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

return [
	'answers' => ' con respuestas',
	'answers:addyours' => 'Añade tu respuesta',
	
	/**
	 * General stuff
	 */
	'item:object:answer' => "Respuestas",
	'item:object:question' => "Preguntas",
	
	/**
	 * Menu items
	 */
	'questions:menu:user_hover:make_expert' => "Declarar persona entendida",
	'questions:menu:user_hover:make_expert:confirm' => "Seguro que deseas declarar a ésta habitante como persona entendida en %s?",
	'questions:menu:user_hover:remove_expert' => "Borrar como persona entendida",
	'questions:menu:user_hover:remove_expert:confirm' => "Seguro que deseas borrar a ésta habitante como persona entendida en %s?",
	
	'questions:menu:entity:answer:mark' => "Parece la respuesta correcta",
	'questions:menu:entity:answer:unmark' => "No parece una respuesta muy acertada",

	'questions:menu:filter:todo' => "A contestar",
	'questions:menu:filter:todo_group' => "Preguntas al grupo",
	'questions:menu:filter:experts' => "Entendidas",
	
	'river:create:object:question' => '%s ha planteado la pregunta %s',
	'river:create:object:answer' => '%s ha escrito una posible respuesta a la pregunta %s',
		
	'questions' => 'Preguntas',
	'questions:asked' => 'Hecha por %s',
	'questions:answered' => 'Última respuesta de %s %s',
	'questions:answered:correct' => 'La respuesta que más se aproxima la ha escrito %s %s',

	'questions:everyone' => 'Todas las preguntas',
	'questions:add' => 'Plantear una pregunta',
	'questions:todo' => 'A contestar',
	'questions:todo:none' => 'No hay nada que contestar. Así da gusto, chica!',
	'questions:owner' => "Preguntas de %s",
	'questions:none' => "No se han planteado cuestiones, de momento...",
	'questions:group' => 'Preguntas al grupo',
	'questions:enable' => 'Preguntas',

	'questions:edit:question:title' => 'Pregunta',
	'questions:edit:question:description' => "Detalles",
	'questions:edit:question:container' => "Dónde debería mostrarse ésta pregunta?",
	'questions:edit:question:container:select' => "Selecciona un grupo",
	'questions:edit:question:move_to_discussions' => "Mover a discusiones",
	'questions:edit:question:move_to_discussions:confirm' => "Seguro que quieres llevarte la pregunta a una discusión?. Luego no hay marcha atrás!",
	
	'questions:object:answer:title' => "Responde a la pregunta %s",
	
	/**
	 * experts page
	 */
	'questions:experts:title' => "Entendidas",
	'questions:experts:none' => "No se han asignado entendidas para %s, de momento...",
	'questions:experts:description:group' => "Debajo tienes una lista de habitantes que pueden ayudarte con tus cuestiones en %s.",
	'questions:experts:description:site' => "Debajo tienes una lista de habitantes que pueden ayudarte con tus cuestiones en Irkä.",
	
	/**
	 * notifications
	 */
	'questions:notifications:create:subject' => "Se ha planteado una nueva cuestión",
	'questions:notifications:create:summary' => "Se ha planteado una nueva cuestión",
	'questions:notifications:create:message' => "Hola %s

Se ha planteado la cuestión que lleva como título: %s 

Si quieres responder, visita:
%s",
	'questions:notifications:move:subject' => "Una pregunta se ha movido de lugar",
	'questions:notifications:move:summary' => "Una pregunta se ha movido de lugar",
	'questions:notifications:move:message' => "Hola %s

La pregunta: %s se ha movido de lugar, así que para poder seguir participando en ella, haz click en el siguiente enlace:
%s",
	
	'questions:notifications:answer:create:subject' => "Alguien ha escrito una nueva respuesta a la pregunta %s",
	'questions:notifications:answer:create:summary' => "Alguien ha escrito una nueva respuesta a la pregunta %s",
	'questions:notifications:answer:create:message' => "Hola %s

%s ha escrito una respuesta en la pregunta '%s'.

%s

Para visitar la respuesta, haz click en el siguiente enlace:
%s",
	'questions:notifications:answer:correct:subject' => "Una respuesta se ha marcado como la más aproximada para %s",
	'questions:notifications:answer:correct:summary' => "Una respuesta se ha marcado como la más aproximada para %s",
	'questions:notifications:answer:correct:message' => "Hola %s

%s considera que la respuesta que más se aproxima a la pregunta es '%s'.

%s

Para visitar la respuesta, haz click en el siguiente enlace:
%s",
	'questions:notifications:answer:comment:subject' => "Alguien ha dejado un comentario en la respuesta",
	'questions:notifications:answer:comment:summary' => "Alguien ha dejado un comentario en la respuesta",
	'questions:notifications:answer:comment:message' => "Hola %s

%s ha dejado un comentario en una respuesta de la pregunta '%s'.

%s

Para ver el comentario, haz click en el siguiente enlace:
%s",
	
	'questions:daily:notification:subject' => "Repaso de las cuestiones diarias",
	'questions:daily:notification:message:more' => "Ver más",
	'questions:daily:notification:message:overdue' => "Las siguientes cuestiones no se han respondido a tiempo!",
	'questions:daily:notification:message:due' => "Las siguientes cuestiones deberían ser resueltas... HOY!",
	'questions:daily:notification:message:new' => "Nuevas preguntas realizadas",
	/**
	 * answers
	 */
	'questions:answer:edit' => "Actualizar respuesta",
	'questions:answer:checkmark:title' => "%s ha marcado ésta como la respuesta que más se aproxima a la pregunta %s",
	
	'questions:search:answer:title' => "Respuesta",
	
	/**
	 * plugin settings
	 */
	'questions:settings:general:title' => "Opciones generales",
	'questions:settings:general:close' => "Cerrar la pregunta cuando se reciba una respuesta y se marque como correcta",
	'questions:settings:general:close:description' => "Cerrar la pregunta cuando se reciba una respuesta y se marque como correcta. A partir de ese instante no se permitirán más respuestas",
	'questions:settings:general:solution_time' => "Seleccionar una solución por defecto dentro de varios días",
	'questions:settings:general:solution_time:description' => "Las respuestas deberían solventarse antes de que se termine el tiempo establecido. Introduce 0 para no tener límite de tiempo en responder.",
	'questions:settings:general:solution_time_group' => "Las creadoras del grupo pueden cambar las opciones de tiempo para contestar a las preguntas, por defecto",
	'questions:settings:general:solution_time_group:description' => "Si no está permitio, los grupos usarán las opciones de tiempo de respuesta a las preguntas, tal y como se muestran a continuación.",
	'questions:settings:general:limit_to_groups' => "Limitar las preguntas al grupo solo al contexto del mismo",
	'questions:settings:general:limit_to_groups:description' => "Si se selecciona 'si', la preguntas no podrán realizarse utilizando un contexto personal/individual.",
	
	'questions:settings:experts:title' => "Opciones de entendidas",
	'questions:settings:experts:enable' => "Activar roles de entendidas",
	'questions:settings:experts:enable:description' => "Las entendidas puedes ser asignadas por las administradoras de la red y por las creadoras de los grupos.",
	'questions:settings:experts:answer' => "Solo las entendidas puedes responder a la pregunta",
	'questions:settings:experts:mark' => "Solo las entendidas pueden marcar una respuesta como correcta",
	
	'questions:settings:access:title' => "Opciones de acceso",
	'questions:settings:access:personal' => "Cuál será el nivel de acceso personal para las preguntas?",
	'questions:settings:access:group' => "Cuál será el nivel de acceso del grupo para las preguntas?",
	'questions:settings:access:options:user' => "Definido por habitante",
	'questions:settings:access:options:group' => "Participantes del grupo",
	
	/**
	 * group settings
	 */
	'questions:group_settings:title' => "Opciones de preguntas",
	
	'questions:group_settings:solution_time:description' => "La preguntas deberán ser respondidas antes de una fecha establecido. Introducir 0 para no tener límite de tiempo.",
	
	'questions:group_settings:who_can_ask' => "Quién puede responder preguntas en éste grupo?",
	'questions:group_settings:who_can_ask:members' => "Todas las participantes",
	'questions:group_settings:who_can_ask:experts' => "Solo las entendidas",
	
	'questions:group_settings:who_can_answer' => "Quién puede plantear respuestas en éste grupo?",
	'questions:group_settings:who_can_answer:experts_only' => "Solo las entendidas pueden responder a cuestiones en éste grupo.",
	
	'questions:group_settings:auto_mark_correct' => "Cuando una entendidas realice una respuesta, marcarla automáticamente como una respuesta que más se aproxima",
	
	/**
	 * Widgets
	 */

	'widget:questions:title' => "Preguntas",
	'widget:questions:description' => "Mostrar preguntas que has planteado.",
	'widget:questions:content_type' => "Qué preguntas quieres mostrar?",
		
	/**
	 * Actions
	 */
	
	'questions:action:answer:save:error:container' => "No tienes permisos suficientes para responder a esa pregunta!",
	'questions:action:answer:save:error:body' => "Necesitas un texto para: %s, %s",
	'questions:action:answer:save:error:save' => "Ha ocurrido un error al savlar la respuesta",
	'questions:action:answer:save:error:question_closed' => "La pregunta a la que tratas de contestar ha sido cerrada",
	
	'questions:action:answer:toggle_mark:error:not_allowed' => "No tienes permisos suficientes parar marcar una respuesta como la que más se aproxima!",
	'questions:action:answer:toggle_mark:error:duplicate' => "Ésta ya es considerada una respuesta correcta para esa pregunta!",
	'questions:action:answer:toggle_mark:success:mark' => "La respuesta se ha marcado como la que más se aproxima",
	'questions:action:answer:toggle_mark:success:unmark' => "La respuesta ya no es considerada una de las que más se aproximan",
	
	'questions:action:question:save:error:container' => "No tienes permisos suficientes para hacer preguntas aquí!",
	'questions:action:question:save:error:body' => "Necesitas un título y una descripción en: %s, %s",
	'questions:action:question:save:error:save' => "Ha ocurrido un error al salvar tu pregunta",
	'questions:action:question:save:error:limited_to_groups' => "Las preguntas se limitan a los grupos. Selecciona uno.",
	
	'questions:action:question:move_to_discussions:error:move' => "No tienes permisos suficientes para llevarte una pregunta a una discusión",
	'questions:action:question:move_to_discussions:error:topic' => "Ha habido un error al crear el título de la discusión, refresca y prueba de nuevo",
	'questions:action:question:move_to_discussions:success' => "La pregunta se ha llevado a una discusión. Ésto se pone interesante!",
	
	'questions:action:toggle_expert:success:make' => "a partir de ahora se considera a %s una entendida en %s",
	'questions:action:toggle_expert:success:remove' => "%s ya no será entendida a partir de ahora en %s",
	
	'questions:action:group_settings:success' => "Las opciones del grupo han sido salvadas",
];

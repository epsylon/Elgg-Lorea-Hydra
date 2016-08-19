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
	
			'poll' => "Encuesta",
            		'polls:add' => "Nueva encuesta",
			'polls' => "Encuestas",
			'polls:votes' => "votos",
			'polls:user' => "Encuestas de %s",
			'polls:group_polls' => "Encuestas del grupo",
			'polls:group_polls:listing:title' => "Encuestas de %s",
			'polls:user:friends' => "Encuestas de los contactos de %s",
			'polls:your' => "Tus encuestas",
			'polls:not_me' => "Encuestas de %s",
			'polls:posttitle' => "Encuestas de %s: %s",
			'polls:friends' => "Encuestas de contactos",
			'polls:not_me_friends' => "Encuestas de los contactos de %s",
			'polls:yourfriends' => "Últimas encuestas de tus contactos",
			'polls:everyone' => "Todas las encuestas de la red",
			'polls:read' => "Leer encuestas",
			'polls:addpost' => "Crear una encuesta",
			'polls:editpost' => "Editar una encuesta: %s",
			'polls:edit' => "Editar una una encuesta",
			'polls:text' => "Texto de la encuesta",
			'polls:strapline' => "%s",			
			'item:object:poll' => 'Todas las encuestas',
			'item:object:poll_choice' => "Opciones de la encuesta",
			'polls:question' => "Pregunta de la encuesta",
			'polls:responses' => "Posibles respuestas a elegir (máx 10)",
			'polls:results' => "[+] Ver los resultados",
			'polls:show_results' => "Ver resultados",
			'polls:show_poll' => "Mostrar encuesta",
			'polls:add_choice' => "Añadir opción",
			'polls:delete_choice' => "Borrar ésta opción",
			'polls:settings:group:title' => "Encuestas de grupo",
			'polls:settings:group_polls_default' => "si, activado por defecto",
			'polls:settings:group_polls_not_default' => "si, apagado por defecto",
			'polls:settings:no' => "no",
			'polls:settings:group_profile_display:title' => "Si las encuestas de grupo están activadas, donde debería mostrare el contenido de las mismas en el perfil del grupo?",
			'polls:settings:group_profile_display_option:left' => "izquierda",
			'polls:settings:group_profile_display_option:right' => "derecha",
			'polls:settings:group_profile_display_option:none' => "ninguno",
			'polls:settings:group_access:title' => "Si las encuestas de grupo están activadas, quien puede crearlas?",
			'polls:settings:group_access:admins' => "solo creadoras del grupo y admins",
			'polls:settings:group_access:members' => "cualquier participante del grupo",
			'polls:settings:front_page:title' => "Admins pueden crear una encuesta en la página principal (requiere soporte del tema)",
			'polls:none' => "No hay encuestas propuestas, de momento...",
			'polls:permission_error' => "No tienes permisos suficientes para editar la encuesta.",
			'polls:vote' => "Votar",
			'polls:login' => "Tienes que entrar en la red para poder votar en ésta encuesta.",
			'group:polls:empty' => "No hay encuestas",
			'polls:settings:site_access:title' => "Quién puede crear encuestas en la red?",
			'polls:settings:site_access:admins' => "solo admins",
			'polls:settings:site_access:all' => "cualquier habitante",
			'polls:can_not_create' => "No tienes permisos para crear encuestas.",
			'polls:front_page_label' => "Posicionar ésta encuesta en la página principal.",
		/**
	     * poll widget
	     **/
			'polls:latest_widget_title' => "Últimas encuestas",
			'polls:latest_widget_description' => "Mostrar las encuestas más recientes.",
			'polls:my_widget_title' => "Mis encuestas",
			'polls:my_widget_description' => "Mostrar tus últimas encuestas",
			'polls:widget:label:displaynum' => "Cuántas encuestas quieres mostrar?",
			'polls:individual' => "Encuestas del grupo",
			'poll_individual_group:widget:description' => "Mostrar la última encuesta de un grupo",
			'poll_individual:widget:description' => "Mostrar tu última encuesta",
			'polls:widget:no_polls' => "No hay encuestas para %s, de momento...",
			'polls:widget:nonefound' => "No hay encuestas.",
			'polls:widget:think' => "Permitir a %s saber lo que piensas",
			'polls:enable_polls' => "Encuestas",
			'polls:group_identifier' => "(en %s)",
			'polls:noun_response' => "respuesta",
			'polls:noun_responses' => "respuestas",
		        'polls:settings:yes' => "si",
			'polls:settings:no' => "no",

			// notifications
			'polls:notify:summary' => 'Nueva encuesta creada: %s',
			'polls:notification' =>
'
%s ha creado una encuesta.

%s

Para ver y votar en la encuesta, usa el siguiente link:
%s

Nos respondas al mensaje, soy un bot ;-)
',
			
         /**
	     * poll river
	     **/
	        'polls:settings:create_in_river:title' => "Mostrar la creación de encuestas en la actividad del river",
			'polls:settings:vote_in_river:title' => "Mostrar votaciones en la actividad del river",
			'polls:settings:send_notification:title' => "Enviar notificación cuando se crea una encuesta",
			'river:create:object:poll' => '%s ha creado la encuesta %s',
			'river:vote:object:poll' => '%s ha votado en la encuesta %s',
			'river:comment:object:poll' => '%s ha comentado en la encuesta %s',
		/**
		 * Status messages
		 */
	
			'polls:added' => "La encuesta ha sido creada.",
			'polls:edited' => "La encuesta ha sido salvada.",
			'polls:responded' => "Tu voto ha sido añadido.",
			'polls:deleted' => "La encuesta ha sido borrada con éxito.",
			'polls:totalvotes' => "Número total de votos: ",
			'polls:voted' => "Tu voto ha sido añadido a la encuesta.",
			
	
		/**
		 * Error messages
		 */
	
			'polls:save:failure' => "La encuesta no ha sido salvada. Intenta de nuevo.",
			'polls:blank' => "Necesitas rellenar ambas, las preguntas y las respuestas, para que la encuesta pueda ser utilizada.",
			'polls:novote' => "Tienes que elegir una opción de las propuestas para poder votar.",
			'polls:notfound' => "No encontramos las encuesta que buscas.",
			'polls:nonefound' => "No se han encontrado encuestas para %s",
			'polls:notdeleted' => "No podemos borrar la encuesta. Intenta de nuevo."
	);
					
	add_translation("es",$spanish);

?>

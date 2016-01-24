<?php

return array(

	/**
	 * Menu items and titles
	 */
	'poll' => "Encuestas",
	'poll:add' => "Nueva Encuesta",
	'poll:group_poll' => "Encuestas del grupo",
	'poll:group_poll:listing:title' => "Encuestas de %s",
	'poll:your' => "Tus encuestas",
	'poll:not_me' => "Encuestas de %s",
	'poll:friends' => "Encuestas cercanas",
	'poll:addpost' => "Crear encuesta",
	'poll:editpost' => "Editar encuesta: %s",
	'poll:edit' => "Editar encuesta",
	'item:object:poll' => 'Encuestas',
	'item:object:poll_choice' => "Opciones de la encuesta",
	'poll:question' => "Pregunta de la encuesta",
	'poll:description' => "Descripci&oacute;n (opcional)",
	'poll:responses' => "Opciones de voto",
	'poll:result:label' => "%s (%s)",
	'poll:show_results' => "Ver resultados",
	'poll:show_poll' => "Ver encuesta",
	'poll:add_choice' => "A&ntilde;adir opci&oacute;n de voto",
	'poll:delete_choice' => "Borra &eacute;sta opci&oacute;n",
	'poll:close_date' => "D&iacute;a de cierre de la encuesta (opcional)",
	'poll:voting_ended' => "La votaci&oacute;n termina el %s.",
	'poll:poll_closing_date' => "(Fecha de cierre de la encuesta: %s)",

	'poll:convert:description' => 'Atenci&oacute;n: ya hay encuestas que tienen la misma estructura de votaci&oacute;n que has propuesto.',
	'poll:convert' => 'Actualizar las encuestas existentes ahora',
	'poll:convert:confirm' => 'La actualizaci&oacute;n es irreversible. Seguro que quieres modificarla?',

	'poll:settings:group:title' => "Permitir encuestas de grupo?",
	'poll:settings:group_poll_default' => "si, activado por defecto",
	'poll:settings:group_poll_not_default' => "si, desactivado por defecto",
	'poll:settings:no' => "no",
	'poll:settings:group_access:title' => "Si las encuestas del grupo est&aacute;n activadas, quien puede crearlas?",
	'poll:settings:group_access:admins' => "solo propiestarios del grupo y administradores",
	'poll:settings:group_access:members' => "cualquier miembro del grupo",
	'poll:settings:front_page:title' => "Admins can make a single poll at a time the site's \"Encuesta of the day\"? (Widget Manager plugin required for adding the corresponding widget to the index page)",
	'poll:settings:allow_close_date:title' => "Allow setting a closing date for polls? (afterwards the results can still be viewed but voting is no longer permitted)",
	'poll:settings:allow_open_poll:title' => "Allow open polls? (open polls show which user voted for which poll choice; if this option is enabled, admins can see who voted what on any polls)",
	'poll:none' => "No se han encontrado encuestas.",
	'poll:permission_error' => "No tienes permiso para editar &eacute;sta encuesta.",
	'poll:vote' => "Vota",
	'poll:login' => "Necesitas entrar en la red para votar en la encuesta.",
	'group:poll:empty' => "No hay encuestas",
	'poll:settings:site_access:title' => "Quien puede crear encuestas en el sitio?",
	'poll:settings:site_access:admins' => "admins only",
	'poll:settings:site_access:all' => "any logged-in user",
	'poll:can_not_create' => "No tienes permiso para crear encuestas.",
	'poll:front_page_label' => "Hacer de &eacute;sta encuesta la \"Encuesta del d&iacute;a\"",
	'poll:open_poll_label' => "Ver en los resultados quienes han votado y que opci&oacute;n han votado (encuesta abierta)",
	'poll:show_voters' => "Ver quienes han votado",

	/**
	 * Encuesta widget
	 **/
	'poll:latest_widget_title' => "&Uacute;ltimas encuestas",
	'poll:latest_widget_description' => "Mostrar las encuestas m&aacute;s recientes.",
	'poll:latestgroup_widget_title' => "&Uacute;ltimas encuestas del grupo",
	'poll:latestgroup_widget_description' => "Mostrar las encuestas m&aacute;s recientes del grupo.",
	'poll:my_widget_title' => "Mis encuestas",
	'poll:my_widget_description' => "&Eacute;ste widget mostrar&aacute; tus encuestas.",
	'poll:widget:label:displaynum' => "Cu&aacute;ntas encuestas quieres mostrar?",
	'poll:individual' => "Encuesta del d&iacute;a",
	'poll_individual:widget:description' => "Mostrar la \"Encuesta del d&iacute;a\".",
	'poll:widget:no_poll' => "No hay encuestas de %s todav&iacute;a.",
	'poll:widget:nonefound' => "No se han encontrado encuestas.",
	'poll:widget:think' => "Haz saber a %s lo que piensas!",
	'poll:enable_poll' => "Activar encuestas",
	'poll:noun_response' => "votar",
	'poll:noun_responses' => "votos",
	'poll:settings:yes' => "si",
	'poll:settings:no' => "no",

	'poll:month:01' => 'Enero',
	'poll:month:02' => 'Febrero',
	'poll:month:03' => 'Marzo',
	'poll:month:04' => 'Abril',
	'poll:month:05' => 'Mayo',
	'poll:month:06' => 'Junio',
	'poll:month:07' => 'Julio',
	'poll:month:08' => 'Agosto',
	'poll:month:09' => 'Septiembre',
	'poll:month:10' => 'Octubre',
	'poll:month:11' => 'Noviembre',
	'poll:month:12' => 'Diciembre',

	/**
	 * Notifications
	 **/
	'poll:new' => 'Una encuesta nueva',
	'poll:notify:summary' => 'Nueva encuesta titulada %s',
	'poll:notify:subject' => 'Nueva encuesta: %s',
	'poll:notify:body' =>
'
%s ha creado una encuesta nueva:

%s

Puedes votar desde:
%s
',

	/**
	 * Encuesta river
	 **/
	'poll:settings:create_in_river:title' => "Show poll creation in activity river?",
	'poll:settings:vote_in_river:title' => "Show poll voting in activity river?",
	'poll:settings:send_notification:title' => "Send notification when a poll is created? (Members will only receive notifications if their are friend with the creator of the poll or a member of the group the poll was added to. Additionally, notifications will only be sent to members who configured Elgg's notification settings accordingly)",
	'river:create:object:poll' => '%s ha creado la encuesta %s',
	'river:vote:object:poll' => '%s ha votado en la encuesta %s',
	'river:comment:object:poll' => '%s ha comentado en la encuesta %s',

	/**
	 * Status messages
	 */
	'poll:added' => "Tu encuesta ha sido creada.",
	'poll:edited' => "Tu encuesta ha sido salvada.",
	'poll:responded' => "Gracias por responder.",
	'poll:deleted' => "Tu encuesta ha sido borrada correctamente.",
	'poll:totalvotes' => "N&uacute;mero total de votos: %s",
	'poll:voted' => "Gracias por votar.",

	/**
	 * Error messages
	 */
	'poll:blank' => "Disculpa, tienes que rellenar la pregunta y al menos a&ntilde;adir una opci&oacute;n a la encuesta.",
	'poll:novote' => "Disculpa, tienes que elegir una opci&oacute;n de voto.",
	'poll:alreadyvoted' => "Disculpa, solamente puedes votar una vez.",
	'poll:notfound' => "Disculpa, no encontramos la encuesta a la que te refieres.",
	'poll:notdeleted' => "Disculpa, no podemos borrar esa encuesta."
);

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

	// general
	'group_tools:decline' => "Declinar",
	'group_tools:revoke' => "Revocar",
	'group_tools:add_users' => "Añadir habitantes",
	'group_tools:in' => "en",
	'group_tools:remove' => "Borrar",
	'group_tools:delete_selected' => "Borrar seleccionado",
	'group_tools:clear_selection' => "Borrar selección",
	'group_tools:all_members' => "Todas las habitantes",
	'group_tools:explain' => "Explicación",

	'group_tools:default:access:group' => "Solo participantes en el grupo",

	'group_tools:joinrequest:already' => "Revocar petición de participación",
	'group_tools:joinrequest:already:tooltip' => "Ya has solicitado entrar al grupo, haz click aquí para revocar tu decisión",
	'group_tools:join:already:tooltip' => "Has sido invitada al grupo así que puedes entrar cuando quieras.",

	// menu
	'group_tools:menu:mail' => "Contactar por correo",
	'group_tools:menu:invitations' => "Organizar invitaciones",
	'admin:administer_utilities:group_bulk_delete' => "Borrado del grupo",

	'admin:appearance:group_tool_presets' => "Herramientas de grupo por defecto",
	
	// plugin settings
	'group_tools:settings:invite:title' => "Opciones de invitación a grupo",
	'group_tools:settings:management:title' => "Opciones generales del grupo",
	'group_tools:settings:default_access:title' => "Acceso por defecto del grupo",

	'group_tools:settings:admin_transfer' => "Permitir a las creadoras del grupo transferírlo",
	'group_tools:settings:admin_transfer:admin' => "Solo admins",
	'group_tools:settings:admin_transfer:owner' => "Creadoras del grupo y admins",

	'group_tools:settings:multiple_admin' => "Permitir que existan múltiples admins en el grupo",
	'group_tools:settings:auto_suggest_groups' => "Auto-sugerir grupos en la sección 'Sugeridos' del grupo.",

	'group_tools:settings:invite' => "Permitir a todas las habitantes ser invitadas (no solo contactos)",
	'group_tools:settings:invite_email' => "Permitir a todas las habitantes ser invitadas mediante correo electrónico",
	'group_tools:settings:invite_csv' => "Permitir a todas las habitantes ser invitadas mediante un fichero CVS",
	'group_tools:settings:invite_members' => "Permitir a las participantes del grupo invitar a otras habitantes",
	'group_tools:settings:invite_members:default_off' => "Si, por defecto apgado",
	'group_tools:settings:invite_members:default_on' => "Si, por defecto encendido",
	'group_tools:settings:invite_members:description' => "Admins/Creadoras del grupo pueden activar/desactivar ésto para sus grupos",
	'group_tools:settings:domain_based' => "Activar grupos basados en dominios",
	'group_tools:settings:domain_based:description' => "Las habitantes pueden acceder a un grupo basandose en el dominio de correo electrónico que utilicen. Después de registrarse, la red hará que auto-accedan a los grupos que les corresponde según dicho dominio. Así es más sencillo invitar a quien te rodea en otros proyectos en Internet.",

	'group_tools:settings:mail' => "Permitir correos del grupo (permite a las admins del grupo enviar mensajes a todas las participantes)",

	'group_tools:settings:listing:default' => "Listado de grupo por defecto",
	'group_tools:settings:listing:available' => "Listado disponible del grupo",

	'group_tools:settings:default_access' => "Atenta: Cuál crees que debería ser el acceso por defecto al contenido de los grupos de ésta red?",
	'group_tools:settings:default_access:disclaimer' => "<b>DISCLAIMER:</b> <a href='https://github.com/Elgg/Elgg/pull/253' target='_blank'>https://github.com/Elgg/Elgg/pull/253</a>.",

	'group_tools:settings:search_index' => "Permitir que los grupos cerrados sean indexados por los motores de búsqueda",
	'group_tools:settings:auto_notification' => "Activar de manera automática la notificación del grupo al unirse",
	'group_tools:settings:show_membership_mode' => "Mostrar participación abierta/cerrada en el estado del perfil del grupo y el perfil de la creadora",
	'group_tools:settings:show_hidden_group_indicator' => "Mostrar un indicador si el grupo es invisible",
	'group_tools:settings:show_hidden_group_indicator:group_acl' => "Si, si el grupo es solo participantes",
	'group_tools:settings:show_hidden_group_indicator:logged_in' => "Si, para todos los grupos que no sean públicos",
	
	'group_tools:settings:special_states' => "Grupos con un estado especial",
	'group_tools:settings:special_states:featured' => "Promocionado",
	'group_tools:settings:special_states:featured:description' => "Las creadoras de la red han elegido la siguiente opción para los siguientes grupos.",
	'group_tools:settings:special_states:auto_join' => "Auto unirse!",
	'group_tools:settings:special_states:auto_join:description' => "Las nuevas habitantes se unirán de manera automática a los siguientes grupos.",
	'group_tools:settings:special_states:suggested' => "Sugerido",
	'group_tools:settings:special_states:suggested:description' => "Los siguientes grupos son sugeridos a las nuevas habitantes.",

	'group_tools:settings:fix:title' => "Arregla los problemas de acceso al grupo...",
	'group_tools:settings:fix:missing' => "Existen %d habitantes que participan en el grupo pero NO tienen acceso al contenido compartido por el mismo.",
	'group_tools:settings:fix:excess' => "Existen %d habitantes que NO participan en el grupo pero TIENEN acceso al contenido compartido por el mismo.",
	'group_tools:settings:fix:without' => "Existen %d grupos sin las posibilidad de compartir contenido con sus participantes.",
	'group_tools:settings:fix:all:description' => "Arreglar todos los problemas a la vez.",
	'group_tools:settings:fix_it' => "Arreglar ésto",
	'group_tools:settings:fix:all' => "Arreglar todos los problemas",
	'group_tools:settings:fix:nothing' => "No hay ningún problema con los grupos de la red!",

	'group_tools:settings:member_export' => "Permitir a las admins del grupo exportar información sobre las participantes",
	'group_tools:settings:member_export:description' => "Ésto incluye la identidad, el nombre y la dirección de correo.",
	
	// group tool presets
	'group_tools:admin:group_tool_presets:description' => "Aquí puedes configurar las opciones de comienzo. Cuando una habitante crea un grupo, éstas opciones podrán ser elegidas por la misma para configurarlo. También se ofrece una opción en 'blanco' para que sea la habitante quien lo configure.",
	'group_tools:admin:group_tool_presets:header' => "Preconfiguraciones existentes",
	'group_tools:create_group:tool_presets:description' => "Puedes seleccionar una preconfiguración aquí. Si lo haces, tendrás un 'set' de herramientas ya configuradas y listas para funcionar. Y sobre las mismas, podrás elegir cuales quieres usar y cuales no.",
	'group_tools:create_group:tool_presets:active_header' => "Herramientas propuestas",
	'group_tools:create_group:tool_presets:more_header' => "Herramientas extra",
	'group_tools:create_group:tool_presets:select' => "Selecciona un tipo de grupo",
	'group_tools:create_group:tool_presets:show_more' => "Más herramientas",
	'group_tools:create_group:tool_presets:blank:title' => "Grupo en blanco",
	'group_tools:create_group:tool_presets:blank:description' => "Elige éste grupo para seleccionar tus propias herramientas.",
	
	
	// group invite message
	'group_tools:groups:invite:body' => "Hola %s,

%s te ha invitado a que participes en el grupo '%s'.
%s

Para ver tus invitaciones:
%s",

	// group add message
	'group_tools:groups:invite:add:subject' => "Has comenzado a participar en el grupo %s",
	'group_tools:groups:invite:add:body' => "Hola %s,

%s te ha añadido al grupo %s.
%s

Para vistar el grupo:
%s",
	// group invite by email
	'group_tools:groups:invite:email:subject' => "Has sido invitada al grupo %s",
	'group_tools:groups:invite:email:body' => "Hola,

%s te ha invitado a participar en el grupo %s en %s.
%s

Si no tienes una cuenta en %s necesitas una invitación y posteriormente registrarte en:
%s

Si por otro lado, ya tienes una cuenta en la red, haz click en el siguiente enlace para aceptar la propuesta y comenzar a participar en el grupo:
%s

También puedes utilizar el menú e ir a la sección de 'Invitaciones a grupos' e insertar el siguiente código:
%s",
	// group transfer notification
	'group_tools:notify:transfer:subject' => "La administración del grupo %s te ha seleccionado",
	'group_tools:notify:transfer:message' => "Hola %s,

%s te ha seleccionado como nueva administradora del grupo %s.

Para visitar el grupo:
%s",
	
	// deline membeship request notification
	'group_tools:notify:membership:declined:subject' => "Tu petición para participar en el grupo '%s' ha sido rechazada!",
	'group_tools:notify:membership:declined:message' => "Hola %s,

Tu petición para participar en el grupo '%s' ha sido declinada.

Para vistar el grupo:
%s",
	'group_tools:notify:membership:declined:message:reason' => "Hola %s,

Tu petición para participar en el grupo '%s' ha sido declinada. La razón dice:

%s

Para visitar el grupo:
%s",

	// group edit tabbed
	'group_tools:group:edit:profile' => "Perfil",
	'group_tools:group:edit:access' => "Acceso",
	'group_tools:group:edit:tools' => "Herramientas",
	'group_tools:group:edit:other' => "Otras opciones",

	// admin transfer - form
	'group_tools:admin_transfer:current' => "Mantener la creadora: %s",
	'group_tools:admin_transfer:myself' => "Yo misma",
	'group_tools:admin_transfer:submit' => "Transferir",
	
	// special states form
	'group_tools:special_states:title' => "Estados especiales del grupo",
	'group_tools:special_states:description' => "Un grupo puede tener diferentes estados especiales, a continuación tienes una lista y su valor actual.",
	'group_tools:special_states:featured' => "Es éste un grupo promocionado?",
	'group_tools:special_states:auto_join' => "Deberían las habitantes participar automáticamente en el grupo?",
	'group_tools:special_states:auto_join:fix' => "Para hacer a todas las habitantes de la red pertenecer en éste grupo, haz %sclick aquí%s.",
	'group_tools:special_states:suggested' => "Es éste un grupo sugerido para las (nuevas) habitantes?",
	
	// group admins
	'group_tools:multiple_admin:group_admins' => "Administradoras del grupo",
	'group_tools:multiple_admin:profile_actions:remove' => "Borrar administradora del grupo",
	'group_tools:multiple_admin:profile_actions:add' => "Añadir administradora al grupo",

	'group_tools:multiple_admin:group_tool_option' => "Activar que las administradoras del grupo puedan crear a otras administradoras",

	// cleanup options
	'group_tools:cleanup:title' => "Limpieza de barra lateral del grupo",
	'group_tools:cleanup:description' => "Limpiar la barra lateral del grupo. Ésto no tendrá efecto para las administradoras del grupo.",
	'group_tools:cleanup:owner_block' => "Limitar el bloque de la creadora",
	'group_tools:cleanup:owner_block:explain' => "El bloque de la creadora se encuentra en la parte superior de la barra lateral y provee varios enlace extra en dicha área (por ejemplo, los enlaces RSS...).",
	'group_tools:cleanup:actions' => "Esconder el botón de solicitud de participación (modo invitaciones)",
	'group_tools:cleanup:actions:explain' => "Dependiendo de como hayas configurado el grupo, las habitantes podrán o no acceder al grupo directamente.",
	'group_tools:cleanup:menu' => "Esconder los objetos del menú",
	'group_tools:cleanup:menu:explain' => "Esconder las herramientas del menú. De ésta manera las participantes solo podrán acceder a determinadas herramientas a partir de los módulos del grupo.",
	'group_tools:cleanup:members' => "Ocultar quien participa",
	'group_tools:cleanup:members:explain' => "Puedes esconder la lista de participantes del grupo.",
	'group_tools:cleanup:search' => "Esconder la búsqueda en el grupo",
	'group_tools:cleanup:search:explain' => "Puedes esconder el formulario de búsqueda de contenidos dentro del grupo.",
	'group_tools:cleanup:featured' => "Mostrar los grupos promocionados en la barra lateral",
	'group_tools:cleanup:featured:explain' => "Puedes elegir mostrar una lista de grupos promocionados en la barra lateral",
	'group_tools:cleanup:featured_sorting' => "Como ordenar los grupos promocionados",
	'group_tools:cleanup:featured_sorting:time_created' => "Primero los nuevos",
	'group_tools:cleanup:featured_sorting:alphabetical' => "Alfabéticamente",
	'group_tools:cleanup:my_status' => "Ocultar la barra lateral de 'Mi estado'",
	'group_tools:cleanup:my_status:explain' => "En la barra lateral del perfil del grupo es posible mostrar el estado de las participantes. Puedes elegir ocultar ese dato si lo deseas.",

	// group default access
	'group_tools:default_access:title' => "Acceso por defecto al grupo",
	'group_tools:default_access:description' => "Aquí puedes controlar el nivel de acceso por defecto al contenido nuevo del grupo.",

	// group notification
	'group_tools:notifications:title' => "Notificaciones del grupo",
	'group_tools:notifications:description' => "El grupo tiene %s participantes, de los cuales %s tienen activadas las notificaciones de actividad del grupo. Debajo puedes cambiarlo para que sean todas quienes las reciban.",
	'group_tools:notifications:disclaimer' => "Con grupos grandes ésto puede tomar algo de tiempo.",
	'group_tools:notifications:enable' => "Activar las notificaciones para todas las participantes",
	'group_tools:notifications:disable' => "Desactivar las notificaciones para todas las participantes",

	// group profile widgets
	'group_tools:profile_widgets:title' => "Mostrar los módulos del grupo a quienes no participan en él",
	'group_tools:profile_widgets:description' => "Éste es un grupo cerrado. Los módulos por defecto no se muestran a quienes no participan en el grupo. Aquí puedes configurar algunos cambios para ésta configuración.",
	'group_tools:profile_widgets:option' => "Permitir a quien no participa ver los módulos del grupo en su perfil:",

	// group mail
	'group_tools:mail:message:from' => "Desde el grupo",

	'group_tools:mail:title' => "Enviar un correo a las participantes del grupo",
	'group_tools:mail:form:recipients' => "Número de destinatarias",
	'group_tools:mail:form:members:selection' => "Seleccionar participantes concretas",

	'group_tools:mail:form:title' => "Título",
	'group_tools:mail:form:description' => "Mensaje",

	'group_tools:mail:form:js:members' => "Debes seleccionar al menos una participante para poder enviar el mensaje",
	'group_tools:mail:form:js:description' => "Introduce un mensaje!",

	// group invite
	'group_tools:groups:invite:title' => "Invitar a habitantes a éste grupo",
	'group_tools:groups:invite' => "Invitar habitantes",
	'group_tools:groups:invite:user_already_member' => "La habitante ya participa en el grupo!",

	'group_tools:group:invite:friends:select_all' => "Seleccionar todos los contactos",
	'group_tools:group:invite:friends:deselect_all' => "Deseleccionar todos los contactos",

	'group_tools:group:invite:users' => "Encontrar habitante(s)",
	'group_tools:group:invite:users:description' => "Introduce una identidad de habitante y seleccionala de la lista",
	'group_tools:group:invite:users:all' => "Invitar a todas las habitantes de la red a éste grupo",

	'group_tools:group:invite:email' => "Utilizando la dirección de correo",
	'group_tools:group:invite:email:description' => "Introduce una dirección de correo válida y seleccionala de la lista",

	'group_tools:group:invite:csv' => "Utilizar un fichero CSV",
	'group_tools:group:invite:csv:description' => "Puedes subir un fichero con formato CSV con una lista de habitantes a las que te gustaría invitar.<br />El formato aceptado es el siguiente: identidad;dirección de correo. No dejes una línea de cabecera, ni espacios entre filas.",

	'group_tools:group:invite:text' => "Nota personal (opcional)",
	'group_tools:group:invite:add:confirm' => "Seguro que deseas añadir a éstas habitantes directamente?",

	'group_tools:group:invite:resend' => "Re-enviar invitaciones a las habitantes que ya han sido invitadas y aún no han decidido",

	'group_tools:groups:invitation:code:title' => "Invitaciones del grupo mediante correo electrónico",
	'group_tools:groups:invitation:code:description' => "Si has recibido una invitación para participar en un grupo, mediante correo electrónico, puedes introducir el código de invitación aquí para aceptarla. Si haces click en el link que viene adjunto en el correo, el código será automáticamente introducido por ti.",

	// group membership requests
	'group_tools:groups:membershipreq:requests' => "Peticiones de participación",
	'group_tools:groups:membershipreq:invitations' => "Habitantes invitadas",
	'group_tools:groups:membershipreq:invitations:none' => "No hay habitantes con peticiones de invitación pendientes",
	'group_tools:groups:membershipreq:email_invitations' => "Invitar direcciones de correo",
	'group_tools:groups:membershipreq:email_invitations:none' => "No hay habitantes con peticiones de invitación, mediante correo electrónico, pendientes",
	'group_tools:groups:membershipreq:invitations:revoke:confirm' => "Seguro que deseas revocar la invitación?",
	'group_tools:groups:membershipreq:kill_request:prompt' => "De manera opcional, puedes decirle a la habitante que has declinado la invitación a última hora.",

	// group invitations
	'group_tools:group:invitations:request' => "Peticiones de participación enviadas",
	'group_tools:group:invitations:request:revoke:confirm' => "Seguro que deseas revocar la petición de participación?",
	'group_tools:group:invitations:request:non_found' => "No se han enviado peticiones de partipación, de momento...",

	// group listing
	'group_tools:groups:sorting:alphabetical' => "Todos",
	'group_tools:groups:sorting:open' => "Abiertos",
	'group_tools:groups:sorting:closed' => "Cerrados",
        'group_tools:groups:sorting:popular' => "Destacados",
	'group_tools:groups:sorting:ordered' => "Ordenados",
	'group_tools:groups:sorting:suggested' => "Sugeridos",
	'group_tools:groups:sorting:featured' => "Promocionados",

	// discussion status
	'group_tools:discussion:confirm:open' => "Seguro que deseas re-abrir éste hilo?",
	'group_tools:discussion:confirm:close' => "Seguro que quieres cerrar el hilo?",
	
	// allow group members to invite
	'group_tools:invite_members:title' => "Participantes puedes invitar",
	'group_tools:invite_members:description' => "Permitir a las participantes del grupo invitar a otras habitantes",

	// group tool option descriptions
	'activity:group_tool_option:description' => "Mostrar datos de la actividad de los grupos que tengan contenido relacionado (modo enjambre).",
	'forum:group_tool_option:description' => "Permitir a las participantes en el grupo comenzar una discusión en el foro.",
	
	// actions
	'group_tools:action:error:input' => "Entrada inválida",
	'group_tools:action:error:entities' => "Los GUIDs proporcionados no coinciden con entidades identificables",
	'group_tools:action:error:entity' => "El GUID proporcionado no coincide con una entidad identificable",
	'group_tools:action:error:edit' => "No tienes permisos suficientes!",
	'group_tools:action:error:save' => "Ha ocurrido un error mientras se salvaba la confiración. Intente de nuevo",
	'group_tools:action:success' => "La configuración se ha salvado correctamente",

	// group edit
	'group_tools:action:group:edit:error:default_access' => "El nivel de acceso al grupo por defecto es más público que el contenido que el propio grupo está generando, por tanto, el nivel de acceso ha sido rebajado por las propias participantes.",
	
	// admin transfer - action
	'group_tools:action:admin_transfer:error:access' => "No tienes permisos para transferir el grupo!",
	'group_tools:action:admin_transfer:error:self' => "En serio quieres transferirte el grupo a tí misma?",
	'group_tools:action:admin_transfer:error:save' => "Ha ocurrido un error al salvar el grupo, refresca e intentalo de nuevo",
	'group_tools:action:admin_transfer:success' => "El grupo se ha transferido de manera correcta a %s",

	// group admins - action
	'group_tools:action:toggle_admin:error:group' => "O bien no tienes permisos para editar el grupo o bien la habitante que has elegido no participa en el grupo. Comprueba el proceso de nuevo",
	'group_tools:action:toggle_admin:error:remove' => "Ha ocurrido un error al eliminar a la participante como administradora del grupo",
	'group_tools:action:toggle_admin:error:add' => "Ha ocurrido un error al añadir a la participante como administradora del grupo",
	'group_tools:action:toggle_admin:success:remove' => "La participante ya no es administradora del grupo",
	'group_tools:action:toggle_admin:success:add' => "La participante ha comenzado a ser administradora del grupo",

	// group mail - action
	'group_tools:action:mail:success' => "Mensaje enviado de forma correcta",

	// group - invite - action
	'group_tools:action:invite:error:invite'=> "No se han invitado habitantes (%s invitadas, %s participantes)",
	'group_tools:action:invite:error:add'=> "No se han añadido habitantes (%s invitadas, %s participantes)",
	'group_tools:action:invite:success:invite'=> "Invitados correctamente %s habitantes (%s invitadas, %s participantes)",
	'group_tools:action:invite:success:add'=> "Añadidas correctamente %s habitantes (%s invitadas, %s participantes)",

	// group - invite - accept e-mail
	'group_tools:action:groups:email_invitation:error:input' => "Introduce un código de invitación",
	'group_tools:action:groups:email_invitation:error:code' => "El código que has introducido no sirve!",
	'group_tools:action:groups:email_invitation:error:join' => "Ha ocurrido un error al comenzar a participar en el grupo %s. Puede ser que ya participes?",
	'group_tools:action:groups:email_invitation:success' => "A partir de ahora, participas en el grupo",

	// group - invite - decline e-mail
	'group_tools:action:groups:decline_email_invitation:error:delete' => "Ha ocurrido un error al borrar la invitación",

	// suggested groups
	'group_tools:suggested_groups:info' => "Lo siguientes grupos parecen interesantes según tu perfil. Haz click en los botones de participación o en el título para ver más información sobre los mismos.",
	'group_tools:suggested_groups:none' => "No podemos sugerirte ningún grupo, de momento...",
		
	// group toggle auto join
	'group_tools:action:toggle_special_state:error:auto_join' => "Ha ocurrido un error al salvar la configuración de auto-participación",
	'group_tools:action:toggle_special_state:error:suggested' => "Ha ocurrido un error al savar la configuración de las nuevas sugerencias",
	'group_tools:action:toggle_special_state:error:state' => "El estado no es válido!",
	'group_tools:action:toggle_special_state:auto_join' => "La nueva configuración de auto-participación se ha salvado correctamente",
	'group_tools:action:toggle_special_state:suggested' => "La nueva configuración de sugerencias se ha salvado correctamente",
	
	// group fix auto_join
	'group_tools:action:fix_auto_join:success' => "Arreglos en la participación del grupo: %s nuevas participantes, %s ya participanban y %s fallos",

	// group cleanup
	'group_tools:actions:cleanup:success' => "Las opciones de limpieza se han salvado correctamente",

	// group default access
	'group_tools:actions:default_access:success' => "El acceso por defecto al grupo se ha salvado correctamente",

	// group notifications
	'group_tools:action:notifications:error:toggle' => "Opción inválida",
	'group_tools:action:notifications:success:disable' => "Las notificaciones para cada participante se han desactivado de manera correcta",
	'group_tools:action:notifications:success:enable' => "Las notificaciones para cada participante se han activado de manera correcta",

	// fix group problems
	'group_tools:action:fix_acl:error:input' => "La opción inválida que no puedes arreglar es: %s",
	'group_tools:action:fix_acl:error:missing:nothing' => "No hay participantes perdidas en las listas de control de acceso al grupo",
	'group_tools:action:fix_acl:error:excess:nothing' => "No sobran habitantes en las listas de control de acceso al grupo",
	'group_tools:action:fix_acl:error:without:nothing' => "No existen grupo sin una lista de control de accesos",

	'group_tools:action:fix_acl:success:missing' => "Añadidas correctamente %d habitantes a las listas de control de acceso al grupo",
	'group_tools:action:fix_acl:success:excess' => "Borradas correctamente %d habitantes de las listas de control de acceso al grupo",
	'group_tools:action:fix_acl:success:without' => "Creadas correctamente %d listas de control de accesos al grupo",

	// discussion toggle status
	'group_tools:action:discussion:toggle_status:success:open' => "El hilo se ha re-abierto de manera correcta",
	'group_tools:action:discussion:toggle_status:success:close' => "El hilo se ha cerrado de manera correcta",
		
	// Widgets
	// Group River Widget
	'widgets:group_river_widget:title' => "Actividad del grupo",
    'widgets:group_river_widget:description' => "Mostrar la actividad de un grupo",

    'widgets:group_river_widget:edit:num_display' => "Número de elementos",
	'widgets:group_river_widget:edit:group' => "Seleccionar un grupo",
	'widgets:group_river_widget:edit:no_groups' => "Necesitas pertenecer al menos a un grupo para poder utilizar el módulo",

	'widgets:group_river_widget:view:not_configured' => "El módulo no está configurado, de momento",

	'widgets:group_river_widget:view:more' => "Actividad visible del grupo '%s'",
	'widgets:group_river_widget:view:noactivity' => "No existe actividad visible...",

	// Group Members
	'widgets:group_members:title' => "Participantes en el grupo",
  	'widgets:group_members:description' => "Mostrar las participantes en éste grupo",

	'widgets:group_members:edit:num_display' => "Cuántas participantes quieres mostrar?",
  	'widgets:group_members:view:no_members' => "No hay participantes visibles en el grupo",

  	// Group Invitations
	'widgets:group_invitations:title' => "Invitaciones del grupo",
  	'widgets:group_invitations:description' => "Mostrar las invitaciones pendientes a la habitante actual",

	// Discussion
	"widgets:discussion:settings:group_only" => "Solo mostrar las discusiones de los grupos en los que participas",
  	'widgets:discussion:more' => "Ver más discusiones",
  	"widgets:discussion:description" => "Mostras las últimas discusiones",

	// Forum topic widget
	'widgets:group_forum_topics:description' => "Mostrar las últimas discusiones",

	// index_groups
	'widgets:index_groups:description' => "Listar los grupos de la red",
	'widgets:index_groups:show_members' => "Mostrar un contador de participantes",
	'widgets:index_groups:featured' => "Solo mostrar los grupos promocionados",
	'widgets:index_groups:sorting' => "Cómo quieres ordenar los grupos?",

	'widgets:index_groups:filter:field' => "Filtrar los grupos en base al campo del grupo",
	'widgets:index_groups:filter:value' => "con valor",
	'widgets:index_groups:filter:no_filter' => "Sin filtros",

	// Featured Groups
	'widgets:featured_groups:description' => "Mostrar una lista aleatoria de grupos promocionados",
  	'widgets:featured_groups:edit:show_random_group' => "Mostrar una lista aleatoria de grupos sin promocionar",

	// group_news widget
	"widgets:group_news:title" => "Blogs de tus grupos",
	"widgets:group_news:description" => "Mostrar las últimas entradas en los blogs de tus grupos",
	"widgets:group_news:no_projects" => "No se han configurado los grupos",
	"widgets:group_news:no_news" => "No existen entradas de blog para éste grupo, de momento...",
	"widgets:group_news:settings:project" => "Grupo",
	"widgets:group_news:settings:no_project" => "Seleccionar un grupo",
	"widgets:group_news:settings:blog_count" => "Número máximo de entradas de blog",
	"widgets:group_news:settings:group_icon_size" => "Tamaño del icono del grupo",
	"widgets:group_news:settings:group_icon_size:small" => "Pequeño",
	"widgets:group_news:settings:group_icon_size:medium" => "Mediano",

	// quick start discussion
	'group_tools:widgets:start_discussion:title' => "Comenzar una discusión",
	'group_tools:widgets:start_discussion:description' => "Comenzar una discusión inmediatamente el el grupo seleccionado",

	'group_tools:widgets:start_discussion:login_required' => "Para poder utilizar el módulo necesitas estar dentro de la red!",
	'group_tools:widgets:start_discussion:membership_required' => "Necesitas participar en al menos un grupo para poder utilizar el módulo. Puedes encontrar grupos interesantes por su contenido y por quienes lo forman, %saquí%s.",

	'group_tools:forms:discussion:quick_start:group' => "Selecciona un grupo para ésta discusión",
	'group_tools:forms:discussion:quick_start:group:required' => "Necesitas seleccionar un grupo!",
	
	'groups:search:tags' => "Buscar contenido en grupos",
	'groups:search:title' => "Búsquedas en grupos que coinciden con el término: '%s'",
	'groups:searchtag' => "Buscador para grupos",
	
	// welcome message
	'group_tools:welcome_message:title' => "Mensaje de bienvenida al grupo",
	'group_tools:welcome_message:description' => "Puedes configurar un mensaje de bienvenida para las nuevas habitantes que comiencen a participar en el grupo. Sino escribes nada, no recibirán nada.",
	'group_tools:welcome_message:explain' => "Para personalizar el mensaje, puedes utilizar los siguientes trucos:
[name]: el nombre de la nueva participante (ej: %s)
[group_name]: el nombre de éste grupo (ej: %s)
[group_url]: la URL del éste grupo (ej: %s)",
	
	'group_tools:action:welcome_message:success' => "El mensaje de bienvenida se ha guardado correctamente",
	
	'group_tools:welcome_message:subject' => "Bienvenida a %s",
	
	// email invitations
	'group_tools:action:revoke_email_invitation:error' => "Ha ocurrido un error al revocar la invitación",
	'group_tools:action:revoke_email_invitation:success' => "La invitación ha sido revocada",
	
	// domain based groups
	'group_tools:join:domain_based:tooltip' => "Gracias a que el dominio de correo que utilizas es similar al del grupo, puedes participar directamente! ;-)",
	
	'group_tools:domain_based:title' => "Configurar dominios de correo electrónico",
	'group_tools:domain_based:description' => "Cuando configuras uno o más dominios de correo electrónico, puedes hacer que la gente que lo usa, puedan acceder al grupo de manera automática. Es una manera de ahorrarte el trabajo de encontrar a tus compañeras de fuera de la red y hacer que se unan a la misma. Y en concreto, a la zona que tu controlas de ella. No hace falta que pongas @ y usa comas para separar",
	
	'group_tools:action:domain_based:success' => "Los nuevos dominios de correo se han salvado correctamente",
	
	// related groups
	'groups_tools:related_groups:tool_option' => "Mostrar grupos relacionados",
	
	'groups_tools:related_groups:widget:title' => "Grupos relacionados",
	'groups_tools:related_groups:widget:description' => "Mostrar una lista de grupos relacionados con el grupo.",
	
	'groups_tools:related_groups:none' => "No se han encontrado grupos relacionados, de momento...",
	'group_tools:related_groups:title' => "Grupos relacionados",
	
	'group_tools:related_groups:form:placeholder' => "Buscar nuevos grupos relacionados",
	'group_tools:related_groups:form:description' => "Haz una búsqueda de grupos relacionados, seleccionalos y añádelos direcmante a la lista haciendo click en Añadir.",
	
	'group_tools:action:related_groups:error:same' => "No tiene mucho sentido tratar de relacionar un grupo consigo mismo!",
	'group_tools:action:related_groups:error:already' => "El grupo que has seleccionado ya está relacionado!",
	'group_tools:action:related_groups:error:add' => "Ha ocurrido un error al establecer la relación",
	'group_tools:action:related_groups:success' => "A partir de ahora el grupo está relacionado",
	
	'group_tools:related_groups:notify:owner:subject' => "Se ha añadido un nuevo grupo relacionado",
	'group_tools:related_groups:notify:owner:message' => "Hola %s,
	
%s ha añadido a tu grupo %s como relacionado con %s.",
	
	'group_tools:related_groups:entity:remove' => "Borrar grupos relacionados",
	
	'group_tools:action:remove_related_groups:error:not_related' => "El grupo no está relacionado",
	'group_tools:action:remove_related_groups:error:remove' => "Ha ocurrido un error al borrar la relación",
	'group_tools:action:remove_related_groups:success' => "A partir de ahora el grupo no estará relacionado",
	
	'group_tools:action:group_tool:presets:saved' => "Nuevas pre-configuraciones de grupo salvadas",
	
	'group_tools:forms:members_search:members_search:placeholder' => "Introduce la identidad de habitante que deseas buscar",
	
	// group member export
	'group_tools:member_export:title_button' => "Exportar participantes",
	
	// group bulk delete
	'group_tools:action:bulk_delete:success' => "Los grupos seleccionados han sido borrados",
	'group_tools:action:bulk_delete:error' => "Ha ocurrido un error al tratar de borrar los grupos seleccionado. Intente de nuevo",
);

add_translation("es", $spanish);

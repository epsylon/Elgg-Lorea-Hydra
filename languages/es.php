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
/**
 * Sites
 */

	'item:site' => 'Lugares',

/**
 * Sessions
 */

	'login' => "Iniciar sesi&oacute;n",
	'loginok' => "Ha iniciado sesi&oacute;n",
	'loginerror' => "Inicio de sesi&oacute;n incorrecto. Verifica tus credenciales e intentelo nuevamente",
	'login:empty' => "La identidad de habitante y contrase&ntilde;a son necesarias",
	'login:baduser' => "No se pudo cargar su cuenta de habitante",
	'auth:nopams' => "Error interno. No se encuentra un m&eacute;todo de autenticaci&oacute;n instalado",

	'logout' => "Cerrar sesi&oacute;n",
	'logoutok' => "Se ha cerrado la sesi&oacute;n",
	'logouterror' => "No se pudo cerrar la sesi&oacute;n, por favor intente nuevamente",
	'session_expired' => "Su sesión ha expirado. Por favor refresca la página para ingresar nuevamente.",

	'loggedinrequired' => "Debe estar autenticado para poder visualizar esta p&aacute;gina",
	'adminrequired' => "Debe ser un administrador para poder visualizar esta p&aacute;gina",
	'membershiprequired' => "Debe ser miembro del grupo para poder visualizar esta p&aacute;gina",
	'limited_access' => "No tienes permiso para ver la página solicitada",


/**
 * Errors
 */

	'exception:title' => "Error Fatal",
	'exception:contact_admin' => 'Se ha encontrado un error fatal al iniciar sesi&oacute;n. Contacta con alguna administradora con la siguiente informaci&oacute;n:',

	'actionundefined' => "La acci&oacute;n (%s) solicitada no se encuentra definida en el sistema",
	'actionnotfound' => "El log de acciones para %s no se ha encontrado",
	'actionloggedout' => "Lo sentimos, no puede realizar esta acci&oacute;n sin identificarse",
	'actionunauthorized' => 'Usted no posee los permisos necesarios para realizar esta acci&oacute;n',
	
	'ajax:error' => 'Ha habido un error inesperado en la llamada AJAX. Puede que la conexión con el servidor se haya perdido. Refresca la p&aacute;gina',
	'ajax:not_is_xhr' => 'No puede acceder directamente a vistas AJAX',

	'PluginException:MisconfiguredPlugin' => "%s (guid: %s) plugin mal configurado. Se ha desactivado.",
	'PluginException:CannotStart' => '%s (guid: %s) no puede iniciarse. Motivo: %s',
	'PluginException:InvalidID' => "%s no es un ID de plugin v&aacute;lido",
	'PluginException:InvalidPath' => "%s es un path de plugin inv&aacute;lido",
	'PluginException:InvalidManifest' => 'Archivo de manifesto inv&aacute;lido para el plugin %s',
	'PluginException:InvalidPlugin' => '%s no es un plugin v&aacute;lido',
	'PluginException:InvalidPlugin:Details' => '%s no es un plugin v&aacute;lido: %s',
	'PluginException:NullInstantiated' => 'El plugin no puede instanciarse con un valor nulo. Debes usar un GUID, ID de plugin o un path completo.',
	'ElggPlugin:MissingID' => 'No se encuentra el ID del plugin (guid %s)',
	'ElggPlugin:NoPluginPackagePackage' => 'Paquete faltante para el plugin con ID %s (guid %s)',
	'ElggPluginPackage:InvalidPlugin:MissingFile' => 'Archivo %s faltante en el paquete',
	'ElggPluginPackage:InvalidPlugin:InvalidId' => 'El directorio del plugin debe ser renombrado a "%s" para que se igual al ID de su manifiesto.',
	'ElggPluginPackage:InvalidPlugin:InvalidDependency' => 'Tipo de dependencia "%s" inv&aacute;lida',
	'ElggPluginPackage:InvalidPlugin:InvalidProvides' => 'Tipo "%s" provisto inv&aacute;lido',
	'ElggPluginPackage:InvalidPlugin:CircularDep' => 'Dependencia %s inv&aacute;lida "%s" en plugin %s. Los plugins no pueden entrar en conlicto con otros requeridos!',
	'ElggPlugin:Exception:CannotIncludeFile' => 'No puede incluirse %s para el plugin %s (guid: %s) en %s. Verifique los permisos!',
	'ElggPlugin:Exception:CannotRegisterViews' => 'No puede cargarse el directorio "views" para el plugin %s (guid: %s) en %s. Verifique los permisos!',
	'ElggPlugin:Exception:CannotRegisterLanguages' => 'No pueden registrarse lenguajes para el plugin %s (guid: %s) en %s.  Verifique los permisos!',
	'ElggPlugin:Exception:NoID' => 'No se encontr&oacute; el ID para el plugin con guid %s!',
	'PluginException:NoPluginName' => "No se pudo encontrar el nombre del plugin",
	'PluginException:ParserError' => 'Error procesando el manifiesto con versi&oacute;n de API %s en plugin %s',
	'PluginException:NoAvailableParser' => 'No se encuentra un procesador para el manifiesto de la versi&oacute;n de la API %s en plugin %s',
	'PluginException:ParserErrorMissingRequiredAttribute' => "Atributo '%s' faltante en manifiesto del el plugin %s",
	'ElggPlugin:InvalidAndDeactivated' => '%s no es un plugin v&aacute;lido y se ha deshabilitado',

	'ElggPlugin:Dependencies:Requires' => 'Requiere',
	'ElggPlugin:Dependencies:Suggests' => 'Sugiere',
	'ElggPlugin:Dependencies:Conflicts' => 'Conflictos',
	'ElggPlugin:Dependencies:Conflicted' => 'En conflicto',
	'ElggPlugin:Dependencies:Provides' => 'Provee',
	'ElggPlugin:Dependencies:Priority' => 'Prioridad',

	'ElggPlugin:Dependencies:Elgg' => 'Versi&oacute;n CORE Elgg',
	'ElggPlugin:Dependencies:PhpVersion' => 'Versi&oacute;n de PHP',
	'ElggPlugin:Dependencies:PhpExtension' => 'Extensi&oacute;n PHP: %s',
	'ElggPlugin:Dependencies:PhpIni' => 'Configuraci&oacute;n PHP ini: %s',
	'ElggPlugin:Dependencies:Plugin' => 'Plugin: %s',
	'ElggPlugin:Dependencies:Priority:After' => 'Luego %s',
	'ElggPlugin:Dependencies:Priority:Before' => 'Antes %s',
	'ElggPlugin:Dependencies:Priority:Uninstalled' => '%s no instalado',
	'ElggPlugin:Dependencies:Suggests:Unsatisfied' => 'Faltante',
	
	'ElggPlugin:Dependencies:ActiveDependent' => 'Hay otros complementos que tienen a «%s» como dependencia. Debes desactivar los siguientes complementos primero para poder desactivar este: %s',

	'ElggMenuBuilder:Trees:NoParents' => 'Hay elementos de menú que no están enlazados a ningún elemento padre',
	'ElggMenuBuilder:Trees:OrphanedChild' => 'El elemento de menú [%s] no tiene elemento padre[%s]',
	'ElggMenuBuilder:Trees:DuplicateChild' => 'El elemento de menú [%s] está registrado por duplicado',

	'RegistrationException:EmptyPassword' => 'Los campos de contrase&ntilde;as son obligatorios',
	'RegistrationException:PasswordMismatch' => 'Las contrase&ntilde;as deben coincidir',
	'LoginException:BannedUser' => 'Su ingreso ha sido bloqueado moment&aacute;neamente',
	'LoginException:UsernameFailure' => 'No pudo iniciarse la sesi&oacute;n. Por favor verifique su nombre de Usuaria y contrase&ntilde;a',
	'LoginException:PasswordFailure' => 'No pudo iniciarse la sesi&oacute;n. Por favor verifique su nombre de Usuaria y contrase&ntilde;a',
	'LoginException:AccountLocked' => 'Su cuenta ha sido bloqueada por la cantidad de intentos fallidos de inicio de sesion',
	'LoginException:ChangePasswordFailure' => 'Fall&oacute; el cambio de contrase&ntilde;a. revisa la antigua y nueva contrase&ntilde;a.',
	'LoginException:Unknown' => 'No puede iniciarse la sesi&oacute;n debido a un error desconocido.',

	'deprecatedfunction' => 'Precauci&oacute;n: Este c&oacute;digo utiliza la funci&oacute;n obsoleta \'%s\' que no es compatible con esta versi&oacute;n',

	'pageownerunavailable' => 'Precauci&oacute;n: El administrador de la p&aacute;gina %d no se encuentra accesible!',
	'viewfailure' => 'Ocurri&oacute; un error interno en la vista %s',
	'view:missing_param' => "Falta el parámetro obligatorio «%s» en la vista «%s».",
	'changebookmark' => 'Por favor modifique su &iacute;ndice para esta vista',
	'noaccess' => 'Necesitas iniciar sesi&ocaute;n para poder ver el contenido, el contenido ha sido borrado o no tienes permiso para visitarlo.',
	'error:missing_data' => 'Faltan datos',
	'save:fail' => 'Hubo un error guardando tus datos',
	'save:success' => 'Tus datos fueron guardados',

	'error:default:title' => 'Error...',
	'error:default:content' => 'Oops... Algo salió mal',
	'error:400:title' => 'Petición incorrecta',
	'error:400:content' => 'Lo sentimos. La petición no es válida o está incompleta.',
	'error:403:title' => 'Prohibido',
	'error:403:content' => 'Lo sentimos. Usted no está autorizado a ver la página solicitada.',
	'error:404:title' => 'Página no encontrada',
	'error:404:content' => 'Lo sentimos. No pudimos encontrar la página solicitada',

	'upload:error:ini_size' => 'El archivo que intentó subir es muy grande.',
	'upload:error:form_size' => 'El archivo que intentó subir es muy grande.',
	'upload:error:partial' => 'La subida no pudo completarse',
	'upload:error:no_file' => 'Ningún archivo ha sido seleccionado',
	'upload:error:no_tmp_dir' => 'No se puede guardar el archivo subido',
	'upload:error:cant_write' => 'No se puede guardar el archivo subido',
	'upload:error:extension' => 'No se puede guardar el archivo subido',
	'upload:error:unknown' => 'La subida ha fallado',


/**
 * User details
 */

	'name' => "Identidad",
	'email' => "Direcci&oacute;n de Email",
	'username' => "Identidad",
	'loginusername' => "Identidad o Email",
	'password' => "Contrase&ntilde;a",
	'passwordagain' => "Contrase&ntilde;a (nuevamente, para verificaci&oacute;n)",
	'admin_option' => "Hacer administradora a &eacute;sta habitante?",

/**
 * Access
 */

	'PRIVATE' => "Privado",
	'LOGGED_IN' => "Solo Habitantes",
	'PUBLIC' => "P&uacute;blico",
	'LOGGED_OUT' => "Habitantes que han cerrado sesión",
	'access:friends:label' => "De mis contactos",
	'access' => "Acceso",
	'access:overridenotice' => "Aviso: Debido a la política del grupo, este contenido solo es accesible para los miembros del mismo",
	'access:limited:label' => "Limitado",
	'access:help' => "El nivel de acceso",
	'access:read' => "S&oacute;lo lectura",
	'access:write' => "Acceso de escritura",
	'access:admin_only' => "Solo Administradoras",
	'access:missing_name' => "Falta el nombre del nivel de acceso",
	'access:comments:change' => "Esta discusión está solo visible para un conjunto limitado de habitantes. Piénsate bien con quién la compartes.",

/**
 * Dashboard and widgets
 */

	'dashboard' => "Escritorio",
	'dashboard:nowidgets' => "El escritorio te permite seguir la actividad y el contenido que te interesa",

	'widgets:add' => 'Agregar módulo',
	'widgets:add:description' => "Haz click en el bot&oacute;n de alg&uacute;n módulo para agregarlo a la p&aacute;gina",
	'widgets:panel:close' => "Cerrar el panel de módulos",
	'widgets:position:fixed' => '(Posici&oacute;n fija en la p&aacute;gina)',
	'widget:unavailable' => 'Ya has agregado ese módulo',
	'widget:numbertodisplay' => 'Cantidad de elementos a mostrar',

	'widget:delete' => 'Quitar %s',
	'widget:edit' => 'Personalizar módulo',

	'widgets' => "Módulos",
	'widget' => "Módulo",
	'item:object:widget' => "Módulos",
	'widgets:save:success' => "El módulo se guard&oacute; correctamente",
	'widgets:save:failure' => "No se pudo guardar el módulo, por favor intente nuevamente",
	'widgets:add:success' => "Se agreg&oacute; correctamente el módulo",
	'widgets:add:failure' => "No se pudo a&ntilde;adir el módulo",
	'widgets:move:failure' => "No se pudo guardar la nueva posici&oacute;n del módulo",
	'widgets:remove:failure' => "No se pudo quitar el módulo",

/**
 * Groups
 */

	'group' => "Grupo",
	'item:group' => "Grupos",

/**
 * Users
 */

	'user' => "Habitante",
	'item:user' => "Habitantes",

/**
 * Friends
 */

	'friends' => "Contactos",
	'friends:yours' => "Tus Contactos",
	'friends:owned' => "Contactos de %s",
	'friend:add' => "Añadir a contacto",
	'friend:remove' => "Quitar contacto",

	'friends:add:successful' => "Se ha a&ntilde;adido a %s como contacto",
	'friends:add:failure' => "No se pudo a&ntilde;adir a %s como contacto. Por favor intente nuevamente",

	'friends:remove:successful' => "Se quit&oacute; a %s de tus contactos",
	'friends:remove:failure' => "No se pudo quitar a %s de tus contactos. Por favor intente nuevamente",

        'friends:none' => "No hay contactos, a&uacute;n...",
        'friends:none:you' => "No tienes contactos, a&uacute;n...",

	'friends:none:found' => "No se encontraron contactos",

	'friends:of:none' => "Nadie ha agregado a la habitante como contacto a&uacute;n",
	'friends:of:none:you' => "Nadie te ha agregado como contacto a&uacute;n. Comienza a a&ntilde;adir contenido y completar tu perfil para que la gente te encuentre!. Recuerda que tienes un módulo para invitar a cuentas de correo en tu panel de habitante.",

	'friends:of:owned' => "Contactos de %s",

	'friends:of' => "Contactos de",
	'friends:collections' => "Grupos de Contactos",
	'collections:add' => "Nueva colecci&oacute;n",
	'friends:collections:add' => "Nueva colecci&oacute;n de Contactos",
	'friends:addfriends' => "Seleccionar Contactos",
	'friends:collectionname' => "Nombre de la colecci&oacute;n",
	'friends:collectionfriends' => "Contactos en la colecci&oacute;n",
	'friends:collectionedit' => "Editar esta colecci&oacute;n",
	'friends:nocollections' => "No tienes colecciones a&uacute;n",
	'friends:collectiondeleted' => "La colecci&oacute;n ha sido eliminada",
	'friends:collectiondeletefailed' => "No se puede eliminar la colecci&oacute;n",
	'friends:collectionadded' => "La colecci&oacute;n se ha creado correctamente",
	'friends:nocollectionname' => "Debes ponerle un nombre a la colecci&oacute;n antes de crearla",
	'friends:collections:members' => "Miembros de esta colecci&oacute;n",
	'friends:collections:edit' => "Editar colecci&oacute;n",
	'friends:collections:edited' => "Colecci&oacute;n guardada",
	'friends:collection:edit_failed' => 'No se pudo guardar la colecci&oacute;n',

	'friendspicker:chararray' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',

	'avatar' => 'Imagen de perfil',
	'avatar:noaccess' => "No tienes permitido editar el avatar de otra habitante",
	'avatar:create' => 'Cree tu imagen de perfil',
	'avatar:edit' => 'Editar imagen de perfil',
	'avatar:preview' => 'Previsualizar',
	'avatar:upload' => 'Subir imagen para utilizar en el perfil',
	'avatar:current' => 'Avatar actual',
	'avatar:remove' => 'Borrar la imagen de perfil y sustituir por icono por defecto',
	'avatar:crop:title' => 'Herramienta de recorte de imagen de perfil',
	'avatar:upload:instructions' => "Ésta es la imagen de ti que se mostrará en la red. Puedes cambiarla cuando quieras (Formatos aceptados: GIF, JPG o PNG)",
	'avatar:create:instructions' => 'Haz click y arrastra un cuadrado debajo para seleccionar el recorte de la imagen. Aparecer&aacute; una previsualizaci&oacute;n en la caja de la derecha. Cuando est&eacute;s conforme con la previsualizaci&oacute;n, haz click en \'Crear imagen de perfil\'. La versi&oacute;n recortada ser&aacute; la que se utilice en la red',
	'avatar:upload:success' => 'Imagen de perfil subida correctamente',
	'avatar:upload:fail' => 'Fall&oacute; la subida de la imagen de perfil',
	'avatar:resize:fail' => 'Error al modificar el tama&ntilde;o de la imagen de perfil',
	'avatar:crop:success' => 'Recorte de la imagen de perfil finalizado correctamente',
	'avatar:crop:fail' => 'El recortado del avatar ha fallado',
	'avatar:remove:success' => 'Se ha eliminado el avatar',
	'avatar:remove:fail' => 'fall&oacute; al remover el avatar',

	'profile:edit' => 'Editar perfil',
	'profile:aboutme' => "Sobre mi:",
	'profile:description' => "Sobre mi",
	'profile:briefdescription' => "Descripci&oacute;n corta",
	'profile:location' => "Ubicaci&oacute;n",
	'profile:skills' => "Habilidades",
	'profile:interests' => "Intereses",
	'profile:contactemail' => "Email de contacto",
	'profile:phone' => "Tel&eacute;fono",
	'profile:mobile' => "M&oacute;vil",
	'profile:website' => "Sitio Web",
	'profile:twitter' => "Cuenta de Twitter",
	'profile:saved' => "Su perfil ha sido guardado correctamente",

	'profile:field:text' => 'Texto corto',
	'profile:field:longtext' => 'Area de texto largo',
	'profile:field:tags' => 'Etiquetas',
	'profile:field:url' => 'Direcci&oacute;n Web',
	'profile:field:email' => 'Direcci&oacute;n de email',
	'profile:field:location' => 'Ubicaci&oacute;n',
	'profile:field:date' => 'Fecha',

	'admin:appearance:profile_fields' => 'Editar campos de perfil',
	'profile:edit:default' => 'Editar campos de perfil',
	'profile:label' => "Etiqueta de perfil",
	'profile:type' => "Tipo de perfil",
	'profile:editdefault:delete:fail' => 'Se ha producido un error al eliminar el campo del perfil',
	'profile:editdefault:delete:success' => 'Item de perfil por defecto eliminado!',
	'profile:defaultprofile:reset' => 'Reinicio de perfil de sistema por defecto',
	'profile:resetdefault' => 'Reiniciar perfil de sistema por defecto',
	'profile:resetdefault:confirm' => 'Seguro que deseas borrar tu perfil?',
	'profile:explainchangefields' => "Puede reemplazar los campos de perfil existentes con los tuyos propios, utilizando el formulario de abajo. \n\n Ingrese un nuevo nombre de campo de perfil, por ejemplo, 'Equipo favorito', luego seleccione el tipo de campo (eg. texto, url, tags), y haga click en el bot&oacute;n de 'Agregar'. Para re ordenar los campos arrastre el control al lado de la etiqueta del campo. Para editar la etiqueta del campo haga click en el texto de la etiqueta para volverlo editable. \n\n Puede volver a la disposici&oacute;n original del perfil en cualquier momento, pero perder&aacute; la informaci&oacute;n creada en los campos personalizados del perfil hasta el momento",
	'profile:editdefault:success' => 'Elemento agregado al perfil por defecto correctamente',
	'profile:editdefault:fail' => 'No se pudo guardar el perfil por defecto',
	'profile:field_too_long' => 'No se pudo guardar la informaci&oacute;n del perfil debido a que la secci&oacute;n "%s" es demasiado larga.',
	'profile:noaccess' => "No tienes permiso para editar éste perfil.",
	'profile:invalid_email' => '«%s» debe ser una dirección de correo electrónico válida.',


/**
 * Feeds
 */
	'feed:rss' => 'Canal RSS para la p&aacute;gina',
/**
 * Links
 */
	'link:view' => 'Ver enlace',
	'link:view:all' => 'Ver todos',


/**
 * River
 */
	'river' => "River",
	'river:friend:user:default' => "%s se relaciona con %s",
	'river:update:user:avatar' => '%s tiene una nueva imagen de perfil',
	'river:update:user:profile' => '%s ha actualizado su perfil',
	'river:noaccess' => 'No posee permisos para visualizar éste elemento',
	'river:posted:generic' => '%s publicado',
	'riveritem:single:user' => 'una habitantes',
	'riveritem:plural:user' => 'algunas habitantes',
	'river:ingroup' => 'en el grupo %s',
	'river:none' => 'Sin actividad',
	'river:update' => 'Actualizaciones de %s',
	'river:delete' => 'Eliminar éste elemento de la actividad',
	'river:delete:success' => 'El elemento ha sido borrado',
	'river:delete:fail' => 'El elemento no pudo ser borrado',
	'river:subject:invalid_subject' => 'Habitante inválida',
	'activity:owner' => 'Ver Actividades',

	'river:widget:title' => "Actividades",
	'river:widget:description' => "Mostrar la &uacute;ltima actividad",
	'river:widget:type' => "Tipo de actividad",
	'river:widgets:friends' => 'Actividades de mis Contactos',
        'riger:widgets:tags' => 'Actividades de mis Etiquetas',
	'river:widgets:all' => 'Todas las actividades posible',

/**
 * Notifications
 */
	'notifications:usersettings' => "Configuraci&oacute;n de notifiaciones",
	'notification:method:email' => 'Correo electr&oacute;nico',

	'notifications:usersettings:save:ok' => "Su configuraci&oacute;n de notificaciones se guard&oacute; correctamente",
	'notifications:usersettings:save:fail' => "Ocurri&oacute; un error al guardar la configuraci&oacute;n de notificaciones",

	'notification:subject' => 'Notificaciones de %s',
	'notification:body' => 'Ver la nueva actividad en %s',

/**
 * Search
 */

	'search' => "Buscador",
	'searchtitle' => "Buscar: %s",
	'users:searchtitle' => "Buscar habitantes: %s",
	'groups:searchtitle' => "Buscar grupos: %s",
	'advancedsearchtitle' => "%s con coincidencias en resultados %s",
	'notfound' => "No se encontraron resultados",
	'next' => "Siguiente",
	'previous' => "Anterior",

	'viewtype:change' => "Modificar tipo de lista",
	'viewtype:list' => "Vista de lista",
	'viewtype:gallery' => "Galer&iacute;a",

	'tag:search:startblurb' => "Items con etiquetas que coincidan con '%s':",

	'user:search:startblurb' => "Habitantes que coincidan con '%s':",
	'user:search:finishblurb' => "Click aqu&iacute; para ver m&aacute;s",

	'group:search:startblurb' => "Grupos que coinciden con '%s':",
	'group:search:finishblurb' => "Click aqu&iacute; para ver m&aacute;s",
	'search:go' => 'Ir',
	'userpicker:only_friends' => 'S&oacute;lo Contactos',

/**
 * Account
 */

	'account' => "Cuenta",
	'settings' => "Configuraci&oacute;n",
	'tools' => "Herramientas",
	'settings:edit' => 'Editar configuraci&oacute;n',

	'register' => "Registrarse",
	'registerok' => "Se registr&oacute; correctamente para %s",
	'registerbad' => "No se pudo registrar debido a un error desconocido",
	'registerdisabled' => "El registro se deshabilit&oacute; por las administradoras del sistema",
	'register:fields' => 'Todos los campos son obligatorios',

	'registration:notemail' => 'No ha ingresado una direcci&oacute;n de Email v&aacute;lida',
	'registration:userexists' => 'La identidad de habitante ya existe',
	'registration:usernametooshort' => 'La identidad de habitante debe tener un m&iacute;nimo de %u caracteres',
	'registration:usernametoolong' => 'La identidad de habitante es demasiado larga. El m&aacute;ximo permitido es de %u caracteres.',
	'registration:passwordtooshort' => 'La contrase&ntilde;a debe tener un m&iacute;nimo de %u caracteres',
	'registration:dupeemail' => 'Utiliza otra direcci&oacute;n de correo',
	'registration:invalidchars' => 'Lo sentimos, su identidad de habitante posee los caracteres inv&aacute;lidos: %s. Estos son todos los caracteres que se encuentran invalidados, de momento: %s',
	'registration:emailnotvalid' => 'Lo sentimos, la direcci&oacute;n de email que ha ingresado es inv&aacute;lida en el sistema',
	'registration:passwordnotvalid' => 'Lo sentimos, la contrase&ntilde;a que ha ingresado es inv&aacute;lida en el sistema',
	'registration:usernamenotvalid' => 'Lo sentimos, la identidad de habitante que ha ingresado es inv&aacute;lida en el sistema',

	'adduser' => "Nueva habitante",
	'adduser:ok' => "Se agreg&oacute; correctamente una nueva habitante",
	'adduser:bad' => "No se pudo agregar a la habitante",

	'user:set:name' => "Configuraci&oacute;n del nombre de habitante",
	'user:name:label' => "Mi nombre para mostrar",
	'user:name:success' => "Se modific&oacute; correctamente su nombre en la red",
	'user:name:fail' => "No se pudo modificar su nombre en la red. Por favor, aseg&uacute;rese de que no es demasiado largo e intente nuevamente",

	'user:set:password' => "Contrase&ntilde;a de la cuenta",
	'user:current_password:label' => 'Contrase&ntilde;a actual',
	'user:password:label' => "Nueva contrase&ntilde;a",
	'user:password2:label' => "Confirmar nueva contrase&ntilde;a",
	'user:password:success' => "Contrase&ntilde;a modificada",
	'user:password:fail' => "No se pudo modificar la contrase&ntilde;a en la red",
	'user:password:fail:notsame' => "Las dos contrase&ntilde;as no coinciden!",
	'user:password:fail:tooshort' => "La contrase&ntilde;a es demasiado corta!",
	'user:password:fail:incorrect_current_password' => 'La contrase&ntilde;a actual ingresada es incorrecta',
	'user:changepassword:unknown_user' => 'Habitante inv&aacute;lida',
	'user:changepassword:change_password_confirm' => 'Esto cambiará su contraseña.',

	'user:set:language' => "Configuraci&oacute;n de lenguaje",
	'user:language:label' => "Su lenguaje",
	'user:language:success' => "Se actualiz&oacute; su configuraci&oacute;n de lenguaje",
	'user:language:fail' => "No se pudo actualizar su configuraci&oacute;n de lenguaje",

	'user:username:notfound' => 'No se encuentra la habitante %s',

	'user:password:lost' => 'Olvid&eacute; mi contrase&ntilde;a',
	'user:password:changereq:success' => 'Solicitud de nueva contrase&ntilde;a confirmada, se le ha enviado un Email',
	'user:password:changereq:fail' => 'No se pudo solicitar una nueva contrase&ntilde;a',

	'user:password:text' => 'Para solicitar una nueva contrase&ntilde;a ingrese su nombre de habitante y presione el bot&oacute;n debajo',

	'user:persistent' => 'Recordarme',

	'walled_garden:welcome' => 'Hola!',

/**
 * Administration
 */
	'menu:page:header:administer' => 'Administrar',
	'menu:page:header:configure' => 'Configurar',
	'menu:page:header:develop' => 'Desarrollar',
	'menu:page:header:default' => 'Otro',

	'admin:view_site' => 'Ver sitio',
	'admin:loggedin' => 'Sesi&oacute;n iniciada como %s',
	'admin:menu' => 'Men&uacute;',

	'admin:configuration:success' => "Su configuraci&oacute;n ha sido guardada",
	'admin:configuration:fail' => "No se pudo guardar su configuraci&oacute;n",
	'admin:configuration:dataroot:relative_path' => 'No se puede configurar "%s" como el directorio de datos raiz ya que la ruta no es absoluta.',
	'admin:configuration:default_limit' => 'El n&uacute;mero de elementos debe ser de al menos 1.',

	'admin:unknown_section' => 'Secci&oacute;n de administraci&oacute;n inv&aacute;lida',

	'admin' => "Administraci&oacute;n",
	'admin:description' => "El panel de administraci&oacute;n le permite organizar todos los aspectos del sistema, desde la gesti&oacute;n de Usuarias hasta el comportamiento de los plugins. Seleccione una opci&oacute;n debajo para comenzar",

	'admin:statistics' => "Estad&iacute;sticas",
	'admin:statistics:overview' => 'Resumen',
	'admin:statistics:server' => 'Informaci&oacute;n del servidor',
	'admin:statistics:cron' => 'Cron',
	'admin:cron:record' => 'Ultimos trabajos del Cron',
	'admin:cron:period' => 'Periodo Cron',
	'admin:cron:friendly' => 'Ultimo completado',
	'admin:cron:date' => 'Fecha y hora',

	'admin:appearance' => 'Apariencia',
	'admin:administer_utilities' => 'Utilidades',
	'admin:develop_utilities' => 'Utilidades',
	'admin:configure_utilities' => 'Utilidades',
	'admin:configure_utilities:robots' => 'Robots.txt',

	'admin:users' => "Habitantes",
	'admin:users:online' => 'Habitantes online',
	'admin:users:newest' => 'Las mas nuevas',
	'admin:users:admins' => 'Administradoras',
	'admin:users:add' => 'Agregar Nueva Habitante',
	'admin:users:description' => "Este panel de administraci&oacute;n le permite gestionar la configuraci&oacute;n de habitantes de la red. Seleccione una opci&oacute;n debajo para comenzar",
	'admin:users:adduser:label' => "Click aqu&iacute; para agregar un nueva habitante...",
	'admin:users:opt:linktext' => "Configurar habitantes...",
	'admin:users:opt:description' => "Configurar habitantes e informaci&oacute;n de cuentas",
	'admin:users:find' => 'Buscar',

	'admin:administer_utilities:maintenance' => 'Modo de Mantenimiento',
	'admin:upgrades' => 'Actualizaciones',

	'admin:settings' => 'Configuraci&oacute;n',
	'admin:settings:basic' => 'Configuraci&oacute;n B&aacute;sica',
	'admin:settings:advanced' => 'Configuraci&oacute;n Avanzada',
	'admin:site:description' => "Este panel de administraci&oacute;n le permite gestionar la configuraci&oacute;n global de la red. Selecciona una opci&oacute;n debajo para comenzar",
	'admin:site:opt:linktext' => "Configurar sitio..",
	'admin:settings:in_settings_file' => 'Esta opción se configura en settings.php',

	'admin:legend:security' => 'Seguridad',
	'admin:site:secret:intro' => 'Se utiliza una clave para crear tokens de seguridad para varios propósitos.',
	'admin:site:secret_regenerated' => "La clave secreta ha sido regenerada.",
	'admin:site:secret:regenerate' => "Regenerar clave secreta",
	'admin:site:secret:regenerate:help' => "Nota: Puede que regenerar el secreto del sitio suponga un inconveniente para algunas habitantes, ya que invalidará códigos usados para las cookies de la función de «Recuérdame», para solicitudes de validación de la dirección de correo electrónico, para códigos de invitación, etc.",
	'site_secret:current_strength' => 'Seguridad de la clave',
	'site_secret:strength:weak' => "Débil",
	'site_secret:strength_msg:weak' => "Nosotras recomendamos que regeneres tu clave secreta",
	'site_secret:strength:moderate' => "Moderado",
	'site_secret:strength_msg:moderate' => "Le recomendamos que regenere el secreto del sitio para una mayor seguridad.",
	'site_secret:strength:strong' => "Fuerte",
	'site_secret:strength_msg:strong' => "Tu clave secreta es suficientemente segura. No hay necesidad de regenerarla.",

	'admin:dashboard' => 'Panel de control',
	'admin:widget:online_users' => 'Habitantes online',
	'admin:widget:online_users:help' => 'Listar habitantes online',
	'admin:widget:new_users' => 'Nuevas habitantes',
	'admin:widget:new_users:help' => 'Lista las habitantes m&aacute;s nuevas',
	'admin:widget:banned_users' => 'Habitantes prohibidas',
	'admin:widget:banned_users:help' => 'Lista de habitantes prohibidas',
	'admin:widget:content_stats' => 'Estad&iacute;sticas de contenido',
	'admin:widget:content_stats:help' => 'Seguimiento del contenido creado por las habitantes de la red',
	'admin:widget:cron_status' => 'Estado de Cron',
	'admin:widget:cron_status:help' => 'Muestra el estado de la última ejecución de los trabajos de Cron',
	'widget:content_stats:type' => 'Tipo de contenido',
	'widget:content_stats:number' => 'N&uacute;mero',

	'admin:widget:admin_welcome' => 'Hola admin!',
	'admin:widget:admin_welcome:help' => "Esta es el &aacute;rea de administraci&oacute;n",
	'admin:widget:admin_welcome:intro' =>
'Hola! Se encuentra viendo el panel de control de la administraci&oacute;n. Se utiliza para visualizar las novedades de la red.',

	'admin:widget:admin_welcome:admin_overview' =>
"La navegaci&oacute;n para el &aacute;rea de administraci&oacute;n se encuentra en el men&uacute; de la derecha.",

	'admin:widget:admin_welcome:outro' => 'Si tienes dudas, verifica los recursos disponibles en los enlaces del pi&eacute; de p&aacute;gina o contacta con otras administradoras de redes similares para que te asesoren.',

	'admin:widget:control_panel' => 'Panel de control',
	'admin:widget:control_panel:help' => "Provee un acceso f&aacute;cil a los controles",

	'admin:cache:flush' => 'Limpiar la cache',
	'admin:cache:flushed' => "La cache del sitio ha sido limpiada",

	'admin:footer:faq' => 'FAQs de Administraci&oacute;n',
	'admin:footer:manual' => 'Manual de Administraci&oacute;n',
	'admin:footer:community_forums' => 'Foros de la Comunidad Elgg',
	'admin:footer:blog' => 'Blog Elgg',

	'admin:plugins:category:all' => 'Todos los plugins',
	'admin:plugins:category:active' => 'Plugins activos',
	'admin:plugins:category:inactive' => 'Plugins inactivos',
	'admin:plugins:category:admin' => 'Admin',
	'admin:plugins:category:bundled' => 'Inclu&iacute;do',
	'admin:plugins:category:nonbundled' => 'No integrado',
	'admin:plugins:category:content' => 'Contenido',
	'admin:plugins:category:development' => 'Desarrollo',
	'admin:plugins:category:enhancement' => 'Mejoras',
	'admin:plugins:category:api' => 'Servicio/API',
	'admin:plugins:category:communication' => 'Comunicaci&oacute;n',
	'admin:plugins:category:security' => 'Seguridad y Spam',
	'admin:plugins:category:social' => 'Social',
	'admin:plugins:category:multimedia' => 'Multimedia',
	'admin:plugins:category:theme' => 'Temas',
	'admin:plugins:category:widget' => 'Módulos',
	'admin:plugins:category:utility' => 'Utilidades',

	'admin:plugins:markdown:unknown_plugin' => 'Plugin desconocido',
	'admin:plugins:markdown:unknown_file' => 'Archivo desconocido',

	'admin:notices:could_not_delete' => 'La notificaci&oacute;n no se pudo eliminar',
	'item:object:admin_notice' => 'Nota de administración',

	'admin:options' => 'Opciones de Admin',

/**
 * Plugins
 */

	'plugins:disabled' => 'Los plugins no se han cargado porque un fichero llamado "disabled" se encuentra en el directorio mod.',
	'plugins:settings:save:ok' => "Configuraci&oacute;n para el plugin %s guardada correctamente",
	'plugins:settings:save:fail' => "Ocurri&oacute; un error al intentar guardar la configuraci&oacute;n para el plugin %s",
	'plugins:usersettings:save:ok' => "Configuraci&oacute;n dla usuaria para el plugin %s guardada",
	'plugins:usersettings:save:fail' => "Ocurri&oacute; un error al intentar guardar la configuraci&oacute;n dla usuaria para el plugin %s",
	'item:object:plugin' => 'Plugins',

	'admin:plugins' => "Plugins",
	'admin:plugins:activate_all' => 'Activar todos',
	'admin:plugins:deactivate_all' => 'Desactivar todos',
	'admin:plugins:activate' => 'Activar',
	'admin:plugins:deactivate' => 'Desactivar',
	'admin:plugins:description' => "Este panel le permite controlar y configurar las herramientas instaladas",
	'admin:plugins:opt:linktext' => "Configurar herramientas..",
	'admin:plugins:opt:description' => "Configurar las herramientas instaladas. ",
	'admin:plugins:label:author' => "Autor",
	'admin:plugins:label:copyright' => "Copyright",
	'admin:plugins:label:categories' => 'Categor&iacute;as',
	'admin:plugins:label:licence' => "Licencia",
	'admin:plugins:label:website' => "URL",
	'admin:plugins:label:repository' => "C&oacute;digo",
	'admin:plugins:label:bugtracker' => "Reportar problema",
	'admin:plugins:label:donate' => "Donar",
	'admin:plugins:label:moreinfo' => 'mas informaci&oacute;n',
	'admin:plugins:label:version' => 'Versi&oacute;n',
	'admin:plugins:label:location' => 'Ubicacion',
	'admin:plugins:label:contributors' => 'Colaboradoras',
	'admin:plugins:label:contributors:name' => 'Nombre',
	'admin:plugins:label:contributors:email' => 'Correo Electrónico',
	'admin:plugins:label:contributors:website' => 'Sitio Web',
	'admin:plugins:label:contributors:username' => 'Identidad en la Comunidad',
	'admin:plugins:label:contributors:description' => 'Descripci&oacute;n completa',
	'admin:plugins:label:dependencies' => 'Dependencias',

	'admin:plugins:warning:elgg_version_unknown' => 'Este plugin utiliza un archivo de manifiesto obsoleto y no especifica una versi&oacute;n de compatible. Es muy probable que no funcione!',
	'admin:plugins:warning:unmet_dependencies' => 'Este plugin tiene dependencias desconocidas y no se activar&aacute;. Consulte las dependencias debajo de mas informaci&oacute;n',
	'admin:plugins:warning:invalid' => '%s no es un plugin v&aacute;lido.',
	'admin:plugins:warning:invalid:check_docs' => 'Revisa la documentaci&oacute;n',
	'admin:plugins:cannot_activate' => 'no se puede activar',

	'admin:plugins:set_priority:yes' => "Reordenar %s",
	'admin:plugins:set_priority:no' => "No se puede reordenar %s",
	'admin:plugins:set_priority:no_with_msg' => "No se pudo reordenar %s. Error: %s",
	'admin:plugins:deactivate:yes' => "Desactivar %s",
	'admin:plugins:deactivate:no' => "No se puede desactivar %s",
	'admin:plugins:deactivate:no_with_msg' => "Mo se pudo desactivar %s. Error: %s",
	'admin:plugins:activate:yes' => "Activado %s",
	'admin:plugins:activate:no' => "No se puede activar %s",
	'admin:plugins:activate:no_with_msg' => "No se pudo activar %s. Error: %s",
	'admin:plugins:categories:all' => 'Todas las categor&iacute;as',
	'admin:plugins:plugin_website' => 'Sitio del plugin',
	'admin:plugins:author' => '%s',
	'admin:plugins:version' => 'Versi&oacute;n %s',
	'admin:plugin_settings' => 'Configuraci&oacute;n del plugin',
	'admin:plugins:warning:unmet_dependencies_active' => 'El plugin se encuentra activo pero posee dependencias desconocidas. Puede que se encuentren problemas en su funcionamiento. Vea "mas informaci&oacute;n" debajo para detalles',

	'admin:plugins:dependencies:type' => 'Tipo',
	'admin:plugins:dependencies:name' => 'Nombre',
	'admin:plugins:dependencies:expected_value' => 'Valor de Test',
	'admin:plugins:dependencies:local_value' => 'Valor Actual',
	'admin:plugins:dependencies:comment' => 'Comentario',

	'admin:statistics:description' => "Este es un resumen de las estad&iacute;sticas del sitio. Si necesita estad&iacute;sticas mas avanzadas, hay disponible una funcionalidad de administraci&oacute;n profesional",
	'admin:statistics:opt:description' => "Ver informaci&oacute;n estad&iacute;stica sobre habitantes y objetos en la red",
	'admin:statistics:opt:linktext' => "Ver estad&iacute;sticas..",
	'admin:statistics:label:basic' => "Estad&iacute;sticas b&aacute;sicas",
	'admin:statistics:label:numentities' => "Entidades",
	'admin:statistics:label:numusers' => "Cantidad de habitantes",
	'admin:statistics:label:numonline' => "Cantidad de habitantes online",
	'admin:statistics:label:onlineusers' => "Habitantes online ahora mismo",
	'admin:statistics:label:admins'=>"Administradoras",
	'admin:statistics:label:version' => "Versi&oacute;n de Core/Elgg",
	'admin:statistics:label:version:release' => "Release",
	'admin:statistics:label:version:version' => "Versi&oacute;n",

	'admin:server:label:php' => 'PHP',
	'admin:server:label:web_server' => 'Servidor Web',
	'admin:server:label:server' => 'Servidor',
	'admin:server:label:log_location' => 'Localizaci&oacute;n de los registros',
	'admin:server:label:php_version' => 'Versi&oacute;n de PHP',
	'admin:server:label:php_ini' => 'Ubicaci&oacute;n del archivo PHP ini',
	'admin:server:label:php_log' => 'Registros de PHP',
	'admin:server:label:mem_avail' => 'Memoria disponible',
	'admin:server:label:mem_used' => 'Memoria usada',
	'admin:server:error_log' => "Registro de errores del servidor Web",
	'admin:server:label:post_max_size' => 'Tama&ntilde;o m&aacute;ximo de las peticiones POST',
	'admin:server:label:upload_max_filesize' => 'Tama&ntilde; m&aacute;ximo de las subidas',
	'admin:server:warning:post_max_too_small' => '(Nota: post_max_size debe ser mayor que el tama&ntilde; indicado aqu&iacute; para habilitar las subidas)',

	'admin:user:label:search' => "Encontrar Habitantes:",
	'admin:user:label:searchbutton' => "Buscar",

	'admin:user:ban:no' => "No puede bloquear a la habitante",
	'admin:user:ban:yes' => "Habitante bloqueada",
	'admin:user:self:ban:no' => "No puede bloquearse a usted mismo ;-)",
	'admin:user:unban:no' => "No puede desbloquear a la habitante",
	'admin:user:unban:yes' => "Habitante desbloqueada",
	'admin:user:delete:no' => "No puede eliminar a la habitante",
	'admin:user:delete:yes' => "la habitante %s ha sido eliminada",
	'admin:user:self:delete:no' => "No puede eliminarse a usted mismo",

	'admin:user:resetpassword:yes' => "Contrase&ntilde;a restablecida, se notifica a la habitante",
	'admin:user:resetpassword:no' => "No se puede restablecer la contrase&ntilde;a",

	'admin:user:makeadmin:yes' => "la habitante ahora es un administradora",
	'admin:user:makeadmin:no' => "No se pudo establecer a la habitante como administradora",

	'admin:user:removeadmin:yes' => "la habitante ya no es administradora",
	'admin:user:removeadmin:no' => "No se pueden quitar los privilegios de administradora de esta habitante",
	'admin:user:self:removeadmin:no' => "No puede quitar los privilegios de administradora",

	'admin:appearance:menu_items' => 'Elementos del Men&uacute;',
	'admin:menu_items:configure' => 'Configurar los elementos del men&uacute; principal',
	'admin:menu_items:description' => 'Seleccione qu&eacute; elementos del men&uacute; desea mostrar como enlaces favoritos. Los items no utilizados se encontrar&aacute;n en el item "Mas" al final de la lista',
	'admin:menu_items:hide_toolbar_entries' => 'Quitar enlaces del men&uacute; de la barra de herramientas?',
	'admin:menu_items:saved' => 'Elementos del men&uacute; guardados',
	'admin:add_menu_item' => 'Agregar un elemento del men&uacute; personalizado',
	'admin:add_menu_item:description' => 'Complete el nombre para mostrar y la direcci&oacute;n url para agregar un elemento de men&uacute; personalizado',

	'admin:appearance:default_widgets' => 'Módulos por defecto',
	'admin:default_widgets:unknown_type' => 'Tipo de módulo desconocido',
	'admin:default_widgets:instructions' => 'Agregar, quitar, mover y configurar los módulos por defecto en la p&aacute;gina de móduloseleccionada',

	'admin:robots.txt:instructions' => "Editar el fichero robots.txt de la red",
	'admin:robots.txt:plugins' => "Plugins estan agregando lo siguiente al archivo robots.txt",
	'admin:robots.txt:subdir' => "La herramienta de robots.txt no funcionara por que la red esta instalada en un sub-directorio",
	'admin:robots.txt:physical' => "La herramienta robots.txt no funcionará porque existe físicamente un archivo robots.txt",

	'admin:maintenance_mode:default_message' => 'La red no está disponible por labores de mantenimiento',
	'admin:maintenance_mode:instructions' => 'El Modo de Mantenimiento solo debe ser usado para actualizaciones y otros cambios de importancia.
Cuando este modo esta activado, solo las administradoras pueden ingresar y ver la red',
	'admin:maintenance_mode:mode_label' => 'Modo de Mantenimiento',
	'admin:maintenance_mode:message_label' => 'Mensaje que se mostrará a las habitantes cuando el modo de mantenimiento este activado',
	'admin:maintenance_mode:saved' => 'Las configuraciones del modo de mantenimiento fueron guardadas',
	'admin:maintenance_mode:indicator_menu_item' => 'La red esta en modo de mantenimiento',
	'admin:login' => 'Entrada de Administradoras',

/**
 * User settings
 */
		
	'usersettings:description' => "El panel de configuraci&oacute;n permite parametrizar las preferencias personales, desde la administraci&oacute;n de habitantes, al comportamiento de los plugins. Seleccione una opci&oacute;n debajo para comenzar",

	'usersettings:statistics' => "Tus estad&iacute;sticas",
	'usersettings:statistics:opt:description' => "Ver informaci&oacute;n estad&iacute;stica de habitantes y objetos en la red",
	'usersettings:statistics:opt:linktext' => "Estad&iacute;sticas de la cuenta",

	'usersettings:user' => "Tus preferencias",
	'usersettings:user:opt:description' => "Esto te permite establecer tus preferencias",
	'usersettings:user:opt:linktext' => "Modificar tus preferencias",

	'usersettings:plugins' => "Herramientas",
	'usersettings:plugins:opt:description' => "Preferencias de Configuraci&oacute;n para tus herramientas activas",
	'usersettings:plugins:opt:linktext' => "Configura tus herramientas",

	'usersettings:plugins:description' => "Este panel te permite establecer tus preferencias personales para las herramientas habilitadas por la administradora del sistema",
	'usersettings:statistics:label:numentities' => "Su contenido",

	'usersettings:statistics:yourdetails' => "Tus detalles",
	'usersettings:statistics:label:name' => "Nombre completo",
	'usersettings:statistics:label:email' => "Email",
	'usersettings:statistics:label:membersince' => "Habitante desde",
	'usersettings:statistics:label:lastlogin' => "&uacute;ltimo acceso",

/**
 * Activity river
 */
		
	'river:all' => 'Actividades de toda la red',
	'river:mine' => 'Mis actividades',
	'river:owner' => 'Actividades de %s',
	'river:friends' => 'Actividades de mis contactos',
        'river:tags' => 'Actividades de mis etiquetas',
	'river:select' => 'Mostrar %s',
	'river:comments:more' => '%u m&aacute;s',
	'river:comments:all' => 'Ver todos los comentarios de %u',
	'river:generic_comment' => 'comentado en %s %s',

	'friends:widget:description' => "Muestra algunos de tus contactos",
	'friends:num_display' => "Cantidad de Contactos a mostrar",
	'friends:icon_size' => "Tama&ntilde;o del &iacute;cono",
	'friends:tiny' => "peque&ntilde;o",
	'friends:small' => "diminuto",

/**
 * Icons
 */

	'icon:size' => "Tama&ntilde;o del &iacute;cono",
	'icon:size:topbar' => "Barra principal",
	'icon:size:tiny' => "Diminuto",
	'icon:size:small' => "Pequeño",
	'icon:size:medium' => "Mediano",
	'icon:size:large' => "Grande",
	'icon:size:master' => "Enorme",
		
/**
 * Generic action words
 */

	'save' => "Guardar",
	'reset' => 'Reiniciar',
	'publish' => "Publicar",
	'cancel' => "Cancelar",
	'saving' => "Guardando...",
	'update' => "Actualizar",
	'preview' => "Previsualizar",
	'edit' => "Editar",
	'delete' => "Eliminar",
	'accept' => "Aceptar",
	'reject' => "Rechazar",
	'decline' => "Declinar",
	'approve' => "Aprobar",
	'activate' => "Activar",
	'deactivate' => "Desactivar",
	'disapprove' => "Desaprobar",
	'revoke' => "Revocar",
	'load' => "Cargar",
	'upload' => "Subir",
	'download' => "Descargar",
	'ban' => "Bloquear",
	'unban' => "Desbloquar",
	'banned' => "Bloqueado",
	'enable' => "Habilitar",
	'disable' => "Deshabilitar",
	'request' => "Solicitud",
	'complete' => "Completa",
	'open' => 'Abrir',
	'close' => 'Cerrar',
	'hide' => 'Ocultar',
	'show' => 'Mostrar',
	'reply' => "Responder",
	'more' => 'M&aacute;s',
	'more_info' => 'M&aacute;s informaci&oacute;n',
	'comments' => ' con comentarios',
	'import' => 'Importar',
	'export' => 'Exportar',
	'untitled' => 'Sin T&iacute;tulo',
	'help' => 'Ayuda',
	'send' => 'Enviar',
	'post' => 'Publicar',
	'submit' => 'Enviar',
	'comment' => 'Comentar',
	'upgrade' => 'Actualizar',
	'sort' => 'Ordenar',
	'filter' => 'Filtrar',
	'new' => 'Nuevo',
	'add' => 'Añadir',
	'create' => 'Crear',
	'remove' => 'Remover',
	'revert' => 'Revertir',

	'site' => 'Lugar',
	'activity' => 'Actividad',
	'members' => 'Habitantes',
	'menu' => 'Men&uacute;',

	'up' => 'Arriba',
	'down' => 'Abajo',
	'top' => 'Primero',
	'bottom' => '&Uacute;ltimo',
	'right' => 'Derecha',
	'left' => 'Izquierda',
	'back' => 'Atr&aacute;s',

	'invite' => "Invitar",

	'resetpassword' => "Restablecer contrase&ntilde;a",
	'changepassword' => "Cambiar contraseña",
	'makeadmin' => "Hacer administradora",
	'removeadmin' => "Quitar de administradora",

	'option:yes' => "S&iacute;",
	'option:no' => "No",

	'unknown' => 'Desconocido',
	'never' => 'Nunca',

	'active' => 'Activo',
	'total' => 'Total',
	
	'ok' => 'OK',
	'any' => 'Cualquiera',
	'error' => 'Error',
	
	'other' => 'Otro',
	'options' => 'Opciones',
	'advanced' => 'Avanzado',

	'learnmore' => "Click aqu&iacute; para ver m&aacute;s",
	'unknown_error' => 'Error desconocido',

	'content' => "contenido",
	'content:latest' => '&uacute;ltima actividad',
	'content:latest:blurb' => 'Alternativamente, click aqu&iacute; para ver el &uacute;ltimo contenido en toda la red',

	'link:text' => 'ver enlace',
	
/**
 * Generic questions
 */

	'question:areyousure' => '¿Está segura?',

/**
 * Status
 */

	'status' => 'Estado',
	'status:unsaved_draft' => 'Borrador sin guardar',
	'status:draft' => 'Borrador',
	'status:unpublished' => 'Sin Publicar',
	'status:published' => 'Publicado',
	'status:featured' => 'Destacadas',
	'status:open' => 'Abierto',
	'status:closed' => 'Cerrado',

/**
 * Generic sorts
 */

	'sort:newest' => '&Uacute;ltimos',
	'sort:popular' => 'Populares',
	'sort:alpha' => 'Alfab&eacute;tico',
	'sort:priority' => 'Prioridad',
		
/**
 * Generic data words
 */

	'title' => "T&iacute;tulo",
	'description' => "Descripci&oacute;n",
	'tags' => "Etiquetas",
	'all' => "Todas",
	'mine' => "M&iacute;as",

	'by' => 'por',
	'none' => 'nada',

	'annotations' => "Anotaciones",
	'relationships' => "Relaciones",
	'metadata' => "Metadatos",
	'tagcloud' => "Nube de etiquetas",

	'on' => 'Habilitado',
	'off' => 'Deshabilitado',

/**
 * Entity actions
 */
		
	'edit:this' => 'Editar',
	'delete:this' => 'Eliminar',
	'comment:this' => 'Comentar',

/**
 * Input / output strings
 */

	'deleteconfirm' => "Est&aacute; seguro de querer eliminar este item?",
	'deleteconfirm:plural' => "&ntilde;Seguro que deseas borrar estos elementos?",
	'fileexists' => "El archivo ya se ha subido. Para reemplazarlo, seleccione:",

/**
 * User add
 */

	'useradd:subject' => 'Identidad de habitante creada',
	'useradd:body' => '
 %s,
 
Su identidad de habitante ha sido creada en %s. Para iniciar sesi&oacute;n visite:
 
 %s
 
Y utilice las siguientes credenciales:
 
 Habitante: %s
 Password: %s
 
Una vez autenticada, la recomendamos que modifique su contrase&ntilde;a.
 ',

/**
 * System messages
 */

	'systemmessages:dismiss' => "click para cerrar",


/**
 * Import / export
 */
		
	'importsuccess' => "Importado con &eacute;xito",
	'importfail' => "Error al importar datos de OpenDD",

/**
 * Time
 */

	'friendlytime:justnow' => "ahora",
	'friendlytime:minutes' => "hace %s minutos",
	'friendlytime:minutes:singular' => "hace un minuto",
	'friendlytime:hours' => "hace %s horas",
	'friendlytime:hours:singular' => "hace una hora",
	'friendlytime:days' => "hace %s d&iacute;as",
	'friendlytime:days:singular' => "ayer",
	'friendlytime:date_format' => 'j F Y @ g:ia',
	
	'friendlytime:future:minutes' => "en %s minutos",
	'friendlytime:future:minutes:singular' => "en un minuto",
	'friendlytime:future:hours' => "en %s horas",
	'friendlytime:future:hours:singular' => "en una hora",
	'friendlytime:future:days' => "en %s días",
	'friendlytime:future:days:singular' => "mañana",

	'date:month:01' => 'Enero %s',
	'date:month:02' => 'Febrero %s',
	'date:month:03' => 'Marzo %s',
	'date:month:04' => 'Abril %s',
	'date:month:05' => 'Mayo %s',
	'date:month:06' => 'Junio %s',
	'date:month:07' => 'Julio %s',
	'date:month:08' => 'Agosto %s',
	'date:month:09' => 'Septiembre %s',
	'date:month:10' => 'Octubre %s',
	'date:month:11' => 'Noviembre %s',
	'date:month:12' => 'Diciembre %s',

	'date:weekday:0' => 'Domingo',
	'date:weekday:1' => 'Lunes',
	'date:weekday:2' => 'Martes',
	'date:weekday:3' => 'Miércoles',
	'date:weekday:4' => 'Jueves',
	'date:weekday:5' => 'Viernes',
	'date:weekday:6' => 'Sábado',
	
	'interval:minute' => 'Cada minuto',
	'interval:fiveminute' => 'Cada cinco minutos',
	'interval:fifteenmin' => 'Cada quince minutos',
	'interval:halfhour' => 'Cada media hora',
	'interval:hourly' => 'Cada hora',
	'interval:daily' => 'Diario',
	'interval:weekly' => 'Semanal',
	'interval:monthly' => 'Mensual',
	'interval:yearly' => 'Anual',
	'interval:reboot' => 'Cada reinicio',

/**
 * System settings
 */

	'installation:sitename' => "El nombre de la red:",
	'installation:sitedescription' => "Breve descripci&oacute;n de la red (opcional):",
	'installation:wwwroot' => "URL de la red:",
	'installation:path' => "El path completo a la instalaci&oacute;n:",
	'installation:dataroot' => "El path completo al directorio de datos:",
	'installation:dataroot:warning' => "Debe crear este directorio manualmente. Debe encontrarse en un directorio diferente al de la instalaci&oacute;n",
	'installation:sitepermissions' => "Permisos de acceso por defecto:",
	'installation:language' => "Lenguaje por defecto:",
	'installation:debug' => "El modo Debug provee informaci&oacute;n extra que puede utilizarse para evaluar eventualidades. Puede relentizar el funcionamiento del sistema y debe utilizarse s&oacute;lo cuando se detectan problemas:",
	'installation:debug:label' => "Nivel del registro:",
	'installation:debug:none' => 'Desactivar modo Debug (recomendado!)',
	'installation:debug:error' => 'Mostrar s&oacute;lo errores cr&iacute;ticos',
	'installation:debug:warning' => 'Mostrar s&oacute;lo alertas cr&iacute;ticas',
	'installation:debug:notice' => 'Mostrar todos los errores, alertas e informaciones de eventos',
	'installation:debug:info' => 'Registrar todo',

	// Walled Garden support
	'installation:registration:description' => 'El registro de habitante se encuentra habilitado por defecto. Puede deshabilitarlo para impedir que nuevas habitantes se registren por s&iacute; mismas',
	'installation:registration:label' => 'Permitir el registro de nuevas habitantes',
	'installation:walled_garden:description' => 'Habilitar la red como privada. Esto impedir&aacute; a las habitantes no registradas visualizar cualquier p&aacute;gina del sitio, exceptuando las establecidas como p&uacute;blicas',
	'installation:walled_garden:label' => 'Restringir p&aacute;ginas a habitantes registrados',

	'installation:httpslogin' => "Habilitar esta opci&oacute;n para que las habitantes se autentiquen mediante HTTPS. Necesitar&aacute; habilitar HTTPS en el server tambi&eacute;n para que esto funcione",
	'installation:httpslogin:label' => "Habilitar autenticaci&oacute;n HTTPS",
	'installation:view' => "Ingrese la vista que se visualizar&aacute; por defecto en la red o deje esto en blanco para la vista por defecto (si tiene dudas, d&eacute;jelo por defecto):",

	'installation:siteemail' => "Direcci&oacute;n de Email (utilizada para enviar mails desde el sistema):",
	'installation:default_limit' => "N&uacute;mero por defecto de elementos por p&aacute;gina",

	'admin:site:access:warning' => "Las modificaciones en el control de accesos s&oacute;lo tendr&aacute; impacto en los accesos futuros",
	'installation:allow_user_default_access:description' => "Si se selecciona, se les permitir&aacute; a los Usuarias establecer su propio nivel de acceso por defecto que puede sobreescribir los niveles de acceso del sistema",
	'installation:allow_user_default_access:label' => "Permitir el acceso por defecto de los Usuarias",

	'installation:simplecache:description' => "La cache simple aumenta el rentimiento almacenando contenido est&aacute;tico, como hojas CSS y archivos JavaScript. Normalmente se desea esto activado",
	'installation:simplecache:label' => "Utilizar cache simple (recomendado)",

	'installation:minify:description' => "El simple cache puede también mejorar el rendimiento por que comprime los archivos JavaScript y CSS. (Requiere que simple cache este habilitado.)",
	'installation:minify_js:label' => "Comprimir JavaScript (recomendado)",
	'installation:minify_css:label' => "Comprimir CSS (recomendado)",

	'installation:htaccess:needs_upgrade' => "Debe actualizar el archivo .htaccess",
	'installation:htaccess:localhost:connectionfailed' => "Asegúrese de que «curl» está funcionando, y de que no existen restricciones por dirección IP que impidan las conexiones locales al propio servidor (localhost).",
	
	'installation:systemcache:description' => "La cache del sistema decrece el tiempo de carga a trav&eacute;s de cachear los ficheros de datos.",
	'installation:systemcache:label' => "Usar cache del sistema (recomendado!)",

	'admin:legend:system' => 'Sistema',
	'admin:legend:caching' => 'Caché',
	'admin:legend:content_access' => 'Acceso del Contenido',
	'admin:legend:site_access' => 'Acceso de la Red',
	'admin:legend:debug' => 'Depuración y registro',

	'upgrading' => 'Actualizando...',
	'upgrade:db' => 'La base de datos ha sido actualizada',
	'upgrade:core' => 'La instalaci&oacute;n ha sido actualizada',
	'upgrade:unlock' => 'Unlock upgrade',
	'upgrade:unlock:confirm' => "La base de datos está bloqueada para otra actualización. Ejecutar varias actualizaciones concurrentemente es peligroso. Solo debes continuar si sabes que no hay otra actualización corriendo. Desbloquear?",
	'upgrade:locked' => "Cannot upgrade. Another upgrade is running. To clear the upgrade lock, visit the Admin section.",
	'upgrade:unlock:success' => "Desbloqueo de Actualización exitoso.",
	'upgrade:unable_to_upgrade' => 'No se puede actualizar',
	'upgrade:unable_to_upgrade_info' =>
		'Esta versión no se puede actualizar debido a que se detectaron vistas legadas de otras versiones en el directorio de las vistas del core. Estas vistas son obsoletas y tienen que ser eliminadas para el correcto funcionamiento. Si no has hecho cambios en el core, puedes simplemente eliminar el directorio de vistas y reemplazarlo con dicho directorio de uno de los paquetes más recientes.',

	'update:twitter_api:deactivated' => 'La API de Twitter se ha desactivado durante la actualizaci&oacute;n. Por favor act&iacute;vela manualmente si se requiere',
	'update:oauth_api:deactivated' => 'La API OAuth se ha desactivado durante la actualizaci&oacute;n. Por favor act&iacute;vela manualmente si se requiere',
	'upgrade:site_secret_warning:moderate' => "Te recomendamos que regeneres la clave de la red para mejorar la seguridad del sistema. Ver Configuración &gt; Preferencias &gt; Avanzado",
	'upgrade:site_secret_warning:weak' => "Te recomendamos que regeneres la clave de la red para mejorar la seguridad del sistema. Ver Configuración &gt; Preferencias &gt; Avanzado",

	'deprecated:function' => '%s() ha quedado obsoleta por %s()',

	'admin:pending_upgrades' => 'La red tiene actualizaciones pendientes que requieren tu atención inmediata',
	'admin:view_upgrades' => 'Ver actualizaciones pendientes',
 	'admin:upgrades' => 'Actualizaciones',
	'item:object:elgg_upgrade' => 'Actualizaciones del sitio',
	'admin:upgrades:none' => 'Tu instalación esta al día!',

	'upgrade:item_count' => 'Hay <b>%s</b> elementos que es necesario actualizar.',
	'upgrade:warning' => '<b>Aviso:</b> ¡En un sitio grande esta actualización puede llevar un tiempo significativo!',
	'upgrade:success_count' => 'Actualizado:',
	'upgrade:error_count' => 'Errores:',
	'upgrade:river_update_failed' => 'No fue posible actualizar la entrada del River para el elemento con identificador «%s».',
	'upgrade:timestamp_update_failed' => 'No fue posible actualizar los tiempos del elemento con identificador «%s».',
	'upgrade:finished' => 'Se completó la actualización.',
	'upgrade:finished_with_errors' => '<p>Ocurrieron errores durante la actualización. Actualice la página y pruebe a ejecutar la actualización de nuevo.</p></p><br />
Si el error se repite, busque la causa en el registro de errores del servidor.',

	// Strings specific for the comments upgrade
	'admin:upgrades:comments' => 'Actualización de comentarios',
	'upgrade:comment:create_failed' => 'No fue posible convertir el comentario con identificador «%s» en una entidad.',
	'admin:upgrades:commentaccess' => 'Actualizar el acceso a comentarios',

	// Strings specific for the datadir upgrade
	'admin:upgrades:datadirs' => 'Actualización de la carpeta de datos',

	// Strings specific for the discussion reply upgrade
	'admin:upgrades:discussion_replies' => 'Actualización de las respuestas de discusiones',
	'discussion:upgrade:replies:create_failed' => 'No fue posible convertir la respuesta de discusión con identificador «%s» en una entidad.',

/**
 * Welcome
 */

	'welcome' => "Hola",
	'welcome:user' => 'Hola %s!',

/**
 * Emails
 */
		
	'email:from' => 'De',
	'email:to' => 'Para',
	'email:subject' => 'Asunto',
	'email:body' => 'Cuerpo',
	
	'email:settings' => "Configuraci&oacute;n de Email",
	'email:address:label' => "Direcci&oacute;n de Email",

	'email:save:success' => "Nueva direcci&oacute;n de correo salvada.",
	'email:save:fail' => "No se pudo guardar la nueva direcci&oacute;n de Email",

	'friend:newfriend:subject' => "%s quiere relacionarse contigo!",
	'friend:newfriend:body' => "%s ha comenzado una relaci&oacute;n contigo!
 
Para visualizar su perfil haz click aqu&iacute;:
 
 %s
 
Por favor no respondas a este mail",

	'email:changepassword:subject' => "Contraseña cambiada!",
	'email:changepassword:body' => "Hola %s!,

Tu contraseña ha sido cambiada.",

	'email:resetpassword:subject' => "Contrase&ntilde;a restablecida!",
	'email:resetpassword:body' => "Hola %s!,
 
Tu contrase&ntilde;a ha sido restablecida a: %s",

	'email:changereq:subject' => "Solicitud de cambio de contraseña.",
	'email:changereq:body' => "Hola %s!,

Alguien (desde la dirección IP %s) ha solicitado un cambio de contraseña para tu cuenta.

Si has sido tu, utiliza el enlace inferior. Si no es así, puedes ignorar este mensaje y avisar del suceso si lo consideras importante.

%s
",

/**
 * user default access
 */

	'default_access:settings' => "Tu nivel de acceso por defecto",
	'default_access:label' => "Acceso por defecto",
	'user:default_access:success' => "El nivel de acceso por defecto ha sido guardado",
	'user:default_access:failure' => "El nivel de acceso por defecto no ha podido ser guardado",

/**
 * Comments
 */

	'comments:count' => "%s comentarios",
	'item:object:comment' => 'Comentarios',

	'river:comment:object:default' => '%s comentado en %s',

	'generic_comments:add' => "Comentar",
	'generic_comments:edit' => "Editar comentario",
	'generic_comments:post' => "Publicar un comentario",
	'generic_comments:text' => "Comentar",
	'generic_comments:latest' => "&Uacute;ltimos comentarios",
	'generic_comment:posted' => "Se ha publicado su comentario",
	'generic_comment:updated' => "El comentario fué cambiado éxitosamente.",
	'generic_comment:deleted' => "Se ha quitado su comentario",
	'generic_comment:blank' => "Lo sentimos, debe ingresar alg&uacute;n comentario antes de poder guardarlo",
	'generic_comment:notfound' => "Lo sentimos. No hemos encontrado el comentario especificado.",
	'generic_comment:notfound_fallback' => "Lo sentimos. No hemos encontrado el comentario especificado, pero te hemos redirigido a la página donde se comentó.",
	'generic_comment:notdeleted' => "Lo sentimos, no se pudo eliminar el comentario",
	'generic_comment:failure' => "Un error no especificado ocurrió al guardar el comentario.",
	'generic_comment:none' => 'Sin comentarios',
	'generic_comment:title' => 'Comentario de %s',
	'generic_comment:on' => '%s on %s',
	'generic_comments:latest:posted' => 'Publicó un',

	'generic_comment:email:subject' => 'Tienes un nuevo comentario!',
	'generic_comment:email:body' => "Tiene un nuevo comentario en \"%s\" de %s. Dice:
 
 
 %s
 
 
Para responder o ver el original, haga click aqu&iacute;:
 
 %s
 
Para ver el prfil de %s, haga click aqu&iacute;:
 
 %s
 
Por favor no respondas a este correo",

/**
 * Entities
 */
	
	'byline' => 'Creada por %s',
	'entity:default:strapline' => 'Creado %s por %s',
	'entity:default:missingsupport:popup' => 'Esta entidad no puede mostrarse correctamente. Esto puede deberse a que el soporte provisto por un plugin ya no se encuentra instalado',

	'entity:delete:success' => 'La entidad %s ha sido eliminada',
	'entity:delete:fail' => 'La entidad %s no pudo ser eliminada',
	
	'entity:can_delete:invaliduser' => 'No se puede chequear borrar la habitante [%s] porque no existe.',

/**
 * Action gatekeeper
 */

	'actiongatekeeper:missingfields' => 'En el formulario faltan __token o campos __ts',
	'actiongatekeeper:tokeninvalid' => "La conexi&oacute;n expir&oacute;. Refresca!",
	'actiongatekeeper:timeerror' => 'La p&aacute;gina que se encontraba utilizando ha expirado. Por favor refresque la p&aacute;gina e intente nuevamente',
	'actiongatekeeper:pluginprevents' => 'Lo sentimos. No se ha podido enviar el formulario por motivos desconocidos.',
	'actiongatekeeper:uploadexceeded' => 'El tama&ntilde;o del(los) archivo(s) supera el m&iacute;mite establecido',
	'actiongatekeeper:crosssitelogin' => "Lo sentimos, pero no se permite iniciar sesión desde otro dominio. Por favor inténtelo otra vez.",

/**
 * Word blacklists
 */

	'word:blacklist' => '',

/**
 * Tag labels
 */

	'tag_names:tags' => 'Etiquetas',

/**
 * Javascript
 */

	'js:security:token_refresh_failed' => 'Fallo al contactar %s. Refresca!',
	'js:security:token_refreshed' => 'La conexi&oacute;n a %s ha sido restaurada!',
	'js:lightbox:current' => "imagen %s de %s",

/**
 * Miscellaneous
 */
	'elgg:powered' => "",

/**
 * Languages according to ISO 639-1 (with a couple of exceptions)
 */

	"aa" => "Afar",
	"ab" => "Abkhazian",
	"af" => "Afrikaans",
	"am" => "Amharic",
	"ar" => "Arabic",
	"as" => "Assamese",
	"ay" => "Aymara",
	"az" => "Azerbaijani",
	"ba" => "Bashkir",
	"be" => "Byelorussian",
	"bg" => "Bulgarian",
	"bh" => "Bihari",
	"bi" => "Bislama",
	"bn" => "Bengali; Bangla",
	"bo" => "Tibetan",
	"br" => "Breton",
	"ca" => "Catalan",
	"cmn" => "Chino Mandarín", // ISO 639-3
	"co" => "Corsican",
	"cs" => "Czech",
	"cy" => "Welsh",
	"da" => "Danish",
	"de" => "German",
	"dz" => "Bhutani",
	"el" => "Greek",
	"en" => "English",
	"eo" => "Esperanto",
	"es" => "Espa&ntilde;ol",
	"et" => "Estonian",
	"eu" => "Basque",
	"eu_es" => "Euskera (España)",
	"fa" => "Persian",
	"fi" => "Finnish",
	"fj" => "Fiji",
	"fo" => "Faeroese",
	"fr" => "French",
	"fy" => "Frisian",
	"ga" => "Irish",
	"gd" => "Scots / Gaelic",
	"gl" => "Galician",
	"gn" => "Guarani",
	"gu" => "Gujarati",
	"he" => "Hebrew",
	"ha" => "Hausa",
	"hi" => "Hindi",
	"hr" => "Croatian",
	"hu" => "Hungarian",
	"hy" => "Armenian",
	"ia" => "Interlingua",
	"id" => "Indonesian",
	"ie" => "Interlingue",
	"ik" => "Inupiak",
	//"in" => "Indonesian",
	"is" => "Icelandic",
	"it" => "Italian",
	"iu" => "Inuktitut",
	"iw" => "Hebrew (obsolete)",
	"ja" => "Japanese",
	"ji" => "Yiddish (obsolete)",
	"jw" => "Javanese",
	"ka" => "Georgian",
	"kk" => "Kazakh",
	"kl" => "Greenlandic",
	"km" => "Cambodian",
	"kn" => "Kannada",
	"ko" => "Korean",
	"ks" => "Kashmiri",
	"ku" => "Kurdish",
	"ky" => "Kirghiz",
	"la" => "Latin",
	"ln" => "Lingala",
	"lo" => "Laothian",
	"lt" => "Lithuanian",
	"lv" => "Latvian/Lettish",
	"mg" => "Malagasy",
	"mi" => "Maori",
	"mk" => "Macedonian",
	"ml" => "Malayalam",
	"mn" => "Mongolian",
	"mo" => "Moldavian",
	"mr" => "Marathi",
	"ms" => "Malay",
	"mt" => "Maltese",
	"my" => "Burmese",
	"na" => "Nauru",
	"ne" => "Nepali",
	"nl" => "Dutch",
	"no" => "Norwegian",
	"oc" => "Occitan",
	"om" => "(Afan) Oromo",
	"or" => "Oriya",
	"pa" => "Punjabi",
	"pl" => "Polish",
	"ps" => "Pashto / Pushto",
	"pt" => "Portuguese",
	"pt_br" => "Portugués (Brasil)",
	"qu" => "Quechua",
	"rm" => "Rhaeto-Romance",
	"rn" => "Kirundi",
	"ro" => "Romanian",
	"ro_ro" => "Rumano (Rumanía)",
	"ru" => "Russian",
	"rw" => "Kinyarwanda",
	"sa" => "Sanskrit",
	"sd" => "Sindhi",
	"sg" => "Sangro",
	"sh" => "Serbo-Croatian",
	"si" => "Singhalese",
	"sk" => "Slovak",
	"sl" => "Slovenian",
	"sm" => "Samoan",
	"sn" => "Shona",
	"so" => "Somali",
	"sq" => "Albanian",
	"sr" => "Serbian",
	"sr_latin" => "Serbio (Latino)",
	"ss" => "Siswati",
	"st" => "Sesotho",
	"su" => "Sundanese",
	"sv" => "Swedish",
	"sw" => "Swahili",
	"ta" => "Tamil",
	"te" => "Tegulu",
	"tg" => "Tajik",
	"th" => "Thai",
	"ti" => "Tigrinya",
	"tk" => "Turkmen",
	"tl" => "Tagalog",
	"tn" => "Setswana",
	"to" => "Tonga",
	"tr" => "Turkish",
	"ts" => "Tsonga",
	"tt" => "Tatar",
	"tw" => "Twi",
	"ug" => "Uigur",
	"uk" => "Ukrainian",
	"ur" => "Urdu",
	"uz" => "Uzbek",
	"vi" => "Vietnamese",
	"vo" => "Volapuk",
	"wo" => "Wolof",
	"xh" => "Xhosa",
	//"y" => "Yiddish",
	"yi" => "Yiddish",
	"yo" => "Yoruba",
	"za" => "Zuang",
	"zh" => "Chinese",
	"zh_hans" => "Chino simplificado",
	"zu" => "Zulu",
);

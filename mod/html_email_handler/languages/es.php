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
	$spa = array(
		'html_email_handler' => "Manejador de correos con HMTL",
		
		'html_email_handler:theme_preview:menu' => "Notificaciones HTML",
		
		// settings - configuraciones
		
		'html_email_handler:settings:notifications:description' => "Cuando actives esta opción, todas las notificaciones hacia las habitantes de la red serán formateadas utilizando HTML.",
		'html_email_handler:settings:notifications' => "Usar como manejador de notificaciones de correo predeterminado",
		'html_email_handler:settings:notifications:subtext' => "Se enviarán todos los correos electrónicos de salida con formato HTML",
		
		'html_email_handler:settings:sendmail_options' => "Parámetros adicionales de sendmail (opcionales)",
		'html_email_handler:settings:sendmail_options:description' => "Aquí podrás configurar opciones del software sendmail, por ejemplo -f %s (para prevenir mejor los mails detectados como spam)",
		
		// notification body - cuerpo del correo
		'html_email_handler:notification:footer:settings' => "Configuración: %saqui%s",
	
	);
	
	add_translation("es", $spa);

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
		'friend_request' => "Solicitud de Relación",
		'friend_request:menu' => "Solicitudes de Relación",
		'friend_request:title' => "Solicitudes de relación para: %s",
	
		'friend_request:new' => "Nueva solicitud de relación",
		
		'friend_request:friend:add:pending' => "Solicitud de relación pendiente",
		
		'friend_request:newfriend:subject' => "%s quiere ser tu contacto!",
		'friend_request:newfriend:body' => "%s quiere ser tu contacto, pero est&aacute; esperando la aprobaci&oacute;n de la solicitud ... as&iacute; que inicia sesi&oacute;n en cuanto puedas para aceptarla!

Puedes ver tus solicitudes de relación pendientes en:
%s

No respondas a este mensaje. Soy un bot ;-)",
		
		// Actions
		// Add request
		'friend_request:add:failure' => "Lo sentimos, debido a un error del sistema no se pudo completar tu solicitud. Por favor, int&eacute;ntelo de nuevo.",
		'friend_request:add:successful' => "Haz solicitado ser contacto de %s. Debe aprobar tu solicitud antes de que se muestre en tu lista de contactos.",
		'friend_request:add:exists' => "Ya has solicitado ser contacto de %s.",
		
		// Approve request
		'friend_request:approve' => "Aprobar",
		'friend_request:approve:successful' => "%s es ahora un contacto",
		'friend_request:approve:fail' => "Error al crear relaci&oacute;n con %s",
	
		// Decline request
		'friend_request:decline' => "Rechazar",
		'friend_request:decline:subject' => "%s ha rechazado tu solicitud de relación",
		'friend_request:decline:message' => "Estimado(a) %s,

%s ha rechazado tu solicitud para convertiros en contactos.",
		'friend_request:decline:success' => "Solicitud de relación exitosamente rechazada",
		'friend_request:decline:fail' => "Error al rechazar la solicitud de relación, por favor int&eacute;ntelo de nuevo",
		
		// Revoke request
		'friend_request:revoke' => "Revocar",
		'friend_request:revoke:success' => "Solicitud de relación exitosamente revocada",
		'friend_request:revoke:fail' => "Error al revocar la solicitud de relación, por favor int&eacute;ntelo de nuevo",
	
		// Views
		// Received
		'friend_request:received:title' => "Solicitudes de relación recibidas",
		'friend_request:received:none' => "No hay solicitudes pendientes de aprobaci&oacute;n",
	
		// Sent
		'friend_request:sent:title' => "Solicitudes de relación enviadas",
		'friend_request:sent:none' => "No hay solicitudes enviadas pendientes de aprobaci&oacute;n",
	);
					
	add_translation("es", $spanish);

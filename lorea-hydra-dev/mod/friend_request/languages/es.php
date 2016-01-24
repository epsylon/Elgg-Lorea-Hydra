<?php
	$spanish = array(
		'friend_request' => "Solicitud de Relación",
		'friend_request:menu' => "Solicitudes de Relación",
		'friend_request:title' => "Solicitudes de Relación para: %s",
	
		'friend_request:new' => "Nueva Solicitud de Relación",
		
		'friend_request:friend:add:pending' => "Solicitud de Relación Pendiente",
		
		'friend_request:newfriend:subject' => "%s quiere relacionarse contigo!",
		'friend_request:newfriend:body' => "%s quiere relacionarse contigo! Pero est&aacute; esperando la aprobaci&oacute;n de la solicitud ... as&iacute; que inicia sesi&oacute;n ahora para que puedas aprobar la petici&oacute;n!!

Puedes ver tus solicitudes de relación pendientes en:
%s

Aseg&uacute;rate de haber iniciado sesi&oacute;n en el sitio web antes de hacer clic en el siguiente enlace, de lo contrario ser&aacute;s redirigido a la p&aacute;gina de inicio de sesi&oacute;n.

(No respondas a este mensaje.)",
		
		// Actions
		// Add request
		'friend_request:add:failure' => "Lo sentimos, debido a un error del sistema no se pudo completar tu solicitud. Por favor, int&eacute;ntelo de nuevo.",
		'friend_request:add:successful' => "Has solicitado relacionarte con %s. Debe aprobar tu solicitud antes de que se muestre en tu lista de relaciones.",
		'friend_request:add:exists' => "Ya has solicitado relacionarte con %s.",
		
		// Approve request
		'friend_request:approve' => "Aprobar",
		'friend_request:approve:successful' => "%s pasa a relacionarse contigo",
		'friend_request:approve:fail' => "Error al crear relaci&oacute;n con %s",
	
		// Decline request
		'friend_request:decline' => "Rechazar",
		'friend_request:decline:subject' => "%s ha rechazado tu solicitud de relación",
		'friend_request:decline:message' => "Estimado(a) %s,

%s ha rechazado tu solicitud para relacionaros.",
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

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

$language = array(
        'elggpg' => 'Llave GPG',
    'profile:openpgp_publickey' => 'Llave GPG',
    'profile:openpgp_publickey:help' => 'Qué es ésto?',
        'elggpg:nosubject'=>'Sin asunto',
	'elggpg:profileinstructions'=>'Informaci&oacute;n acerca de tu llave p&uacute;blica',
	'elggpg:identity'=>'Identidad asociada',
	'elggpg:manage'=>'Configurar cifrado',
	'elggpg:download'=>'Descargar',
	'river:addkey:user:default'=>'%s ha subido su llave p&uacute;blica GPG',
	'elggpg:public_key:imported'=>'Llave importada',
	'elggpg:date'=>'Fecha',
	'elggpg:size'=>'Bits',
	'elggpg:sendamessage'=>'Enviar un mensaje cifrado',
	'elggpg:view'=>'Ver llaves de cifrado',
	'elggpg:nopublickey'=>'Esta habitante no tiene ninguna llave GPG',
	'elggpg:manage:header'=>'LLave p&uacute;blica GPG',
	'elggpg:upload'=>'Subir una llave nueva',

        'elggpg:manage:header'=>'Llave pública GPG',
        'elggpg:upload'=>'Subir tu llave pública GPG',
        'elggpg:upload:error'=>'Ha ocurrido un error subiendo la llave GPG. Intenta de nuevo!',
        'elggpg:label:name' => 'Nombre',
        'elggpg:label:email' => 'Email',
        'elggpg:label:comment' => 'Comentario',
        'elggpg:label:fingerprint' => 'Huella electrónica',
        'elggpg:created'=>'Creada',
        'elggpg:expires'=>'Expira',
        'elggpg:type' => 'Tipo',
        'elggpg:type:encrypt' => 'Para cifrar',
        'elggpg:type:sign' => 'Para firmar',
        'elggpg:name'=>'Nombre',
        'elggpg:email'=>'Email',
        'elggpg:notifications' => "Notificaciones cifradas",
        'elggpg:notifications:enabled' => "Las notificaciones cifradas están <strong>activadas</strong>. Recibirás todas las notificaciones por correo de la red cifradas con tu llave GPG.",
        'elggpg:notifications:disabled' => "Las notificaciones cifradas están <strong>desactivadas</strong>. No estás recibiendo las notificaciones por correo desde la red cifradas. Deberías activarlo!",
        'elggpg:notifications:settings' => "Click aquí para configurar el cifrado",
        'elggpg:upload:unchanged'=>'Se ha subido la misma llave pública que hay almacenada',
        'elggpg:upload:imported'=>'Llave pública importada: %s',
        'elggpg:email:encrypted'=>'Recibir notificaciones por correo cifradas',
        'elggpg:comment'=>'Comentario',
        'elggpg:subkey:showdetails' => 'Mostrar detalles de las subclaves',
        'elggpg:raw:show' => 'Mostrar RAW',
        'elggpg:subkey:id'=>'ID de la subclave',
        'elggpg:expires:never'=>'Nunca',
        'elggpg:delete:confirm' => 'Si borras la llave GPG, recibirás los mensajes sin cifrar a partir de ahora',
        'elggpg:deleted' => 'Llave pública borrada',
        'elggpg:delete:error' => 'Ha habido un error al borrar la llave pública. Intenta de nuevo!',
        'elggpg:messageforyou'=>'El mensaje de debajo ha sido cifrado para ti',
        'elggpg:encrypt:emails' => 'Quiéres recibir todos nuestros correos cifrados con tu llave pública GPG?',
        'elggpg:encrypt:site_messages' => 'También todos los mensajes internos/privados?',
        'elggpg:import:report'=>'Importada: %s\n Sin cambios: %s\n Nuevos ids de habitante: %s\n Nuevas subclaves: %s\n Secreto importado: %s\n Secreto sin cambios: %s\n Nuevas firmas: %s\n Llaves descartadas: %s',

);

add_translation('es', $language);

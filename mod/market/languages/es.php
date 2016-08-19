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
	// Menu items and titles	
	'market' => "Anuncios",
	'market:posts' => "Anuncios en el Mercado",
	'market:title' => "Mercado",
	'market:user:title' => "Anuncios de %s en el mercado",
	'market:user' => "Anuncios de %s",
	'market:user:friends' => "Contactos de %s en el mercado",
	'market:user:friends:title' => "Anuncios de contactos de %s en el mercado",
	'market:mine' => "Mis anuncios",
	'market:mine:title' => "Mis anuncios en el mercado",
	'market:posttitle' => "Objeto de %s en el mercado: %s",
	'market:friends' => "Mercado cercano",
	'market:friends:title' => "Anuncios de mis contactos en el mercado",
	'market:everyone:title' => "Todo lo que hay en el mercado",
	'market:everyone' => "Todos los anuncios",
	'market:read' => "Ver Anuncios",
	'market:add' => "Crear Anuncio",
	'market:add:title' => "Crear un nuevo anuncio en el mercado",
	'market:edit' => "Editar Anuncio",
	'market:imagelimitation' => "(Debe ser JPG, GIF o PNG)",
	'market:text' => "Realiza una breve explicaci&oacute;n del servicio o producto que ofreces",
	'market:uploadimages' => "Añadir imagenes al anuncio",
	'market:uploadimage1' => "Imagen 1 (portada)",
	'market:uploadimage2' => "Imagen 2",
	'market:uploadimage3' => "Imagen 3",
	'market:uploadimage4' => "Imagen 4",
	'market:image' => "Imagen de anuncio",
	'market:delete:image' => "Borrar &eacute;sta imagen",
	'market:imagelater' => "",
	'market:strapline' => "Creado",
	'item:object:market' => 'Anuncios',
	'market:none:found' => 'No hay anuncios, de momento...',
	'market:pmbuttontext' => "Enviar mensaje privado",
	'market:price' => "Precio",
	'market:price:help' => "(en %s)",
	'market:text:help' => "(No HTML y max. 250 caracteres)",
	'market:title:help' => "(1-3 palabras)",
	'market:location' => "Localizaci&oacute;n",
	'market:location:help' => "(Donde ofreces el objeto o servicio)",
	'market:tags' => "Etiquetas",
	'market:tags:help' => "(Separadas por comas)",
	'market:access:help' => "(Quien puede ver &eacute;ste anuncio)",
	'market:replies' => "Respuestas",
	'market:created:gallery' => "Creado por %s <br>en %s",
	'market:created:listing' => "Creado por %s en %s",
	'market:showbig' => "Mostrar imagen ampliada",
	'market:type' => "Tipo",
	'market:type:choose' => 'Elige un tipo de anuncio',
	'market:choose' => "Elige una ...",
	'market:charleft' => "caracteres que quedan",
	'market:accept:terms' => "He le&iacute;do y acepto los %s",
	'market:terms' => "t&eacute;rminos",
	'market:terms:title' => "T&eacute;rminos de Uso",
	'market:terms' => "<li class='elgg-divide-bottom'>El mercado se utiliza para intercambiar libremente, pero también para comprar y vender objetos y servicios a las participantes de la red.</li>
			<li class='elgg-divide-bottom'>Se recomienda crear un único mensaje por cada bien o servicio.</li>

			<li class='elgg-divide-bottom'>Cada entrada en el mercado, solamente debería contener un único objeto/servicio bien identificable.</li>
			<li class='elgg-divide-bottom'>La filosofía del mercado es fomentar el intercambio DIY, no la especulación y la usura.</li>
			<li class='elgg-divide-bottom'>Intenta borrar tu entrada en el mercado cuando ya no sea de utilidad. Así será más fácil para todas encontrar los recursos que necesiten y están disponibles.</li>
			<li class='elgg-divide-bottom'>Las entradas se borrarán de manera automática después de %s meses.</li>
			<li class='elgg-divide-bottom'>Sino se cumplen las carecterísticas descritas, la red se reserva el derecho a borrar cualquier entrada en el mercado, sin aportar siquiera una explicación.</li>
			<li class='elgg-divide-bottom'>Los presentes términos de servicio están sujertos a cambios en cualquier instante.</li>
			",
	'market:new:post' => "Nuevo Anuncio en el Mercado",
	'market:notification' =>
'%s ha creado una nueva entrada en el mercado:

%s - %s
%s

Para ver la entrada:
%s
',
	// market widget
	'market:widget' => "Mercado",
	'market:widget:description' => "Mostrar tus anuncios en el mercado",
	'market:widget:viewall' => "Ver todos mis mensajes en el Mercado",
	'market:num_display' => "N&uacute;mero de entradas a mostrar",
	'market:icon_size' => "Tamaño del icono",
	'market:small' => "pequeño",
	'market:tiny' => "diminuto",
		
	// market river
	'river:create:object:market' => '%s ha a&ntilde;adido el anuncio %s en el mercado',
	'river:update:object:market' => '%s ha actualizado el anuncio: %s',
	'river:comment:object:market' => '%s ha comentado en el anuncio: %s',

	// Status messages
	'market:posted' => "Tu entrada en el mercado ha sido correctamente procesada.",
	'market:deleted' => "Tu entrada en el mercado ha sido correctamente eliminada.",
	'market:uploaded' => "La imagen ha sido añadida correctamente.",
	'market:image:deleted' => "La imagen ha sido borrada correctamente.",

	// Error messages	
	'market:save:failure' => "Tu entrada en el mercado no ha sido procesada correctamente. Intente de nuevo.",
	'market:error:missing:title' => "Error: Falta el título!",
	'market:error:missing:description' => "Error: Falta la descripción!",
	'market:error:missing:category' => "Error: Falta la categoría!",
	'market:error:missing:price' => "Error: Falta el valor/precio!",
	'market:error:missing:market_type' => "Error: Falta el tipo!",
	'market:tobig' => "Error: el fichero que adjuntas supera 1MB, inténtalo con uno más pequeño.",
	'market:notjpg' => "Asegurate que las imagenes incluídas tengas las siguientes extensiones: .jpg, .png o .gif",
	'market:notuploaded' => "Error: el fichero no parece haberse subido correctamente.",
	'market:notfound' => "Error: no podemos encontrar la entrada en el mercado que andas buscando.",
	'market:notdeleted' => "Error: no podemos borrar la entrada en el mercado.",
	'market:image:notdeleted' => "Error: no podemos borrar la imagen!",
	'market:tomany' => "Error: Demasiadas entradas en el mercado",
	'market:tomany:text' => "Has alcanzado el número máximo de entradas en el mercado por habitante. Borra alguno para añadir otro!",
	'market:accept:terms:error' => "Debes leer los términos de servicio y aceptárlos si estás de acuerdo!",
	'market:error' => "Error: no podemos salvar la entrada en el mercado!",
	'market:error:cannot_write_to_container' => "Error: imposible escribir en el contenedor!",

	// Settings
	'market:settings:status' => "Estado",
	'market:settings:desc' => "Description",
	'market:max:posts' => "Max. número de entradas en el mercado por habitante",
	'market:unlimited' => "Sin límite",
	'market:currency' => "Moneda ($, €, DKK, Ecoin)",
	'market:allowhtml' => "Permitir HTML en las entradas del mercado",
	'market:numchars' => "Max. número de caracteres en las entradas del mercado (solo valido sin HTML)",
	'market:pmbutton' => "Activar el botón de mensajes privados",
	'market:location:field' => "Activar el campo de localización",
	'market:adminonly' => "Solo las admins pueden crear entradas en el mercado",
	'market:comments' => "Permitir comentarios",
	'market:custom' => "Campo personalizado",
	'market:settings:type' => 'Activar tipos de intercambio (comprar/vender/cambiar/libre)',	
	'market:type:all' => "Todos los anuncios",
	'market:type:buy' => "Se requiere",
	'market:type:sell' => "A la venta",
	'market:type:swap' => "Intercambio",
	'market:type:free' => "Regalo",
	'market:expire' => "Auto borrar las entradas en el mercado anteriores a la fecha",
	'market:expire:month' => "mes",
	'market:expire:months' => "meses",
	'market:expire:subject' => "Tu entrada en el mercado ha expirado!",
	'market:expire:body' => "Hola %s

Tu entrada en el mercado '%s' que has creado %s, ha sido borrada.

Ésto sucede de manera automática cuando pasa un cierto tiempo después de su publicación (%s meses).",

	// market categories
	'market:categories' => 'Categor&iacute;as en el Mercado',
	'market:categories:choose' => 'Elige categor&iacute;a',
	'market:categories:settings' => 'Categor&iacute;s en el Mercado:',	
	'market:categories:explanation' => 'Añade algunas categorías predefinidas al mercado (separadas por comas) (y en fichero de lenguaje de tu idioma como: market:category:<i>categoryname</i>)',	
	'market:categories:save:success' => 'Las categorías del mercado para la red han sido salvadas correctamente.',
	'market:categories:settings:categories' => 'Categor&iacute;s en el Mercado',
	'market:category:all' => "Todos los anuncios",
	'market:category' => "Categor&iacute;a",
	'market:category:title' => "%s",

	// Categories
        'market:category:energy' => "Energía",
        'market:category:housing' => "Vivienda",
	'market:category:clothes' => "Ropa",
        'market:category:hardware' => "Hardware",
        'market:category:food' => "Alimentos",
	'market:category:furniture' => "Muebles",
        'market:category:tools' => "Herramientas",
        'market:category:books' => "Libros",
	'market:category:other' => "Otras",
        'market:category:gift' => "Regalo",
        'market:category:void' => "Vacío",


	// Custom select
	'market:custom:select' => "Condición del objeto",
	'market:custom:text' => "Condición",
	'market:custom:activate' => "Activar selección personalizada:",
	'market:custom:settings' => "Selecciones personalizadas",
	'market:custom:choices' => "Elige algunas selecciones predeterminadas para mostrar en el selector (separadas por comas) <br>\"market:custom:new,market:custom:used...etc\"",

	// Custom choises
	 'market:custom:na' => "Sin información",
	 'market:custom:new' => "Nueva",
	 'market:custom:unused' => "Sin utilizar",
	 'market:custom:used' => "Utilizado",
	 'market:custom:good' => "Bueno",
	 'market:custom:fair' => "Regular",
	 'market:custom:poor' => "Malo",
);

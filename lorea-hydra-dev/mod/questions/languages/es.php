<?php

return [
	'answers' => 'Respuestas',
	'answers:addyours' => 'A&ntilde;ade tu respuesta',
	
	/**
	 * General stuff
	 */
	'item:object:answer' => "Respuestas",
	'item:object:question' => "Preguntas",
	
	/**
	 * Menu items
	 */
	'questions:menu:user_hover:make_expert' => "Hacer encargada",
	'questions:menu:user_hover:make_expert:confirm' => "Seguro que quieres que se encargue %s?",
	'questions:menu:user_hover:remove_expert' => "Quitar de encargada",
	'questions:menu:user_hover:remove_expert:confirm' => "Seguro que deseas quitarla como encargada %s?",
	
	'questions:menu:entity:answer:mark' => "De momento, parece la respuesta correcta",
	'questions:menu:entity:answer:unmark' => "Ya no me parece la respuesta correcta",

	'questions:menu:filter:updated' => "Actualizado recientemente",
	'questions:menu:filter:todo' => "A responder",
	'questions:menu:filter:todo_group' => "A responder por el Grupo",
	'questions:menu:filter:experts' => "Encargadas",
	
	'river:create:object:question' => '%s ha preguntado lo siguiente %s',
	'river:create:object:answer' => '%s ha respondido a la pregunta %s',
		
	'questions' => 'Preguntas',
	'questions:asked' => 'Realizada por %s',
	'questions:answered' => '&Uacute;ltima respuesta dada por %s %s',
	'questions:answered:correct' => 'Respuesta correcta dada por %s %s',

	'questions:everyone' => 'Todas las cuestiones',
	'questions:add' => 'A&ntilde;adir una cuesti&oacute;n',
	'questions:todo' => 'A responder',
	'questions:todo:none' => 'No hay nada que responder. Genial!',
	'questions:updated' => 'Actualizado recientemente',
	'questions:owner' => "Preguntas en %s",
	'questions:none' => "No se han realizado preguntas todav&iacute;a.",
	'questions:group' => 'Preguntas al Grupo',
	'questions:enable' => 'Activar preguntas al grupo',

	'questions:edit:question:title' => 'Pregunta',
	'questions:edit:question:description' => "Detalles de la cuesti&oacute;n",
	'questions:edit:question:container' => "Donde deber&iacute;a ser listada &eacute;sta pregunta?",
	'questions:edit:question:container:select' => "Por favor, selecciona un grupo",
	'questions:edit:question:move_to_discussions' => "Mover a discusiones",
	'questions:edit:question:move_to_discussions:confirm' => "Seguro que quieres llevar la pregunta a las discusiones?. Luego no hay vuelta atr&aacute;s!!",
	
	/**
	 * experts page
	 */
	'questions:experts:title' => "Encargadas",
	'questions:experts:none' => "Todav&iacute;a no hay encargadas para resolver %s.",
	
	/**
	 * expert notifications
	 */
	'questions:notify_experts:create:subject' => "Una nueva cuesti&oacute;n ha sido propuesta",
	'questions:notify_experts:create:message' => "Hhola %s

Se ha preguntado la siguiente cuesti%oacute;n: %s.

Para responder visita el siguiente enlace:
%s",
	'questions:notify_experts:moving:subject' => "Una pregunta ha sido movida",
	'questions:notify_experts:moving:message' => "Hola %s

La pregunta: %s ha sido movida as&iacute; que si deseas participar en el debate, visita el siguiente enlace:

%s",
	
	'questions:daily:notification:subject' => "Lista de preguntas diarias",
	'questions:daily:notification:message:more' => "Ver m&aacute;s",
	'questions:daily:notification:message:overdue' => "Las siguientes preguntas est&aacute;n atrasadas",
	'questions:daily:notification:message:due' => "Las siguientes cuestiones necesitan ser resultas HOY!",
	'questions:daily:notification:message:new' => "Nuevas preguntas realizadas",
	/**
	 * answers
	 */
	'questions:answer:edit' => "Actualizar respuesta",
	'questions:answer:checkmark:title' => "%s ha marcado &eacute;sto como la respuesta correcta a %s",
		
	/**
	 * plugin settings
	 */
	'questions:settings:general:title' => "General settings",
	'questions:settings:general:close' => "Close a question when it gets a marked answer",
	'questions:settings:general:close:description' => "When an answer of a question is marked as the correct answer, close the question. This will mean no more answers can be given.",
	'questions:settings:general:solution_time' => "Set a default solution time in days",
	'questions:settings:general:solution_time:description' => "Questions should be answered before this time expires, groups can override this setting with their own time limit. 0 for no limit.",
	'questions:settings:general:limit_to_groups' => "Limit questions to group context only",
	'questions:settings:general:limit_to_groups:description' => "If set to 'yes', questions can no longer be made in the personal context.",
	
	'questions:settings:experts:title' => "Q&A expert settings",
	'questions:settings:experts:enable' => "Enable expert roles",
	'questions:settings:experts:enable:description' => "Experts have special privilages and can be assigned by site administrators and group owners.",
	'questions:settings:experts:answer' => "Only experts can answer a question",
	'questions:settings:experts:mark' => "Only experts can mark an answer as the correct answer",
	
	'questions:settings:access:title' => "Access settings",
	'questions:settings:access:personal' => "What will be the access level for personal questions",
	'questions:settings:access:group' => "What will be the access level for group questions",
	'questions:settings:access:options:user' => "User defined",
	'questions:settings:access:options:group' => "Group members",
	
	/**
	 * group settings
	 */
	'questions:group_settings:title' => "Questions settings",
	'questions:group_settings:solution_time:description' => "Questions should be answered before this time expires. 0 for no limit.",
	
	/**
	 * Widgets
	 */

	'widget:questions:title' => "Questions",
	'widget:questions:description' => "You can view the status of your questions.",
	'widget:questions:content_type' => "Which questions to show",
		
	/**
	 * Actions
	 */
	
	'questions:action:answer:save:error:container' => "You do not have permission to answer that question!",
	'questions:action:answer:save:error:body' => "A body is required: %s, %s",
	'questions:action:answer:save:error:save' => "There was a problem saving your answer!",
	'questions:action:answer:save:error:question_closed' => "The question you're trying to answer is already closed!",
	
	'questions:action:answer:toggle_mark:error:not_allowed' => "You're not allowed to mark answers as the correct answer",
	'questions:action:answer:toggle_mark:error:duplicate' => "There already is a correct answer to this question",
	'questions:action:answer:toggle_mark:success:mark' => "The answer is marked as the correct answer",
	'questions:action:answer:toggle_mark:success:unmark' => "The answer is no longer marked as the correct answer",
	
	'questions:action:question:save:error:container' => "You do not have permission to answer that question!",
	'questions:action:question:save:error:body' => "A title and description are required: %s, %s, %s",
	'questions:action:question:save:error:save' => "There was a problem saving your question!",
	'questions:action:question:save:error:limited_to_groups' => "Questions are limited to group, please select a group",
	
	'questions:action:question:move_to_discussions:error:move' => "You're not allowed to move questions to discussions",
	'questions:action:question:move_to_discussions:error:topic' => "An error occured while creating the discussion topic, please try again",
	'questions:action:question:move_to_discussions:success' => "The questions was moved to a discussion topic",
	
	'questions:action:toggle_expert:success:make' => "%s is now a questions expert for %s",
	'questions:action:toggle_expert:success:remove' => "%s is no longer a questions expert for %s",
	
	'questions:action:group_settings:success' => "The group settings were saved",
];

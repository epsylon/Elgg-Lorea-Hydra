<?php
		function videoconference_init()
		
		{
		global $CONFIG;
		add_menu(elgg_echo('Conferencias'), $CONFIG->wwwroot . "mod/videoconference");
		
		}
		
        register_elgg_event_handler('init','system','videoconference_init');
	
	
?>

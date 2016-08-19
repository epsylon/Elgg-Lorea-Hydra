<?php

  // Include the thickbox javascript library and associated CSS. Elgg already supplies jQuery.
  // With thanks to Alistair Young <alistair@codebrane.com>

function thickbox_init() {

	elgg_extend_view('metatags', 'thickbox/metatags');


}


// Make sure the profile initialisation function is called on initialisation
elgg_register_event_handler('init','system','thickbox_init');


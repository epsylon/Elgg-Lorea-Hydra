<?php
//  Encrypt/Decrypt Elgg messages on the client side
//  Elgg plugin by Benjamin Graham
//  Javascript library Copyright 2008 Vincent Cheung
//  The backend is Gibberish AES by Mark Percival
//  (http://github.com/markpercival/gibberish-aes/tree/master)

function elggcrypt_init() {
	elgg_extend_view('metatags', 'elgg-crypt/metatags');
	elgg_extend_view('input/urlshortener', 'elgg-crypt/crypt');

}
elgg_register_event_handler('init','system','elggcrypt_init');

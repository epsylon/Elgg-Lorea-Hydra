elgg-crypt 
Benjamin Graham 2010-2013
REQUIRES Elgg thickbox and thewire plugins

unzip to mod/ and enable in the Admin Plugins area.

The encryption used is 256-bit AES that is compatible with OpenSSL using a 
modified version of Gibberish AES.
http://github.com/markpercival/gibberish-aes/tree/master

Everything is done locally in the browser using JavaScript, 
so your unencrypted information is never on the internet, 
not even on the elgg server!

The encrypted text is safe as long as you keep the key secret. 
Do not lose the key. If you do, no one can help you!

<?php
/**
 * Modbash Clean Elgg Theme
 *
 * Copyright (c) 2015 ModBash
 *
 * @author     Shane Barron <admin@modbash.com>
 * @copyright  2015 SocialApparatus
 * @license    GNU General Public License (GPL) version 2
 * @version    1
 * @link       http://modbash.com
 */
?>

<div class = "row">
    <div class = "col-md-6">
        <div class = "form-group">
            <input name="name" type = "text" class = "form-control" placeholder = "Your Name *" id = "name" required data-validation-required-message = "Please enter your name.">
            <p class = "help-block text-danger"></p>
        </div>
        <div class = "form-group">
            <input name="email" type = "email" class = "form-control" placeholder = "Your Email *" id = "email" required data-validation-required-message = "Please enter your email address.">
            <p class = "help-block text-danger"></p>
        </div>
        <div class = "form-group">
            <input name="tel" type = "tel" class = "form-control" placeholder = "Your Phone *" id = "phone" required data-validation-required-message = "Please enter your phone number.">
            <p class = "help-block text-danger"></p>
        </div>
    </div>
    <div class = "col-md-6">
        <div class = "form-group">
            <textarea name="message" class = "form-control" placeholder = "Your Message *" id = "message" required data-validation-required-message = "Please enter a message."></textarea>
            <p class = "help-block text-danger"></p>
        </div>
    </div>
    <div class = "clearfix"></div>
    <div class = "col-lg-12 text-center">
        <div id = "success"></div>
        <button type = "submit" class = "btn btn-xl">Send Message</button>
    </div>
</div>
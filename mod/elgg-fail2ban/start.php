<?php
	/**
	 * Fail2Ban support for Elgg
	 * This plugin replaces the default login action with one almost but not quite identical. This new login
         * action will log to the system auth.log successful and failed logins, which let you hook into fail2ban.
         * 
         * @see Readme.md for details
	 *
	 * @licence GNU Public License version 2
         * @link https://github.com/mapkyca/elgg-fail2ban
	 * @link http://www.marcus-povey.co.uk
         * @link http://www.fail2ban.org
	 * @author Marcus Povey <marcus@marcus-povey.co.uk>
	 */
	
	
	function elgg_fail2ban_init()
	{
            // Replace login
            elgg_register_action('login', dirname(__FILE__) . '/actions/login.php', 'public');
        }
        
	elgg_register_event_handler('init','system','elgg_fail2ban_init');

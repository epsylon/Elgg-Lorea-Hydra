No Logging for Elgg 1.9 - 1.12 and Elgg 2.X
===========================================

Latest Version: 1.9.1  
Released: 2015-09-19  
Contact: iionly@gmx.de  
License: GNU General Public License version 2  
Copyright: (c) iionly


Description
-----------

This plugin disables the Elgg system log.

The logging is disabled by unregistering the system_log_default_logger and system_log_listener event handlers of Elgg core. There won't be any more log entries by Elgg core or any other plugins created that utilize these event handlers.


What to do and NOT to do
------------------------

* Do NOT delete the system_log table in the database even after you enabled the No Logging plugin! Deleting this table will result in fatal errors if you ever disable the No Logging plugin again (or in case any plugin tries to write into / read from this table by other means beside the default events controlled by the No Logging plugin). This table will not be re-created automatically. Simply keep the system_log table even if it is empty.
* You can / should keep the Log Rotate plugin enabled at least for a while after enabling the No Logging. The entries in the system_log table will be archived into the system_log_<timestamp> tables in the course of time until the system_log table is emptied completely. You can delete the system_log_<timestamp> tables without risk or let the Log Rotate plugin delete them according to the configured schedule. Once the system_log table is empty you can disable the Log Rotate and the Logbrowser plugin if you want to.
* The Garbage Collector plugin is something different. It's not connected with the system_log table, the Log Rotate or Logbrowser plugins or the No Logging plugin. Keep it enabled.


Installation
------------

1. If you have a previous version of the No Logging plugin installed, first remove the old no_logging plugin folder from your mod directory before copying/extracting the new version to your server,
2. Copy the no_logging folder into the mod folder of your site,
3. Enable the plugin in the admin section of your site.

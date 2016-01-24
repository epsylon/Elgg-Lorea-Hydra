Elgg Fail2Ban Support
=====================

This is a very small plugin adds Fail2Ban <http://www.fail2ban.org> intrusion detection hooks into Elgg.

Why?
----

Although Elgg has a per-user password failure lockout, this is pretty basic and doesn't protect a user from trying multiple different username/password combinations.

Fail2Ban is much more comprehensive, and will, when properly configured, block attacks from a whole IP.

Installation
------------

 * Install the plugin into your /mod directory and activate it.
 * Copy the elgg.conf file to your fail2ban filters directory (usually, /etc/fail2ban/filter.d/)
 * Create a rule in your jail.local, along the lines of:

```
[elgg]
enabled = true
filter  = elgg
logpath = /var/log/auth.log
port    = all
```

See
---

 * Marcus Povey <marcus@marcus-povey.co.uk>, http://www.marcus-povey.co.uk
 * Fail2Ban <http://www.fail2ban.org>
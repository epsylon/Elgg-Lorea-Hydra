# Lorea Linkup plugin for Elgg 1.8

Linkup provides a simple markup to turn references to known entities
into clickable links.

It recognizes:

  - @username and links to the user profile
  - #1234 and links to the related task entity, otherwise,
  - #hashtag and links to the tag's page (can be #12 if it's not a task)
  - !1234 and links to the group's page whose GUID is "1234"
  - !group and links to the group's page whose group_alias is "group"
     (requires the (https://gitorious.org/lorea/group_alias)[group_alias] plugin)
  - *1234 and links to the corresponding ElggEntity page for that GUID

It works by scraping the resulting view and changing the markup
on-the-fly for the current user: if they do not have access to the
target entity, the link won't be made. Therefore, the plugin can be
activated and deactivated without changing anything from the original
contents. It also create links to entities once they're created.

It depends on libxml being installed and available. Linkup uses
[DOMDocument](http://php.net/dom) to parse the tags and extract the
parts to be checked for markup. It works independently from any
plugins.

There is a plugin hook 'linkup','object:$subtype' for plugin authors
to add their own entity-specific markup functions. See how the tasks
are handled to get started.

This plugin is brought to you by Lorea Faeries, and available under
the GNU Affero General Public License version 3, or later (see
LICENSE.txt.)


## Releases

Current release is **v0.2.4**.

Releases follow the [Semantic Versioning](http://semver.org/) rules.


## Roadmap / Changes

### Version 0.1.0, 2012-08-12 [deprecated]

This is a rewrite from a couple of weeks ago before the CPU fan lost power, 
and I couldn't transmit the code before I left Europe. It recognizes basic 
cases for users and groups. Generic entities are still to be supported.

### Version 0.2.0, 2012-10-12 [deprecated]

- Add support for generic entities and proper permissions check. 
- Now uses DOMDocument to restrict usage of the regular expression to safer 
  zones.
- Add a plugin hook 'linkup','object:$subtype' for plugins to provide a 
  specific markup for their entities.
- Add support for tasks as an example extension.

### Version 0.2.1, 2012-11-01 [deprecated]

- Fix erroneous function call
- Update README
- Update copyright information for AGPLv3+
- Ready for #Foxglove!

### Version 0.2.2, 2012-11-04 [deprecated]

- Do not try to markup empty nodes (fixes #1502591)
- Add support for subgroup aliases (e.g. lorea+code)
- Updated version for #Foxglove

### Version 0.2.3, ? [deprecated]

Missed?

### Version 0.2.4, 2013-01-18 *foxglove*

- Fix bug introduced in acf1af78 that prevented the markup from being applied.

### Version 0.3.0

- Add support for CSS icons for generated links.
- Add descriptive titles from entity context.

### Version 0.4.0

- Add support for autocompletion preview (to make it easier to
  type shortcuts.)


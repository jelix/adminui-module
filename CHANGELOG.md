Changelog
=========

1.1.0
-----

- New response objects for login and register pages. There are also new html response
  code: `htmlbare` and `htmlregister`.
- New predefined submenu for users management. You can add menu items into the
  new submenu having the id `users`.
- New jmessagetoast template plugin to display messages of jMessage
- New config parameter `dashboardAuthRequired` to force authentication on the dashboard.
  If its value is `inherit`, it allows to inherit from the auth requirement from 
  the jauth or authcore modules.
- new `meta_adminui` meta plugin for templates, to set the page title, sub-title
  from a template. Useful when you want to overwrite values defined by an 
  external module, simply by overriding template.
- Fix: don't show UI on error pages if it is not relevant
- Fix display of the password score into the password editor widget
- Fix behavior of readonly checkboxes: they should be disabled.
- Mark the module as compatible with futur Jelix 1.9.0-beta.1.

1.0.2
-----

- add a template plugin: pagelinksadminui

1.0.1
-----

- Customize widgets: new password editor widget of Jelix 1.8 
- Fix PHP8 deprecated errors into `NavBar\Link`
- Fix Forms widgets: fix display of htmleditor, wikieditor and textarea values.
- Fix HTML of navbar_dropdown_usermenu.tpl
- Fix dashboard_small_box.tml: switch information/title
- tests: fix composer.json issues and use PHP 8.3
- tests: use Jelix 1.8
- More details into README.md and forms doc

1.0.0
-----

First stable release.

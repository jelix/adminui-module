AdminUI module
==============

This is a module for Jelix, providing an interface for an administration application.
It uses the [AdminLTE theme](https://adminlte.io/) 3.2.0, and is entirely customizable
through APIs.

You can easily add content into the sidebar, the navbar or the dashboard, without
manipulating HTML.

The module provide also widgets for jForms, that generate HTML for Bootstrap
and CSS of AdminLTE.

This module is for Jelix 1.7.9 and higher.

Setting up the module
=====================

The best method is to use Composer.

In a commande line inside your project, execute:

```
composer require "jelix/adminui-module"
```

Launch the configurator for your application to enable the module

```bash
php dev.php module:configure adminui
```

It will asks you how to install web assets (JS and CSS files): 

- by copying them into the www directory of your application, 
- or by doing nothing if you setup into your web server configuration, an alias named `adminlte-assets`  to 
  `vendor/jelix/adminui-module/modules/adminui/www/adminlte/`.

The configurator will create also some parameters into your application configuration:
- it defines the jelix theme to `adminlte`
- it redefines the default html and htmlerror response
- it setup web assets

You can change some configuration parameters into the `app/system/mainconfig.ini.php`:

```ini
[adminui]
; the version of your application, appearing at the bottom bar
appVersion=1.2.3
; the logo of your application 
htmlLogo="<b>Admin</b>UI"
; the logo of your application when the left sidebar is minimized 
htmlLogoMini="<b>A</b>UI"
; the copyright informations, appearing at the bottom bar
htmlCopyright="<strong>Copyright &copy; 2022 <a href="https://jelix.org">Jelix</a>.</strong> MIT licence."
; the template used to display the dashboard. If empty, the dashboard may be empty
dashboardTemplate="test~dashboard"
```

You should also setup the url of the dashboard into `yourapp/app/system/urls.xml` like this:

```xml
<url pathinfo="/" module="adminui" action="default:index"/>
``` 

Here the dashboard is at the root of the web site, but you can setup any URL.


After configuring the module, you should launch the installer to activate the module:

```bash
php install/installer.php
```

Usage
=====

See the `doc/` directory

* [configuration of the main UI](doc/main_ui.md)
* [configuration of the dashboard](doc/dashboard.md)
* [use adminui widgets for jforms](doc/forms.md)

Tests
=======

An application has been made into the test directory. See its README.md to
launch it. 

It contains many examples. Don't hesitate to read the code.


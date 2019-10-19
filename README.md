AdminUI module
==============

This is a module for Jelix, providing an interface for an administration application.
It uses the [AdminLTE theme](https://adminlte.io/), and is entirely customizable
through APIs.

This module is for Jelix 1.7.x and higher.

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

It will asks you how to install web assets (JS and CSS files): by copying them into the www
directory of your application, or by doing nothing if you setup into your web 
server configuration, an alias named `adminlte-assets`  to 
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
htmlCopyright="<strong>Copyright &copy; 2019 <a href="https://jelix.org">Jelix</a>.</strong> MIT licence."
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


Setting up the user interface
=============================

By default, the interface is almost empty: nothing into the sidebar, into the navbar etc..

It's up to you to fill these spaces. You do it by creating a listener to the
event `adminui.loading`.

So, in the main module of your application, you should create a listener, into
the `classes` directory of your module. Let's call it `adminui.listener.php`.

```php
<?php
class adminuiListener extends jEventListener
{
    protected $eventMapping = array(
        'adminui.loading' => 'onAdminUILoading',
    );

    /**
     * @param jEvent $event
     */
    function onAdminUILoading($event) {
        /** @var \Jelix\AdminUI\UIManager $uim */
        $uim = $event->uiManager;

    }
}
```

You receive a `\Jelix\AdminUI\UIManager` object in the event. This object
contains API to setup the different components of the interface. It has 
some methods to retrieve these components: `navbar()`, `sidebar()` and `controlSidebar()`.
These methods returns some object which allow you to manipulate the components:
- add some menu items
- add some popup menu
- setup the account menu
- etc.


Here is an example to add a drop down menu into the navbar:

```php
<?php
use Jelix\AdminUI\Link;
//...

$menu = new \Jelix\AdminUI\NavBar\DropDownMenu('liens', 'reorder', 10);
$menu->addLink(new Link('https://jelix.org', 'Go to Jelix.org', true));
$menu->addLink(new Link('https://mozilla.org', 'Mozilla', true));
$menu->addLink(new Link('https://php.net', 'PHP', true));
$uim->navbar()->addItem($menu);
```

Example to setup the account menu:

```php
<?php
use Jelix\AdminUI\Link;
//...

$accountMenu = $uim->navbar()->accountMenu();

// if the user is NOT authenticated you should call: 
$accountMenu->setNotAuthenticated(
    jUrl::get('auth~default:login') // url to sign in
);

// else if the user is authenticated you should call: 
$accountMenu->setAuthenticated(
    'laurent',  // the user login 
    'Laurent', //the user name 
    jUrl::get('auth~default:logout'), // url to sign out 
    jUrl::get('account~profile:index', array('user'=>'laurent')), // url to display the user profile  (optional)
    \jApp::urlBasePath().'adminlte-assets/dist/img/user2-160x160.jpg' // url to the user image (optional)
);

// add other links to the account menu: 
$accountMenu->addLink(new Link(jUrl::get('account~profile:preferences', array('user'=>'laurent')), 'Your preferences'));
```


Example to setup a navigation menu into the sidebar

```php
<?php
use Jelix\AdminUI\Link;
//...

$navigation = new SubMenu('nav', 'Navigation', 10);

$prodItem = $navigation->addLinkItem('Products', jUrl::get('products~default:list'));
$newProductsCount = 30;
$prodItem->setBadgePill($newProductsCount, $prodItem::BADGE_PILL_INFO);

$uim->sidebar()->addMenuItem($navigation);

```

This is just an overview of possiblity to customize the navbar and the sidebar.
See the file `test/modules/test/classes/adminui.listener.php` to learn more
complex examples.


Tests
=======

An application has been made into the test directory. See its README.md to
launch it. 

Configuration of the user interface
====================================

Into the configuration of the application (`app/system/mainconfig.ini.php`),
there is a section `adminui`. It contains many parameters to design the
interface.

```ini

[adminui]
; the version of the application, that appears into the footer
appVersion=1.2.3

; the html content for the logo, at the top of the sidebar
htmlLogo="<b>Admin</b>UI"
htmlLogoMini="<b>A</b>UI"

; the copyright, that appears into the footer
htmlCopyright="<strong>Copyright &copy; 2022 <a href="https://jelix.org">Jelix</a>.</strong> MIT licence."

; some CSS classes to set on the body element. Some of parameters below add 
; also some CSS classes on the body element
bodyCSSClass="hold-transition skin-blue"

; some CSS classes to set on the body element, for simple page, like the login page
bareBodyCSSClass="hold-transition login-page"

; the url path to adminlte assets (without the base path of the application)
adminlteAssetsUrl="adminlte-assets/"

; the template to use for the dashboard. You should create your own template.
dashboardTemplate="mymodule~dashboard"

; hide the dashboard item into the sidebar
disableDashboardMenuItem=off

; show the button into the header, to activate the full screen mode 
fullScreenModeEnabled=off

; show a preloader icon with a vertical animation, during the loading of the page
showPreloader=off

; activate the dark mode
darkmode=off

; the header/navbar is fixed
header.fixed=off

; the header/navbar has a border
header.border=on

; Text of the header/navbar is small
header.smalltext=off

; Color of the header/navbar. see https://adminlte.io/docs/3.2/layout.html
header.color=white

; the text of the navbar is dark
header.darktext=off

; the text of the logo is small
header.brand.smalltext = off

; the sidebar is collapsed by default
sidebar.collapsed=off

; the sidebar is fixed
sidebar.fixed=off

; when collapsed, the sidebar is still visible in a mini format
sidebar.mini=on

; the sidebar has a flat style
sidebar.nav.flat.style=off

; the sidebar items are compact
sidebar.nav.compact=off

; child items into the sidebar, are indented
sidebar.nav.child.indent=off

; 
sidebar.nav.child.collapsed=

; the text of the sidebar is small
sidebar.nav.smalltext = off

; the background of the sidebar is dark
sidebar.dark=on

; the selected item of the sidebar has the "primary" color. see https://adminlte.io/docs/3.2/layout.html
sidebar.current-item.color=primary

; the footer is fixed 
footer.fixed=off

; text of the footer is small
footer.smalltext = off

; the general text is small
body.smalltext = off

```


Setting up the content of the user interface
=============================================

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

Don't forget to declare the listener into the event.xml file of your module:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<events xmlns="http://jelix.org/ns/events/1.0">
    <listener name="adminui">
        <event name="adminui.loading" />
    </listener>
</events>
```


The listener receives a `\Jelix\AdminUI\UIManager` object in the event. This object
contains API to setup the different components of the interface. It has
some methods to retrieve these components like: `navbar()`, `sidebar()` and `controlSidebar()`.
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

And to add a simple menu item on the left of the navbar:


```php
<?php
use Jelix\AdminUI\Link;
//...

$item = new \Jelix\AdminUI\NavBar\Link(jApp::urlBasePath(), 'Home');
$uim->navbar()->addLeftItem($item);

$item = new \Jelix\AdminUI\NavBar\Link('/contacts/', 'Contact');
$uim->navbar()->addLeftItem($item);
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

This is just an overview of possibilities to customize the navbar and the sidebar.
See the file `test/modules/test/classes/adminui.listener.php` to learn more
complexe examples.


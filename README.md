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

This is just an overview of possibilities to customize the navbar and the sidebar.
See the file `test/modules/test/classes/adminui.listener.php` to learn more
complex examples.


Setting up the dashboard
========================

The dashboard is displayed by the controller of the adminui module.

The controller is retrieving all "data boxes" that should be displayed in the dashboard,
by emitting a `adminui.dashboard.loading` event, so any module can give their
boxes.

Then it uses a `Dashboard` object to organize and display all boxes within a template. 

Setting boxes
-------------

On a dashboard there can be a number of data to display, that are displayed in
different type of boxes: simple title/number, graph, table etc. 

When a module want to display a box into the dashboard, it should listen the
`adminui.dashboard.loading` event. For the example, let's create a new method in 
our `adminuiListener` class we created before, and declare the event: 


```php
<?php
class adminuiListener extends jEventListener
{
    protected $eventMapping = array(
        // ...
         'adminui.dashboard.loading' => 'onDashboardLoading'        

    );

   /**
        * @param jEvent $event
        */
   function onDashboardLoading($event) {
        /** @var Jelix\AdminUI\Dashboard\Items $dashboard */
        $dashboard = $event->dashboardItems;
    
        // here add boxes

    }
}
```

Without forgetting to declare the event `adminui.dashboard.loading` into the `event.xml` file: 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<events xmlns="http://jelix.org/ns/events/1.0">
    <listener name="adminui">
        <event name="adminui.loading" />
        <event name="adminui.dashboard.loading" />
    </listener>
</events>
```


The listener receives a `\Jelix\AdminUI\Dashboard\Items` object in the event. You
will add your boxes into this object.

To create a boxes, you should instancy a class inheriting from the `\Jelix\AdminUI\Dashboard\Box`
class. You can create you own class, inheriting from `Box`, and which should 
implements the `getContent()` method. This method should return HTML content.
You can also use some already defined classes representing different type of
boxes (all in the `Jelix\AdminUI\Dashboard` namespace):

- `HtmlBox`: just give HTML content to its constructor
- `SmallBox`: display a small box having a title and a single information (number, sentence or else).
  You can set also an URL for a link, an icon and a background color.
- `SmallBox2`: similar to SmallBox, but with a different presentation. It does not
  support links.
- `SmallBoxProgress`: display a progress bar. It have a title, a text and you can
  set the progress values with its `setProgress()` method.

All boxes have an id.

Example:


```php
<?php
use Jelix\AdminUI\Dashboard\HtmlBox;
use Jelix\AdminUI\Dashboard\SmallBox;
use Jelix\AdminUI\Dashboard\SmallBox2;
use Jelix\AdminUI\Dashboard\SmallBoxProgress;

//...

function onDashboardLoading($event) {
    /** @var Jelix\AdminUI\Dashboard\Items $dashboard */
    $dashboard = $event->dashboardItems;

    $dashboard->addBox(new SmallBox('neworder', 'New Orders', '150','#', 'ion-bag', 'bg-aqua'));
    $dashboard->addBox(new SmallBox2('cpu', 'CPU Traffic', '90%', 'ion-ios-gear-outline', 'bg-red'));
    
    $tpl = new jTpl();
    $dashboard->addBox(new HtmlBox('todolist', $tpl->fetch('test~dashboard_todolist')));
    $dashboard->addBox(new HtmlBox('calendar', $tpl->fetch('test~dashboard_calendar')));
    
    $progress = new SmallBoxProgress('build_progress', 'Build', 'package foo.tgz', 'ion-ios-cart-outline', 'bg-yellow');
    $progress->setProgress(15, '54 MB');
    $dashboard->addBox($progress);
}
```

Icons and background names are CSS class name of Ion icons and bootstrap.

Displaying boxes into the dashboard
------------------------------------

By default, boxes are displayed in two columns, in the order of the call of listeners.

But you may want to display them in a specific manner.

The solution is to use a template. First create a template in your module.
It should contain specific tags, `{dashboard_box 'a_box_id'}`, to indicate where
each box are displayed.

Example of a template:

```html
<div class="row">
    <section class="col-md-12">
    {dashboard_box 'cpu'}
    {dashboard_box 'neworder'}
    {dashboard_box 'build_progress'}
    </section>
</div>

<div class="row">
    <section class="col-lg-7 connectedSortable">
        {dashboard_box 'calendar'}
    </section>
    <section class="col-lg-5 connectedSortable">
        {dashboard_box 'todolist'}
    </section>
</div>
```

If you don't indicate all boxes, remaining boxes will be displayed automatically
after the content of the template.

You should then register your template. In the application configuration,
set `dashboardTemplate` parameter from the `adminui` section, with the selector
of the template.

If the template is `dashboard.tpl` into the `test` module, you should write:

```ini
[adminui]
;...
dashboardTemplate="test~dashboard"

```

A module can provide a template for the boxes it provides. The method `addTemplate()`
of the `Dashboard\Items` object, should be called by giving it a `Dashboard\Template`
object. For example, in our `onDashboardLoading` method:

```php
<?php
use Jelix\AdminUI\Dashboard\Template;
//...

function onDashboardLoading($event) {
    /** @var Jelix\AdminUI\Dashboard\Items $dashboard */
    $dashboard = $event->dashboardItems;
    //...
    $dashboard->addTemplate(new Template('topboxes', 'test~dashboard_top'));
}
```

The `Template` constructor accepts an id and a template selector.

The template `dashboard_top.tpl` provided by the `test` module could be:

```html
<div class="row">
    <section class="col-md-12">
    {dashboard_box 'cpu'}
    {dashboard_box 'neworder'}
    {dashboard_box 'build_progress'}
    </section>
</div>
```


And then, in the main dashboard template `dashboard.tpl`, you could use the
tag `{dashboard_template 'topboxes'}` to include the sub template. It becomes:

```html
{dashboard_template 'topboxes'}

<div class="row">
    <section class="col-lg-7 connectedSortable">
        {dashboard_box 'calendar'}
    </section>
    <section class="col-lg-5 connectedSortable">
        {dashboard_box 'todolist'}
    </section>
</div>
```



Tests
=======

An application has been made into the test directory. See its README.md to
launch it. 

It contains many example. Don't hesitate to read the code.


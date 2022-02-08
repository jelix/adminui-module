
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

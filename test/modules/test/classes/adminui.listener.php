<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

use Jelix\AdminUI\Dashboard\HtmlBox;
use Jelix\AdminUI\Dashboard\SmallBox;
use Jelix\AdminUI\Dashboard\SmallBox2;
use Jelix\AdminUI\Link;
use Jelix\AdminUI\SideBar\SubMenu;
use Jelix\AdminUI\SideBar\LinkMenuItem;
use Jelix\AdminUI\ControlSideBar\Panel;

class adminuiListener extends jEventListener
{

    protected $eventMapping = array(
        'adminui.loading' => 'onAdminUILoading',
        'adminui.dashboard.loading' => 'onDashboardLoading'
    );

    /**
     * @param jEvent $event
     */
    function onAdminUILoading($event) {
        /** @var \Jelix\AdminUI\UIManager $uim */
        $uim = $event->uiManager;

        // ------------- Navigation bar

        $item = new \Jelix\AdminUI\NavBar\Link(jApp::urlBasePath(), 'Home');
        $uim->navbar()->addLeftItem($item);

        $item = new \Jelix\AdminUI\NavBar\Link('#', 'Contact');
        $uim->navbar()->addLeftItem($item);


        $uim->navbar()->setFullScreenModeAvailable();

        $item = new \Jelix\AdminUI\NavBar\DropDown('foo', 'bars', 20);
        $item->setBadgePill(17, $item::BADGE_PILL_SUCCESS);
        $item->setHeader('super foo');
        $item->setFooter(new Link('https://jelix.org', 'Go to Jelix.org'));
        $item->setContent('<p class="text-sm">Hello world</p>');
        $uim->navbar()->addItem($item);

        $menu = new \Jelix\AdminUI\NavBar\DropDownMenu('liens', 'bookmark', 10);
        $menu->setBadgePill(3, $item::BADGE_PILL_DANGER);
        $menu->addLink(new Link('https://jelix.org', 'Go to Jelix.org', true));
        $menu->addLink(new Link('https://mozilla.org', 'Mozilla', true));
        $menu->addLink(new Link('https://php.net', 'PHP', true));
        $uim->navbar()->addItem($menu);

        $accountMenu = $uim->navbar()->accountMenu();
        //$accountMenu->setNotAuthenticated('#signin');
        $accountMenu->setAuthenticated('laurentj', 'Laurent Jouanneau', jUrl::get('test~default:login'), '#profile');
        //$accountMenu->setAuthenticated('laurentj', 'Laurent Jouanneau', '#signout', '#profile', \jApp::urlBasePath().'adminlte-assets/dist/img/user2-160x160.jpg');
        $accountMenu->addLink(new Link('#prefs', 'Your preferences'));

        $messagesMenu = new \Jelix\AdminUI\NavBar\DropDownMessages('#messages');
        $uim->navbar()->addItem($messagesMenu);

        $messagesMenu->createAddMessage('first subject', '#firstmsg', '2019-08-01 10:30', 'Laurent');
        $messagesMenu->createAddMessage('second subject', '#secondmsg', '2019-08-02 15:30', 'Dave');
        $messagesMenu->createAddMessage('third subject', '#thirdmsg', '2019-08-05 18:10', 'Mickael');

        $notifications = new \Jelix\AdminUI\NavBar\DropDownNotifications('#notifs');
        $uim->navbar()->addItem($notifications);
        $notifications->createAddNotification('first notification', '#firstnotif', '2022-02-01 12:00', 'envelope');
        $notifications->createAddNotification( 'second notification', '#secondnotif', '2022-02-01 15:00', 'users');
        $notifications->createAddNotification('third notification', '#thirdnotif', '2022-02-01 16:00', 'file');
        $notifications->createAddNotification('notification number four', '#fournotif', '2022-01-30 08:00');



        // ------------- Sidebar bar

        $navigation = new SubMenu('nav', 'Navigation', 10);
        $dashboard = new SubMenu('dashboard', 'Dashboard', 10);
        $dashboard->setIcon('dashboard');
        $dashboard->addJelixLinkItem('index test', 'test~default:index', array(), 'circle-o');
        $dashboard->addJelixLinkItem('index adminui', 'adminui~default:index', array(),'circle-o');
        $dashboard->addJelixLinkItem('form', 'test~default:form', array(),'circle-o');
        $navigation->addMenuItem($dashboard);

        $layout = new SubMenu('layout', 'Layout Options', 20);
        $layout->setIcon('files-o');
        $layout->setBadgePill(4);
        $layout->addLinkItem('Top Navigation', '#top-nav', 'circle-o');
        $layout->addLinkItem('Boxed', '#boxed', 'circle-o');
        $layout->addLinkItem('Fixed', '#fixed', 'circle-o');
        $layout->addLinkItem('Collapsed Sidebar', '#collapsed-sidebar', 'circle-o');
        $navigation->addMenuItem($layout);

        $widget = $navigation->addLinkItem('Widgets', '#widgets', 'th');
        $widget->setOrder(30);
        $widget->setBadgePill('new', $widget::BADGE_PILL_SUCCESS);

        $multilevel =  new SubMenu('multilevel', 'Multilevel', 40);
        $multilevel->setIcon('share');
        $level1 = $multilevel->addLinkItem('Level One 1', '#', 'circle-o');
        $level1->setOrder(10);
        $level1->setBadgePill('5', $widget::BADGE_PILL_SUCCESS, 'a');
        $level1->setBadgePill('8', $widget::BADGE_PILL_WARNING, 'b');
        $level1->setBadgePill('2', $widget::BADGE_PILL_DANGER, 'c');
            $levelone =  new SubMenu('levelone', 'Level One 2', 20);
            $levelone->setIcon('circle-o');
            $levelone->addLinkItem('Level Two 1', '#', 'circle-o')->setOrder(10);
                $leveltwo =  new SubMenu('leveltwo', 'Level Two 2', 20);
                $leveltwo->setIcon('circle-o');
                $leveltwo->addLinkItem('Level three 1', '#', 'circle-o')->setOrder(10);
                $item = $leveltwo->addLinkItem('Level three 2', '#', 'circle-o');
                $item->setOrder(20);
                //$item->setActive();
                $leveltwo->addLinkItem('Level three 3', '#', 'circle-o')->setOrder(30);
            $levelone->addMenuItem($leveltwo);
        $multilevel->addMenuItem($levelone);
        $multilevel->addLinkItem('Level One 3', '#', 'circle-o')->setOrder(30);

        $navigation->addMenuItem($multilevel);

        $uim->sidebar()->addMenuItem($navigation);

        $uim->sidebar()->getSubMenu('system')->addLinkItem('Configuration', '#');

        // ---------------- Control sidebar

        $tpl = new jTpl();
        $prefPanel = new Panel('settings', 'Settings', 'gears', 10);
        $prefPanel->setContent($tpl->fetch('test~control_sidebar_settings'));
        $uim->controlSidebar()->addPanel($prefPanel);

        $homePanel = new Panel('home', 'Activity', 'home', 5);
        $homePanel->setContent($tpl->fetch('test~control_sidebar_activity'));
        $uim->controlSidebar()->addPanel($homePanel);


    }

    /**
     * @param jEvent $event
     */
    function onDashboardLoading($event) {
        /** @var Jelix\AdminUI\Dashboard\Items $dashboard */
        $dashboard = $event->dashboardItems;
        $dashboard->addBox(new SmallBox('neworder', 'New Orders', '150','#', 'ion-bag', 'bg-aqua'));
        $dashboard->addBox(new SmallBox('bouncerate', 'Bounce Rate', '53%', '#', 'ion-stats-bars', 'bg-green'));
        $dashboard->addBox(new SmallBox2('cpu', 'CPU Traffic', '90%', 'ion-ios-gear-outline', 'bg-red'));
        $dashboard->addBox(new SmallBox2('sales', 'Sales', '760', 'ion-ios-cart-outline', 'bg-yellow'));
        $dashboard->addBox(new SmallBox2('newmembers', 'New Members', '2,000', 'ion-ios-people-outline', 'bg-orange'));

        $tpl = new jTpl();
        $tpl->assign('urlAdminLteAssets', \jApp::urlBasePath().\jApp::config()->adminui['adminlteAssetsUrl']);
        $dashboard->addBox(new HtmlBox('chatbox', $tpl->fetch('test~dashboard_chatbox')));
        $dashboard->addBox(new HtmlBox('quick_email', $tpl->fetch('test~dashboard_quick_email')));
        $dashboard->addBox(new HtmlBox('tabs_custom', $tpl->fetch('test~dashboard_tabs_custom')));
        $dashboard->addBox(new HtmlBox('todolist', $tpl->fetch('test~dashboard_todolist')));
        $dashboard->addBox(new HtmlBox('calendar', $tpl->fetch('test~dashboard_calendar')));
        $dashboard->addBox(new HtmlBox('map', $tpl->fetch('test~dashboard_map')));
        $dashboard->addBox(new HtmlBox('sales_graph', $tpl->fetch('test~dashboard_sales_graph')));

        $dashboard->addTemplate(new Jelix\AdminUI\Dashboard\Template('template2', 'test~dashboard_template2'));
        $dashboard->addTemplate(new Jelix\AdminUI\Dashboard\Template('template3', 'test~dashboard_template3'));
    }
}
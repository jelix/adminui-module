<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

use Jelix\AdminUI\Link;
use Jelix\AdminUI\SideBar\SubMenu;
use Jelix\AdminUI\SideBar\LinkMenuItem;

class adminuiListener extends jEventListener
{

    protected $eventMapping = array(
        'adminui.loading' => 'onAdminUILoading'
    );

    /**
     * @param jEvent $event
     */
    function onAdminUILoading($event) {
        /** @var \Jelix\AdminUI\UIManager $uim */
        $uim = $event->uiManager;

        $item = new \Jelix\AdminUI\NavBar\DropDown('foo', 'bookmark-o', 20);
        $item->setCounter(17, $item::COUNTER_TYPE_OK);
        $item->setHeader('super foo');
        $item->setFooter(new Link('https://jelix.org', 'Go to Jelix.org'));
        $item->setContent('<p>Hello world</p>');

        $uim->navbar()->addItem($item);

        $menu = new \Jelix\AdminUI\NavBar\DropDownMenu('liens', 'reorder', 10);
        $menu->addLink(new Link('https://jelix.org', 'Go to Jelix.org', true));
        $menu->addLink(new Link('https://mozilla.org', 'Mozilla', true));
        $menu->addLink(new Link('https://php.net', 'PHP', true));
        $uim->navbar()->addItem($menu);

        $navigation = new SubMenu('nav', 'Navigation', 10);
        $dashboard = new SubMenu('dashboard', 'Dashboard', 10);
        $dashboard->setIcon('dashboard');
        $dashboard->addJelixLinkItem('index test', 'test~default:index', array(), 'circle-o');
        $dashboard->addJelixLinkItem('index adminui', 'adminui~default:index', array(),'circle-o');
        $navigation->addMenuItem($dashboard);

        $layout = new SubMenu('layout', 'Layout Options', 20);
        $layout->setIcon('files-o');
        $layout->addLinkItem('Top Navigation', '#top-nav', 'circle-o');
        $layout->addLinkItem('Boxed', '#boxed', 'circle-o');
        $layout->addLinkItem('Fixed', '#fixed', 'circle-o');
        $layout->addLinkItem('Collapsed Sidebar', '#collapsed-sidebar', 'circle-o');
        $navigation->addMenuItem($layout);

        $navigation->addLinkItem('Widgets', '#widgets', 'th')->setOrder(30);

        $multilevel =  new SubMenu('multilevel', 'Multilevel', 40);
        $multilevel->setIcon('share');
        $multilevel->addLinkItem('Level One 1', '#', 'circle-o')->setOrder(10);
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
    }
}
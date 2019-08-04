<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI;
use Jelix\AdminUI\Bar\Bar;
use Jelix\AdminUI\SideBar\SubMenu;
use Jelix\AdminUI\SideBar\UrlMenuItem;

class SideBar extends Bar {


    protected $topMenu = null;

    function __construct() {
        parent::__construct();
        $this->topMenu = new SubMenu('top','');

        if (!isset(\jApp::config()->adminui['disable_dashboard_menu']) ||
            !\jApp::config()->adminui['disable_dashboard_menu']
        ) {
            $this->topMenu->addItemUrl(\jLocale::get('adminui~ui.menu.item.dashboard'), \jUrl::get('default:index'), 'dashboard');
        }

        $crud = new SubMenu('crud', \jLocale::get('adminui~ui.menu.item.crud'), 70);
        $this->topMenu->addMenuItem($crud);
        $refdata = new SubMenu('refdata', \jLocale::get('adminui~ui.menu.item.refdata'), 80);
        $this->topMenu->addMenuItem($refdata);
        $system = new SubMenu('system', \jLocale::get('adminui~ui.menu.item.system'), 100);
        $this->topMenu->addMenuItem($system);

    }

    function addMenuItem(SideBar\MenuItem $menuItem) {
        $this->topMenu->addMenuItem($menuItem);
    }

    protected $subMenus = array();

    function getMenuItems() {
        return $this->topMenu->getChildren();
    }

    /**
     * @param string $menuId
     * @return SubMenu|null
     */
    function getSubMenu($menuId) {
        if (!isset($this->subMenus[$menuId])) {
            $menu = $this->topMenu->getSubMenu($menuId);
            if ($menu) {
                $this->subMenus[$menuId] = $menu;
            }
            else {
                return null;
            }
        }
        return $this->subMenus[$menuId];
    }
}
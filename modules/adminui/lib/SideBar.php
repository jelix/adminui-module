<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019-2022 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI;
use Jelix\AdminUI\Bar\Bar;
use Jelix\AdminUI\SideBar\SubMenu;

class SideBar extends Bar {


    protected $topMenu = null;

    function __construct(UIConfig $config)
    {
        parent::__construct($config);
        $this->topMenu = new SubMenu('top','');

        if (!$config->get('disableDashboardMenuItem')) {
            $this->topMenu->addLinkItem(\jLocale::get('adminui~ui.menu.item.dashboard'), \jUrl::get('adminui~default:index'), 'tachometer-alt');
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

    function isSearchFormMenuEnabled()
    {
        return ($this->_config->get('disableDashboardMenuItem') === true);
    }

    /**
     * @param string $selectedItemcolor name of the selected item into the menu
     * @param boolean $darkmode tell if the background is dark or not
     * @return void
     */
    function setColor($selectedItemcolor, $darkmode)
    {
        $this->_config->set('sidebar.current-item.color', $selectedItemcolor);
        $this->_config->set('sidebar.dark', $darkmode);
    }


    function cssClass()
    {
        return 'sidebar-'.
            ($this->_config->get('sidebar.dark')?'dark-':'light-').
            $this->_config->get('sidebar.current-item.color')
            ;
    }

    function navCssClass()
    {
        return
            ($this->_config->get('sidebar.nav.flat.style')?' nav-flat':'').
            ($this->_config->get('sidebar.nav.compact')?' nav-compact':'').
            ($this->_config->get('sidebar.nav.child.indent')?' nav-child-indent':'').
            ($this->_config->get('sidebar.nav.child.collapsed')?' nav-collapse-hide-child':'').
            ($this->_config->get('sidebar.nav.smalltext')?' text-sm':'')
            ;
    }
}
<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI;

class UIManager {

    /**
     * @var  NavBar $navbar
     */
    protected $_navbar;

    /**
     * @var  SideBar $navbar
     */
    protected $_sidebar;

    /**
     * @var ControlSideBar
     */
    protected $_controlSidebar;

    function __construct()
    {
        $this->_navbar = new NavBar();
        $this->_sidebar = new SideBar();
        $this->_controlSidebar = new ControlSideBar();
    }

    /**
     * @return NavBar
     */
    function navbar() {
        return $this->_navbar;
    }


    /**
     * @return SideBar
     */
    function sidebar() {
        return $this->_sidebar;
    }

    /**
     * @return ControlSideBar
     */
    function controlSidebar() {
        return $this->_controlSidebar;
    }

}
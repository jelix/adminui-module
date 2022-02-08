<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019-2022 Laurent Jouanneau
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

    /**
     * @var Footer
     */
    protected $_footer;

    /**
     * @var UIConfig
     */
    protected $_config;

    function __construct(UIConfig $config)
    {
        $this->_config = $config;
        $this->_navbar = new NavBar($config);
        $this->_sidebar = new SideBar($config);
        $this->_controlSidebar = new ControlSideBar($config);
        $this->_footer = new Footer($config);
    }

    /**
     * @return UIConfig
     */
    function config()
    {
        return $this->_config;
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

    /**
     * @return Footer
     */
    function footer()
    {
        return $this->_footer;
    }

    function bodyCssClass()
    {
        return $this->_config->get('bodyCSSClass').
            ($this->_config->get('darkmode')?' dark-mode':'').
            ($this->_config->get('header.fixed')?' layout-navbar-fixed':'').
            ($this->_config->get('sidebar.collapsed')?' sidebar-collapse':'').
            ($this->_config->get('sidebar.fixed')?' layout-fixed':'').
            ($this->_config->get('sidebar.mini')?' sidebar-mini':'').
            ($this->_config->get('footer.fixed')?' layout-footer-fixed':'').
            ($this->_config->get('body.smalltext')?' text-sm':'')
            ;
    }

}
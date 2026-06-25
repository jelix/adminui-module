<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2022-2026 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI;

class UIConfig {

    /**
     * @var array
     */
    protected $config;

    function __construct(array $config) {

        $this->config = array_merge(
            array(
                'appVersion' =>  '',
                'htmlLogo' =>  '<b>Admin</b>',
                'htmlLogoMini' =>  '',
                'htmlCopyright' =>  '',

                'bodyCSSClass' =>  'hold-transition',
                'bareBodyCSSClass' =>  'hold-transition login-page',
                'loginBodyCSSClass' =>  'hold-transition login-page',
                'registerBodyCSSClass' =>  'hold-transition register-page',
                'adminlteAssetsUrl' =>  '',

                'dashboardTemplate' =>  '',
                'dashboardAuthRequired'=> 'inherit',
                'disableDashboardMenuItem' =>  false,
                'fullScreenModeEnabled' => false,

                'showPreloader' => false,

                //body.dark-mode
                'darkmode' =>  false,

                //body.layout-navbar-fixed
                'header.fixed' =>  false,

                //.app-header.border-bottom-0
                'header.border' =>  true,

                //.app-header.text-sm
                'header.smalltext' =>  false,

                //.app-header.navbar-*
                'header.color' =>  'white',

                //.app-header.navbar-dark or .app-header.navbar-light
                'header.darktext' =>  false,

                //.brand-link.text-sm
                'header.brand.smalltext ' =>  false,

                //body.sidebar-collapse
                'sidebar.collapsed' =>  false,

                //body.layout-fixed
                'sidebar.fixed' =>  false,

                //body.sidebar-mini
                //when collapsed, the sidebar is still visible in a mini format
                'sidebar.mini' =>  true,

                //.nav-sidebar.nav-flat
                'sidebar.nav.flat.style' =>  false,
                //.nav-sidebar.nav-compact
                'sidebar.nav.compact' =>  false,
                //.nav-sidebar.nav-child-indent
                'sidebar.nav.child.indent' =>  false,
                //.nav-sidebar.nav-collapse-hide-child
                'sidebar.nav.child.collapsed' =>  false,
                //.nav-sidebar.text-sm
                'sidebar.nav.smalltext ' =>  false,

                //.app-sidebar.sidebar-dark-<color> or .app-sidebar.sidebar-light-<color>
                    'sidebar.dark' =>  true,
                'sidebar.current-item.color' =>  'primary',

                //body.layout-footer-fixed
                'footer.fixed' =>  false,
                //.app-footer.text-sm
                'footer.smalltext ' =>  false,

                //body.text-sm
                'body.smalltext ' =>  false,
            ),
            $config
        );

    }
    
    public function get($name)
    {
        if (isset($this->config[$name]))
        {
            return $this->config[$name];
        }
        return null;
    }


    function setFullScreenModeAvailable($enable = true)
    {
        $this->config['fullScreenModeEnabled'] = $enable;
    }

    function isFullScreenModeAvailable()
    {
        return $this->config['fullScreenModeEnabled'];
    }


    public function set($name, $value)
    {
        $this->config[$name] = $value;
    }
}

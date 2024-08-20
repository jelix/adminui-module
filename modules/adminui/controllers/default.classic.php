<?php

use Jelix\AdminUI\Dashboard;
use Jelix\AdminUI\UIConfig;

/**
* @author    Laurent Jouanneau
* @copyright 2019-2024 Laurent Jouanneau
* @link      
* @license    MIT
*/

class defaultCtrl extends jController
{

    public $pluginParams = array(
        '*' => array(
            'auth.required' => false
        ),
    );


    protected UIConfig $_UIConfig;

    public function __construct($request)
    {
        $this->_UIConfig = new UIConfig(\jApp::config()->adminui);
        $authRequired = $this->_UIConfig->get('dashboardAuthRequired');

        if ($authRequired === true) {
            $this->pluginParams['*']['auth.required'] = true;
        }
        else if ($authRequired == 'inherit') {
            if (jApp::isModuleEnabled('jauth') || jApp::isModuleEnabled('jcommunity')) {
                $authConfig = jAuth::loadConfig();
                if ($authConfig && $authConfig['auth_required']) {
                    $this->pluginParams['*']['auth.required'] = true;
                }
            }
            else if (jApp::isModuleEnabled('authcore') && isset(jApp::config()->sessionauth['authRequired'])) {
                $this->pluginParams['*']['auth.required'] = jApp::config()->sessionauth['authRequired'];
            }
        }

        parent::__construct($request);
    }

    /**
    *
    */
    function index() {
        $rep = $this->getResponse('html');

        $rep->body->assign('page_title', jLocale::get('adminui~ui.dashboard.title'));
        $rep->body->assign('sub_page_title', '');
        $rep->body->assign('breadcrumb', array(
            array('url' => '#', 'label' => 'Home', 'icon-class' => 'fa fa-dashboard'),
        ));

        $dashItems = new Dashboard\Items();
        jEvent::notify('adminui.dashboard.loading', array('dashboardItems'=> $dashItems));

        $dashboard = new Dashboard($this->_UIConfig->get('dashboardTemplate'));
        $rep->body->assign('MAIN', $dashboard->render($dashItems));
        return $rep;
    }
}


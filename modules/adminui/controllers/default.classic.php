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
        if ($this->_UIConfig->get('dashboardAuthRequired')) {
            $this->pluginParams['*']['auth.required'] = true;
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


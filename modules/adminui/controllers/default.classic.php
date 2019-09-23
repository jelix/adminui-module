<?php

use Jelix\AdminUI\Dashboard;

/**
* @author    Laurent Jouanneau
* @copyright 2019 Laurent Jouanneau
* @link      
* @license    MIT
*/

class defaultCtrl extends jController {
    /**
    *
    */
    function index() {
        $rep = $this->getResponse('html');
        $tpl = new jTpl();


        $rep->body->assign('page_title', jLocale::get('adminui~ui.dashboard.title'));
        $rep->body->assign('sub_page_title', '');
        $rep->body->assign('breadcrumb', array(
            array('url' => '#', 'label' => 'Home', 'icon-class' => 'fa fa-dashboard'),
        ));

        $dashItems = new Dashboard\Items();
        jEvent::notify('adminui.dashboard.loading', array('dashboardItems'=> $dashItems));

        $dashboard = new Dashboard(jApp::config()->adminui['dashboardTemplate']);
        $rep->body->assign('MAIN', $dashboard->render($dashItems));
        return $rep;
    }
}


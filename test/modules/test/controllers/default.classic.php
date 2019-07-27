<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

class defaultCtrl extends jController {
    /**
    *
    */
    function index() {
        $rep = $this->getResponse('html');
        $tpl = new jTpl();


        $rep->body->assign('page_title', 'Blank Page');
        $rep->body->assign('sub_page_title', 'it all starts here');
        $rep->body->assign('breadcrumb', array(
            array('url'=> '#', 'label'=>'Home', 'icon-class'=>'fa fa-dashboard'),
            array('url'=> '#', 'label'=>'Examples')
        ));
        $rep->body->assign('MAIN', $tpl->fetch('adminui~blank'));
        return $rep;
    }
}


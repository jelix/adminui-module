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
        $rep->body->assign('MAIN', $tpl->fetch('adminlte~blank'));
        return $rep;
    }
}


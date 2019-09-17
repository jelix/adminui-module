<?php
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

        return $rep;
    }
}


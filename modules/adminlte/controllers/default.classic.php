<?php
/**
* @package   test
* @subpackage adminlte
* @author    test
* @copyright 2019 Laurent Jouanneau and other contributors
* @link      
* @license    All rights reserved
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


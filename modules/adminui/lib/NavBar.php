<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI;

use Jelix\AdminUI\Bar\Bar;
use Jelix\AdminUI\NavBar\AccountDropDown;

class NavBar extends Bar {

    protected $_accountMenu;

    function __construct() {
        parent::__construct();
        $this->_accountMenu = new AccountDropDown();
        $this->addItem($this->_accountMenu);
    }

    function accountMenu() {
        return $this->_accountMenu;
    }
}
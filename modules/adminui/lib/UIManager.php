<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI;

class UIManager {

    /**
     * @var  NavBar $navbar
     */
    protected $navbar;

    function __construct()
    {
        $this->navbar = new NavBar();
    }

    /**
     * @return NavBar
     */
    function navbar() {
        return $this->navbar;
    }
}
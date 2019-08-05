<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\NavBar;

use Jelix\AdminUI\Link;

class DropDownMenu extends DropDown {

    /**
     * @var array
     */
    protected $links = array();

    protected $templateSelector = 'adminui~navbar_dropdown_menu';

    function addLink(Link $link) {
        $this->links[] = $link;
    }
    public function __toString()
    {
        $this->tpl->assign('links', $this->links);
        return parent::__toString();
    }
}
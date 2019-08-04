<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\SideBar;

class HtmlMenuItem extends MenuItem
{
    protected $type = 'html';

    protected $html = '';

    public function __construct($label, $html, $icon, $order = 0)
    {
        parent::__construct('', $label, $icon, $order);

        $this->html = $html;
    }

    public function setHtml($html) {
        $this->html = $html;
    }

    public function getHtml() {
        return $this->html;
    }

}

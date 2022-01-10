<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */
namespace Jelix\AdminUI\NavBar;

use Jelix\AdminUI\Bar\Item;

class Link extends Item
{

    protected $url;

    protected $templateSelector = 'adminui~navbar_link';

    function __construct($url, $label, $newWindow = false, $order = 0) {
        $this->url = $url;
        $this->newWindow = $newWindow;
        parent::__construct($label, $order);
    }

    function getUrl() {
        return $this->url;
    }

    function toNewWindow() {
        return $this->newWindow;
    }

    public function __toString()
    {
        $this->tpl = new \jTpl();
        $this->tpl->assign('link', $this);
        return $this->tpl->fetch($this->templateSelector);
    }
}
<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2022-2024 Laurent Jouanneau
 * @link     https://jelix.org
 * @licence MIT
 */
namespace Jelix\AdminUI\NavBar;

use Jelix\AdminUI\Bar\Item;

class Link extends Item
{

    protected $url;

    protected $templateSelector = 'adminui~navbar_link';

    protected $newWindow = false;

    /**
     * @param string $url   the url of the link
     * @param string $label label of the link
     * @param bool $newWindow true if a click on the link should open a new window/tab
     * @param int $order order of the item in the list of the item
     */
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
        $tpl = new \jTpl();
        $tpl->assign('link', $this);
        return $tpl->fetch($this->templateSelector);
    }
}
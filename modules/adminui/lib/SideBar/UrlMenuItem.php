<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\SideBar;

class UrlMenuItem extends MenuItem
{
    protected $type = 'url';
    protected $newWindow = false;

    protected $url = '';

    public function __construct($label, $url, $icon = '', $order = 0)
    {
        parent::__construct('', $label, $icon, $order);

        $this->url = $url;
    }

    public function setUrl($url, $newWindow = false) {
        $this->url = $url;
        $this->newWindow = $newWindow;
    }

    public function getUrl() {
        return $this->url;
    }

    /**
     * @return bool
     */
    public function isNewWindow()
    {
        return $this->newWindow;
    }

    /**
     * @param bool $newWindow
     */
    public function setNewWindow($newWindow)
    {
        $this->newWindow = $newWindow;
    }
}

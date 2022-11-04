<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\SideBar;

class JelixLinkMenuItem extends MenuItem
{
    protected $type = 'url';
    protected $newWindow = false;

    protected $selector = '';
    protected $parameters = array();

    public function __construct($label, $selector, $parameters = array(), $icon = '', $order = 0)
    {
        parent::__construct('', $label, $icon, $order);

        $this->selector = $selector;
        $this->parameters = $parameters;
    }

    public function getUrl() {
        return \jUrl::get($this->selector, $this->parameters);
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


    public function isActive()
    {
        if ($this->active === null) {
            $path = parse_url($this->getUrl(), PHP_URL_PATH);
            $request = \jApp::coord()->request;
            $currentUrlPath = $request->urlScript.$request->urlPathInfo;
            $this->active = ($path == $currentUrlPath);
        }
        return $this->active === true;
    }
}

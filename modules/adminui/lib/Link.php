<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI;

/**
 * Represents a url link into some UI components
 */
class Link {

    protected $url;

    protected $label;

    protected $newWindow = false;

    protected $cssClass = '';

    function __construct($url, $label, $newWindow = false, $cssClass = '') {
        $this->url = $url;
        $this->label = $label;
        $this->newWindow = $newWindow;
        $this->cssClass = $cssClass;
    }

    function getUrl() {
        return $this->url;
    }
    function getLabel() {
        return $this->label;
    }


    function toNewWindow() {
        return $this->newWindow;
    }

    function setCssClass($classes)
    {
        $this->cssClass = $classes;
    }

    function __toString()
    {
        $l = '<a href="'.$this->getUrl().'"';
        if ($this->toNewWindow()) {
            $l .= ' target="_blank"';
        }
        $l .= ' class="'.$this->cssClass.'"';
        $l .= '>'.$this->getLabel().'</a>';
        return $l;
    }
}
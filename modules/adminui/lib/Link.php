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
    function __construct($url, $label) {
        $this->url = $url;
        $this->label = $label;
    }

    function getUrl() {
        return $this->url;
    }
    function getLabel() {
        return $this->label;
    }
}
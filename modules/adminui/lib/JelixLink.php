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
class JelixLink extends Link {

    protected $selector;

    protected $parameters = array();

    protected $label;

    function __construct($selector, $parameters, $label) {
        $this->selector = $selector;
        $this->parameters = $parameters;
        parent::__construct('', $label);
    }

    function getUrl() {
        return \jUrl::get($this->selector, $this->parameters);
    }

    function getSelector() {
        return $this->selector;
    }

    function getParameters() {
        return $this->parameters;
    }

}
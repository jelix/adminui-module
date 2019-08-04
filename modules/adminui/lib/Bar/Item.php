<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Bar;


abstract class Item {

    /**
     * @var string
     */
    protected $label;

    /**
     * @var int
     */
    protected $order = 0;

    /**
     *
     * @param string $label
     * @param integer $order the order of the item in the list of navbar items
     */
    function __construct($label, $order = 0)
    {
        $this->label = $label;
        $this->order = $order;
    }

    function getLabel() {
        return $this->label;
    }


    function getOrder() {
        return $this->order;
    }

    abstract  public function __toString();
}
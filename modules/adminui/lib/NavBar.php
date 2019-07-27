<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI;

use Jelix\AdminUI\NavBar\Item;

class NavBar {

    /**
     * @var NavBar\DropDown[]
     */
    protected $items = array();

    function __construct() {

    }

    function addItem(Item $item) {
        $this->items[] = $item;
    }

    function getItems() {
        usort($this->items, function($itemA, $itemB) {
           if ($itemA->getOrder() > $itemB->getOrder()) {
               return 1;
           }
           if ($itemA->getOrder() < $itemB->getOrder()) {
               return -1;
           }
           return 0;
        });

        return $this->items;
    }

}
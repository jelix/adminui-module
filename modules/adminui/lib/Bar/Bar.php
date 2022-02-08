<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019-2022 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Bar;


use Jelix\AdminUI\UIConfig;

class Bar {

    /**
     * @var Item[]
     */
    protected $items = array();

    protected $_color = 'white';
    protected $_lightmode = 'light';

    /**
     * @var UIConfig
     */
    protected $_config;

    function __construct(UIConfig $config)
    {
        $this->_config = $config;
    }

    function addItem(Item $item) {
        $this->items[] = $item;
    }

    function getItems() {
        usort($this->items, function(Item $itemA, Item $itemB) {
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
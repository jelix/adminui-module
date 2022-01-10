<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019-2022 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI;

use Jelix\AdminUI\Bar\Bar;
use Jelix\AdminUI\Bar\Item;
use Jelix\AdminUI\NavBar\AccountDropDown;

class NavBar extends Bar {

    protected $_accountMenu;

    /**
     * @var Item[]
     */
    protected $leftItems = array();

    protected $fullScreenModeEnabled = false;

    function __construct() {
        parent::__construct();
        $this->_accountMenu = new AccountDropDown();
        $this->addItem($this->_accountMenu);
    }

    function accountMenu() {
        return $this->_accountMenu;
    }

    function setFullScreenModeAvailable($enable = true)
    {
        $this->fullScreenModeEnabled = $enable;
    }

    function showFullScreenMode()
    {
        return $this->fullScreenModeEnabled;
    }

    /**
     * Adds an item to the left of the navbar
     * @param Item $item
     * @return void
     */
    function addLeftItem(Item $item) {
        $this->leftItems[] = $item;
    }

    function getLeftItems() {
        usort($this->leftItems, function(Item $itemA, Item $itemB) {
            if ($itemA->getOrder() > $itemB->getOrder()) {
                return 1;
            }
            if ($itemA->getOrder() < $itemB->getOrder()) {
                return -1;
            }
            return 0;
        });

        return $this->leftItems;
    }
}
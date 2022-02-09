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

    function __construct(UIConfig $config)
    {
        parent::__construct($config);
        $this->_accountMenu = new AccountDropDown();
        $this->addItem($this->_accountMenu);
    }

    function accountMenu() {
        return $this->_accountMenu;
    }


    function showFullScreenMode()
    {
        return $this->_config->isFullScreenModeAvailable();
    }

    /**
     * @param string $color name of the background color of the navbar
     * @param boolean $darkmode tell if the color of text is dark or not
     * @return void
     */
    function setColor($color, $darkmode)
    {
        $this->_config->set('header.color', $color);
        $this->_config->set('header.darktext', $darkmode);
    }

    function cssClass()
    {
        return 'navbar-'.$this->_config->get('header.color').
            ($this->_config->get('header.darktext')?' navbar-light':' navbar-dark').
            ($this->_config->get('header.border')?' border-bottom-0':'').
            ($this->_config->get('header.smalltext')?' text-sm':'')
            ;
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
<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\SideBar;

class SubMenu extends MenuItem
{
    protected $type = 'submenu';

    /**
     * @var MenuItem[]
     */
    protected $childItems = array();

    public function __construct($id, $label, $order = 0)
    {
        parent::__construct($id, $label, '', $order);
        $this->order = $order;
    }

    function hasChildren() {
        return count($this->childItems) > 0;
    }

    function getChildren() {
        usort($this->childItems, function(MenuItem $itA, MenuItem $itB) {
            $oA = $itA->getOrder();
            $oB = $itB->getOrder();

            if ($oA > $oB) {
                return 1;
            }
            else if ($oA < $oB) {
                return -1;
            }
            return 0;
        });
        return $this->childItems;
    }

    function addMenuItem(MenuItem $item) {
        $this->childItems[] = $item;
    }

    function getSubMenu($menuId) {
        $subMenuList = [];
        // see if the expected menu is one of the children
        foreach ($this->childItems as $childItem) {
            if ($childItem->getType() == 'submenu') {
                if ($childItem->getId() == $menuId) {
                    return $childItem;
                }
                $subMenuList[] = $childItem;
            }
        }
        // search in sub menu
        foreach($subMenuList as $childMenu) {
            $menu = $childMenu->getSubMenu($menuId);
            if ($menu) {
                return $menu;
            }
        }
        return null;
    }

    /**
     * @param string $label
     * @param string $url
     * @param string $icon
     * @return LinkMenuItem
     */
    function addLinkItem($label, $url, $icon = '') {
        $url = new LinkMenuItem($label, $url, $icon, count($this->childItems));
        $this->childItems[] = $url;
        return $url;
    }

    function addJelixLinkItem($label, $selector, $parameters, $icon = '') {
        $url = new JelixLinkMenuItem($label, $selector, $parameters, $icon, count($this->childItems));
        $this->childItems[] = $url;
        return $url;
    }

    /**
     * @param string $label
     * @param string $html
     * @param string $icon
     * @return HtmlMenuItem
     */
    function addHtmlItem($label, $html, $icon = '') {
        $item = new HtmlMenuItem($label, $html, $icon, count($this->childItems));
        $this->childItems[] = $item;
        return $item;
    }


    public function isActive() {
        if ($this->active === null) {
            $this->active = false;
            foreach($this->childItems as $item) {
                if ($item->isActive()) {
                    $this->active = true;
                    return true;
                }
            }
        }
        return $this->active === true;
    }

}

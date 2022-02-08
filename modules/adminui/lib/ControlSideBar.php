<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019-2022 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */
namespace Jelix\AdminUI;

use Jelix\AdminUI\ControlSideBar\Panel;

class ControlSideBar {

    /**
     * @var Panel[]
     */
    protected $panels = array();

    /**
     * @var UIConfig
     */
    protected $_config;

    function __construct(UIConfig $config)
    {
        $this->_config = $config;
    }

    function addPanel(Panel $panel) {
        $this->panels[] = $panel;
    }

    function hasPanels() {
        return count($this->panels);
    }

    function getPanels() {
        usort($this->panels, function(Panel $itemA, Panel $itemB) {
            $oA = $itemA->getOrder();
            $oB = $itemB->getOrder();
            if ( $oA > $oB ) {
                return 1;
            }
            if ($oA < $oB) {
                return -1;
            }
            return 0;
        });

        return $this->panels;
    }
}

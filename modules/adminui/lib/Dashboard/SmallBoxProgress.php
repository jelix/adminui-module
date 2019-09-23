<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Dashboard;



class SmallBoxProgress extends SmallBox {

    protected $tplSelector = 'adminui~dashboard_small_box_progress';

    function __construct($id, $title, $information, $iconClass='' , $backgroundClass = 'bg-aqua')
    {
        parent::__construct($id, $title, $information, '', $iconClass, $backgroundClass);
        $this->tpl->assign(array(
            'progressPercent' => '100',
            'progressDescription' => ''
        ));
    }

    /**
     * @param float $percent
     * @param string $description
     */
    function setProgress($percent, $description) {
        $this->tpl->assign(array(
            'progressPercent' => $percent,
            'progressDescription' => $description
        ));
    }
}

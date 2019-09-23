<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Dashboard;


class SmallBox2 extends SmallBox {

    protected $tplSelector = 'adminui~dashboard_small_box2';

    function __construct($id, $title, $information, $iconClass='' , $backgroundClass = 'bg-aqua')
    {
        parent::__construct($id, $title, $information, '', $iconClass, $backgroundClass);

    }
}

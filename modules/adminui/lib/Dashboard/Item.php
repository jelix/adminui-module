<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Dashboard;




abstract class Item {


    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

}

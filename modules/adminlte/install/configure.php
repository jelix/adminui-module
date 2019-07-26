<?php
/**
* @package   test
* @subpackage adminlte
* @author    test
* @copyright 2019 Laurent Jouanneau and other contributors
* @link      
* @license    All rights reserved
*/


class adminlteModuleConfigurator extends \Jelix\Installer\Module\Configurator {

    public function getDefaultParameters() {
        return array();
    }

    function configure(\Jelix\Installer\Module\API\ConfigurationHelpers $helpers) {

        // TODO
        // ask how www files should be copied, as the jelix module does (wwwfiles param)
        // setup config:
        //      [responses]
        //      html="module:adminlte~adminlteResponse"
        //      [webassets_common]
        //      .. all web assets...

    }
}
<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau and other contributors
 * @link
 * @license    MIT
 */


class adminuiModuleConfigurator extends \Jelix\Installer\Module\Configurator {

    public function getDefaultParameters() {
        return array();
    }

    function configure(\Jelix\Installer\Module\API\ConfigurationHelpers $helpers) {

        // TODO
        // ask how www files should be copied, as the jelix module does (wwwfiles param)
        // setup config:
        //      [responses]
        //      html="module:adminui~adminuiResponse"
        //      [webassets_common]
        //      .. all web assets...

    }
}
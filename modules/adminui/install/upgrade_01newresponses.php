<?php


/**
 * @author     Laurent Jouanneau
 * @copyright  2022 Laurent Jouanneau
 * @licence    MIT
 */

class adminuiModuleUpgrader_01newresponses extends \Jelix\Installer\Module\Installer {

    protected $targetVersions = array('0.10.0');
    protected $date = '2022-01-11';

    function install(\Jelix\Installer\Module\API\InstallHelpers $helpers)
    {
        $configIni = $helpers->getConfigIni();

        if ($configIni->getValue('html', 'responses') == 'module:adminui~adminuiResponse') {
            $configIni['local']->setValue('html', "\\Jelix\\AdminUI\\Responses\\AdminUIResponse", 'responses');
        }

        if ($configIni->getValue('htmlerror', 'responses') == 'module:adminui~adminuiResponse') {
            $configIni['local']->setValue('htmlerror', "\\Jelix\\AdminUI\\Responses\\AdminUIResponse", 'responses');
        }

        if ($configIni->getValue('htmllogin', 'responses') == 'module:adminui~adminuiBareResponse') {
            $configIni['local']->setValue('htmllogin', "\\Jelix\\AdminUI\\Responses\\AdminUIBareResponse", 'responses');
        }
    }
}
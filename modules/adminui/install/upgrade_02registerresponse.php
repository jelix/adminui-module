<?php


/**
 * @author     Laurent Jouanneau
 * @copyright  2024 Laurent Jouanneau
 * @licence    MIT
 */

class adminuiModuleUpgrader_02registerresponse extends \Jelix\Installer\Module\Installer {

    protected $targetVersions = array('1.1.0');
    protected $date = '2024-08-20';

    function install(\Jelix\Installer\Module\API\InstallHelpers $helpers)
    {
        $configIni = $helpers->getConfigIni();

        if ($configIni->getValue('htmllogin', 'responses') == '\\Jelix\\AdminUI\\Responses\\AdminUIBareResponse') {
            $configIni['local']->setValue('htmllogin', "\\Jelix\\AdminUI\\Responses\\AdminUILoginResponse", 'responses');
        }

        if (!$configIni->getValue('htmlregister', 'responses')) {
            $configIni['local']->setValue('htmlregister', "\\Jelix\\AdminUI\\Responses\\AdminUIRegisterResponse", 'responses');
        }

        if (!$configIni->getValue('htmlbare', 'responses')) {
            $configIni['local']->setValue('htmlregister', "\\Jelix\\AdminUI\\Responses\\AdminUIBareResponse", 'responses');
        }
    }
}
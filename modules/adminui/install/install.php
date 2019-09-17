<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link
 * @license    MIT
 */


class adminuiModuleInstaller extends \Jelix\Installer\Module\Installer {

    function install(\Jelix\Installer\Module\API\InstallHelpers $helpers) {
        $helpers->setupModuleWebFiles(
            $this->getParameter('wwwfiles'),
            'adminlte',
            __DIR__.'/../www/adminlte'
        );
    }
}
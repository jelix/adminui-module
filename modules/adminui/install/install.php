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
            'adminui-assets',
            __DIR__ . '/../www/adminui-assets'
        );
        $helpers->setupModuleWebFiles(
            $this->getParameter('wwwfiles'),
            'adminlte-assets',
            jApp::appPath('vendor/almasaeed2010/adminlte/')
        );
    }
}
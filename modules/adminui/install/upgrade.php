<?php

/**
 * @author     Laurent Jouanneau
 * @copyright  2019 Laurent Jouanneau
 * @licence    MIT
 */

class adminuiModuleUpgrader extends \Jelix\Installer\Module\Installer
{

    public function install(Jelix\Installer\Module\API\InstallHelpers $helpers)
    {
        $helpers->setupModuleWebFiles(
            $this->getParameter('wwwfiles'),
            'adminlte',
            __DIR__.'/../www/adminlte'
        );
    }
}

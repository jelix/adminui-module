<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau and other contributors
 * @link
 * @license    MIT
 */


class adminuiModuleInstaller extends \Jelix\Installer\Module\Installer {

    function install(\Jelix\Installer\Module\API\InstallHelpers $helpers) {
        //$helpers->database()->execSQLScript('sql/install');

        /*
        jAcl2DbManager::addSubject('my.subject', 'adminlte~acl.my.subject', 'subject.group.id');
        jAcl2DbManager::addRight('admins', 'my.subject'); // for admin group
        */
    }
}
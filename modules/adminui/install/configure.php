<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link
 * @license    MIT
 */


class adminuiModuleConfigurator extends \Jelix\Installer\Module\Configurator {

    public function getDefaultParameters() {
        return array(
            'wwwfiles' => ''
        );
    }

    function configure(\Jelix\Installer\Module\API\ConfigurationHelpers $helpers)
    {

        $cli = $helpers->cli();
        $this->parameters['wwwfiles'] = $cli->askInChoice(
            'How to install web files of adminui?'.
            "\n   copy: files will be copied into the www/ directory".
            "\n   filelink: a symbolic link into the www/ directory will point to the www/adminui directory of the module".
            "\n   vhost: you will configure your web server to set an alias to the www/adminui directory of the module",
            array('copy', 'vhost', 'filelink'),
            $this->parameters['wwwfiles']
        );

        $configIni = $helpers->getConfigIni();
        $configIni->setValue('theme', 'adminlte');
        $configIni->setValue('html', "module:adminui~adminuiResponse", 'responses');
        $configIni->setValue('htmlerror', "module:adminui~adminuiResponse", 'responses');
        $configIni->setValues(array(
            'adminlte-bootstrap.require' =>'jquery',
            'adminlte-bootstrap.css' =>array('adminlte-assets/bower_components/bootstrap/dist/css/bootstrap.min.css'),
            'adminlte-bootstrap.js' =>array('adminlte-assets/bower_components/bootstrap/dist/js/bootstrap.min.js'),
            'adminlte-fontawesome.css' =>array('adminlte-assets/bower_components/font-awesome/css/font-awesome.min.css'),
            'adminlte.require' =>'jquery,adminlte-bootstrap,adminlte-fontawesome',
            'adminlte.css' =>array(
                'adminlte-assets/bower_components/Ionicons/css/ionicons.min.css',
                'adminlte-assets/dist/css/AdminLTE.min.css',
                'adminlte-assets/dist/css/skins/_all-skins.min.css',
                'adminlte-assets/SourceSansPro/SourceSansPro.css',
                'adminlte-assets/adminui.css',
            ),
            'adminlte.js' =>array(
                'adminlte-assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
                'adminlte-assets/bower_components/fastclick/lib/fastclick.js',
                'adminlte-assets/dist/js/adminlte.min.js',
                'adminlte-assets/adminui.js',
            )
        ), 'webassets_common');

        $configIni->setValues(array(
            'appVersion' => '1.0.0',
            'htmlLogo' => '<b>Admin</b>UI',
            'htmlLogoMini' => '<b>A</b>UI',
            'htmlCopyright' => '<strong>Copyright &copy; 2019 My Company.</strong>.',
        ), 'adminui');

    }
}
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
            "\n   copy: adminlte source code will be copied into the www/ directory (not recommended)".
            "\n   filelink: a symbolic link into the www/ directory will point to the adminlte source code directory".
            "\n   vhost: you will configure your web server to set an alias to the adminlte source code directory",
            array('copy', 'vhost', 'filelink'),
            $this->parameters['wwwfiles']
        );

        $configIni = $helpers->getConfigIni();
        $configIni->setValue('theme', 'adminlte');
        $configIni->setValue('html', "module:adminui~adminuiResponse", 'responses');
        $configIni->setValue('htmlerror', "module:adminui~adminuiResponse", 'responses');
        $configIni->setValue('htmllogin', "module:adminui~adminuiBareResponse", 'responses');
        $configIni->setValues(array(
            'jquery.js' => "adminlte-assets/plugins/jquery/jquery.js",
            'adminlte-bootstrap.require' =>'jquery,jquery_ui',
            'adminlte-bootstrap.css' =>array('adminlte-assets/plugins/bootstrap/dist/css/bootstrap.min.css'),
            'adminlte-bootstrap.js' =>array('adminlte-assets/plugins/bootstrap/js/bootstrap.bundle.min.js'),
            'adminlte-fontawesome.css' =>array('adminlte-assets/plugins/fontawesome-free/css/all.min.css'),
            'adminlte.require' =>'jquery,adminlte-bootstrap,adminlte-fontawesome',
            'adminlte.css' =>array(
                'adminlte-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
                'adminlte-assets/dist/css/adminlte.min.css',
                'adminui-assets/SourceSansPro/SourceSansPro.css',
                'adminui-assets/adminui.css',
            ),
            'adminlte.js' =>array(
                'adminlte-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
                'adminlte-assets/plugins/jquery-mousewheel/jquery.mousewheel.js',
                'adminlte-assets/plugins/fastclick/fastclick.js',
                'adminlte-assets/dist/js/adminlte.min.js',
                'adminui-assets/adminui.js',
            )
        ), 'webassets_common');

        $configIni->setValues(array(
            'appVersion' => '1.0.0',
            'htmlLogo' => '<b>Admin</b>UI',
            'htmlLogoMini' => '<b>A</b>UI',
            'htmlCopyright' => '<strong>Copyright &copy; 2022 My Company.</strong>.',
            'dashboardTemplate'=>''
        ), 'adminui');

    }
}
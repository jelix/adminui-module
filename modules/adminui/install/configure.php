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
        $configIni->setValue('html', "\\Jelix\\AdminUI\\Responses\\AdminUIResponse", 'responses');
        $configIni->setValue('htmlerror', "\\Jelix\\AdminUI\\Responses\\AdminUIResponse", 'responses');
        $configIni->setValue('htmllogin', "\\Jelix\\AdminUI\\Responses\\AdminUIBareResponse", 'responses');
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


        $defaultValues = array(
            'appVersion' => '1.0.0',
            'htmlLogo' => '<b>Admin</b>UI',
            'htmlLogoMini' => '<b>A</b>UI',
            'htmlCopyright' => '<strong>Copyright &copy; 2022 My Company.</strong>.',
            'dashboardTemplate'=>'',
            'bodyCSSClass'=>"hold-transition skin-blue sidebar-mini",
            'bareBodyCSSClass'=>"hold-transition login-page"
        );

        foreach($defaultValues as $prop => $value) {
            // only set the configuration property if it does already exists
            if ($configIni->getValue($prop, 'adminui') === null) {
                $configIni->setValue($prop, $value, 'adminui');
            }
        }
    }
}
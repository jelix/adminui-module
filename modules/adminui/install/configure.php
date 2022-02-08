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
        $configIni->setValue('html', "\\Jelix\\AdminUI\\Responses\\AdminUIResponse", 'responses');
        $configIni->setValue('htmlerror', "\\Jelix\\AdminUI\\Responses\\AdminUIResponse", 'responses');
        $configIni->setValue('htmllogin', "\\Jelix\\AdminUI\\Responses\\AdminUIBareResponse", 'responses');
        $configIni->setValues(array(
            'jquery.js' => "adminlte-assets/plugins/jquery/jquery.js",
            'adminlte-bootstrap.require' =>'jquery,jquery_ui',
            //'adminlte-bootstrap.css' =>array('adminlte-assets/plugins/bootstrap/dist/css/bootstrap.min.css'),
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
            ),

            'knob.js' =>  ['adminlte-assets/plugins/jquery-knob/jquery.knob.min.js'],

            'daterangepicker.require' =>  'moment',
            'daterangepicker.js' =>  ['adminlte-assets/plugins/daterangepicker/daterangepicker.js'],
            'daterangepicker.css' =>  ['adminlte-assets/plugins/daterangepicker/daterangepicker.css'],

            'jqvmap.js' =>  ['adminlte-assets/plugins/jqvmap/jquery.vmap.js'],
            'jqvmap.css' =>  ['adminlte-assets/plugins/jqvmap/jqvmap.css'],

            'sparkline.js' =>  ['adminlte-assets/plugins/sparklines/sparkline.js'],

            'chartjs.js' =>  ['adminlte-assets/plugins/chart.js/Chart.min.js'],
            'chartjs.css' =>  ['adminlte-assets/plugins/chart.js/Chart.css'],

            'summernote.js' =>  ['adminlte-assets/plugins/summernote/summernote-bs4.min.js'],

            'moment.js' =>  ['adminlte-assets/plugins/moment/moment.min.js'],

            'tempusdominus.require' => 'moment',
            'tempusdominus.js' =>  ['adminlte-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'],
            'tempusdominus.css' =>  ['adminlte-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'],

        ), 'webassets_common');


        $defaultValues = array(
            'appVersion' => '1.0.0',
            'appTitle' => 'Admin',
            'htmlLogo' => '<b>Admin</b>UI',
            'htmlLogoMini' => '<b>A</b>UI',
            'htmlCopyright' => '<strong>Copyright &copy; 2022 My Company.</strong>.',
            'dashboardTemplate'=>'',
            'disableDashboardMenuItem' => false,
            'bodyCSSClass'=>"hold-transition",
            'bareBodyCSSClass'=>"hold-transition login-page",
            'adminlteAssetsUrl'=> "adminlte-assets/",
            'fullScreenModeEnabled' => false,
            'darkmode' =>  false,
            'header.fixed' =>  false,
            'header.border' =>  true,
            'header.smalltext' =>  false,
            'header.color' =>  'white',
            'header.darktext' =>  false,
            'header.brand.smalltext ' =>  false,
            'sidebar.collapsed' =>  false,
            'sidebar.fixed' =>  false,
            'sidebar.mini' =>  true,
            'sidebar.nav.flat.style' =>  false,
            'sidebar.nav.compact' =>  false,
            'sidebar.nav.child.indent' =>  false,
            'sidebar.nav.child.collapsed' =>  false,
            'sidebar.nav.smalltext ' =>  false,
            'sidebar.dark' =>  true,
            'sidebar.current-item.color' =>  'primary',
            'footer.fixed' =>  false,
            'footer.smalltext ' =>  false,
            'body.smalltext ' =>  false,
        );

        foreach($defaultValues as $prop => $value) {
            // only set the configuration property if it does already exists
            if ($configIni->getValue($prop, 'adminui') === null) {
                $configIni->setValue($prop, $value, 'adminui');
            }
        }
    }
}
<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

require_once (JELIX_LIB_PATH.'core/response/jResponseHtml.class.php');

class adminuiResponse extends jResponseHtml {

    public $bodyTpl = 'adminui~main';
    public $IECompatibilityMode = 'IE=edge';
    protected $_MetaOldContentType = false;
    public $metaViewport = 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no';

    protected function doAfterActions(){

        $confAdminUI = \jApp::config()->adminui;
        $this->title .= ($this->title !=''?'Admin':'');
        $this->bodyTagAttributes['class'] = $confAdminUI['cssBodyClass'];
        $this->body->assignIfNone('MAIN','<p>Empty page</p>');
        $this->body->assignIfNone('page_title', 'Admin');
        $this->body->assignIfNone('sub_page_title', '');
        $this->body->assignIfNone('appHtmlLogo', $confAdminUI['htmlLogo']);
        $this->body->assignIfNone('appHtmlLogoMini', $confAdminUI['htmlLogoMini']);
        $this->body->assignIfNone('appHtmlCopyright', $confAdminUI['htmlCopyright']);
        $this->body->assignIfNone('appVersion', $confAdminUI['appVersion']);
        $this->body->assignIfNone('breadcrumb', array());
    }
}
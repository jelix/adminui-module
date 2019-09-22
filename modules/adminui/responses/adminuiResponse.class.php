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

    /**
     * @var \Jelix\AdminUI\UIManager
     */
    protected $uiManager;

    public function __construct()
    {
        parent::__construct();
        $this->uiManager = new \Jelix\AdminUI\UIManager();
    }

    public function getUIManager() {
        return $this->uiManager;
    }

    protected function doAfterActions()
    {

        jEvent::notify('adminui.loading', array('uiManager'=> $this->uiManager));

        $confAdminUI = \jApp::config()->adminui;
        $this->title .= ($this->title !=''?'Admin':'');
        $this->bodyTagAttributes['class'] = $confAdminUI['cssBodyClass'];
        $this->body->assignIfNone('page_title', 'Admin');
        $this->body->assignIfNone('sub_page_title', '');
        $this->body->assignIfNone('appHtmlLogo', $confAdminUI['htmlLogo']);
        $this->body->assignIfNone('appHtmlLogoMini', $confAdminUI['htmlLogoMini']);
        $this->body->assignIfNone('appHtmlCopyright', $confAdminUI['htmlCopyright']);
        $this->body->assignIfNone('appVersion', $confAdminUI['appVersion']);
        $this->body->assignIfNone('breadcrumb', array());
        $this->body->assign('navbar', $this->uiManager->navbar());
        $this->body->assign('sidebar', $this->uiManager->sidebar());
        $this->body->assign('controlSidebar', $this->uiManager->controlSidebar());

        if (intval($this->_httpStatusCode) < 400 || $this->body->isAssigned('MAIN')) {
            $this->body->assignIfNone('MAIN','<p>Empty page</p>');
        }
        else {
            $this->title = $this->_httpStatusCode.' '.$this->_httpStatusMsg;
            $tpl = new jTpl();
            $tpl->assign('httpCode', $this->_httpStatusCode);
            $httpMessage = $this->_httpStatusMsg;
            $details = $this->body->get('httpErrorDetails');
            if ($this->_httpStatusCode == 404) {
                $httpMessage = jLocale::get('adminui~ui.http.error.404.title');
                $details = jLocale::get('adminui~ui.http.error.404.description');
            }
            else if ($this->_httpStatusCode == 403) {
                $httpMessage = jLocale::get('adminui~ui.http.error.403.title');
                $details = jLocale::get('adminui~ui.http.error.403.description');
            }
            else if ($this->_httpStatusCode == 500) {
                $httpMessage = jLocale::get('adminui~ui.http.error.500.title');
                $details = jLocale::get('adminui~ui.http.error.500.description');
            }
            $tpl->assign('httpMessage', $httpMessage);
            $tpl->assign('httpErrorDetails', $details);
            $this->body->assign('MAIN', $tpl->fetch('adminui~httperror'));
        }
    }
}
<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019-2024 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Responses;

/**
 * main HTML response for the UI. It show menu, navbar, sidebar etc.
 */
class AdminUIResponse extends AbstractHtmlResponse
{

    public $bodyTpl = 'adminui~main';
    public $bodyBareTplForError = 'adminui~main_bare';

    /**
     * @var \Jelix\AdminUI\UIManager
     */
    protected $uiManager;

    protected $previousResponseHadFullUI = false;

    public function __construct()
    {
        parent::__construct();

        $this->uiManager = new \Jelix\AdminUI\UIManager($this->_UIConfig);

        $currentResponse = \jApp::coord()->response;
        if ($currentResponse && $currentResponse instanceof AdminUIResponse) {
            $this->previousResponseHadFullUI = true;
        }
    }

    public function getUIManager()
    {
        return $this->uiManager;
    }

    protected function doAfterActions()
    {
        $showError = 0;
        if (intval($this->_httpStatusCode) >= 400) {
            $isAuthenticated = false;
            if (\jApp::isModuleEnabled('jauth') || \jApp::isModuleEnabled('jcommunity')) {
                $isAuthenticated = \jAuth::isConnected();
            }
            else if (\jApp::isModuleEnabled('authcore') && isset(\jApp::config()->sessionauth['authRequired'])) {
                $isAuthenticated = \jAuthentication::isCurrentUserAuthenticated();
            }
            if ($this->previousResponseHadFullUI && $isAuthenticated) {
                $showError = 1;
            }
            else {
                $showError = 2;
            }
        }

        if ($showError < 2) {
            \jEvent::notify('adminui.loading', array('uiManager' => $this->uiManager));
            $this->body->assign('navbar', $this->uiManager->navbar());
            $this->body->assign('sidebar', $this->uiManager->sidebar());
            $this->body->assign('controlSidebar', $this->uiManager->controlSidebar());
            $this->body->assign('footer', $this->uiManager->footer());
            $this->body->assign('brandClass', $this->_UIConfig->get('header.brand.smalltext') ? 'text-sm' : '');
            $this->body->assign('showPreloader', $this->_UIConfig->get('showPreloader'));
            $this->body->assignIfNone('breadcrumb', array());

            $this->showAppMetadata();
            $this->body->assignIfNone('page_title', '');
            $this->body->assignIfNone('sub_page_title', '');

            if ($showError ==0) {
                $this->body->assignIfNone('MAIN', '<p>Empty page</p>');
            }
            else {
                $this->showErrorPage();
            }
            $this->addBodyClass($this->uiManager->bodyCssClass());
        }
        else {
            $this->bodyTpl = $this->bodyBareTplForError;
            $this->showAppMetadata();
            $this->body->assignIfNone('page_title', '');
            $this->body->assignIfNone('sub_page_title', '');
            $this->showErrorPage();
            $cssClass = $this->_UIConfig->get('bareBodyCSSClass');
            if ($cssClass == '') {
                $cssClass = "hold-transition skin-blue login-page";
            }
            $this->addBodyClass($cssClass);
        }
    }
}
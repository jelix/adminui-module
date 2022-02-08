<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019-2022 Laurent Jouanneau
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

    /**
     * @var \Jelix\AdminUI\UIManager
     */
    protected $uiManager;

    public function __construct()
    {
        parent::__construct();

        $this->uiManager = new \Jelix\AdminUI\UIManager($this->_UIConfig);
    }

    public function getUIManager()
    {
        return $this->uiManager;
    }

    protected function doAfterActions()
    {

        \jEvent::notify('adminui.loading', array('uiManager'=> $this->uiManager));

        $this->showAppMetadata();
        $this->body->assignIfNone('page_title', 'Admin');
        $this->body->assignIfNone('sub_page_title', '');
        $this->body->assignIfNone('breadcrumb', array());
        $this->body->assign('navbar', $this->uiManager->navbar());
        $this->body->assign('sidebar', $this->uiManager->sidebar());
        $this->body->assign('controlSidebar', $this->uiManager->controlSidebar());
        $this->body->assign('footer', $this->uiManager->footer());
        $this->body->assign('brandClass', $this->_UIConfig->get('header.brand.smalltext') ?'text-sm': '');

        if (intval($this->_httpStatusCode) < 400 || $this->body->isAssigned('MAIN')) {
            $this->body->assignIfNone('MAIN', '<p>Empty page</p>');
        }
        else {
            $this->showErrorPage();
        }
        $this->addBodyClass($this->uiManager->bodyCssClass());
    }
}
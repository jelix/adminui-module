<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */
namespace Jelix\AdminUI\Responses;

use Jelix\AdminUI\UIConfig;

require_once (JELIX_LIB_PATH.'core/response/jResponseHtml.class.php');

/**
 * HTML response without menu, sidebar etc. Useful for Login page for example
 */
class AbstractHtmlResponse extends \jResponseHtml
{

    public $bodyTpl = 'adminui~main_bare';
    public $IECompatibilityMode = 'IE=edge';
    protected $_MetaOldContentType = false;
    public $metaViewport = 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no';

    /**
     * @var UIConfig
     */
    protected $_UIConfig;

    public function __construct()
    {
        $this->_UIConfig = new UIConfig(\jApp::config()->adminui);
        parent::__construct();
    }

    protected function doAfterActions()
    {
        $this->showAppMetadata();

        if (intval($this->_httpStatusCode) < 400 || $this->body->isAssigned('MAIN')) {
            $this->body->assignIfNone('MAIN', '<p>Empty page</p>');
        } else {
            $this->showErrorPage();
        }
        $this->setBodyClass('bodyCSSClass');
    }

    protected function showErrorPage()
    {
        $this->title = $this->_httpStatusCode . ' ' . $this->_httpStatusMsg;
        $tpl = new \jTpl();
        $tpl->assign('httpCode', $this->_httpStatusCode);
        $tpl->assign('classText', 'text-warning');
        $httpMessage = $this->_httpStatusMsg;
        $details = $this->body->get('httpErrorDetails');
        if ($this->_httpStatusCode == 404) {
            $httpMessage = \jLocale::get('adminui~ui.http.error.404.title');
            $details = \jLocale::get('adminui~ui.http.error.404.description');
        } else if ($this->_httpStatusCode == 403) {
            $httpMessage = \jLocale::get('adminui~ui.http.error.403.title');
            $details = \jLocale::get('adminui~ui.http.error.403.description');
        } else if ($this->_httpStatusCode == 500) {
            $tpl->assign('classText', 'text-danger');
            $httpMessage = \jLocale::get('adminui~ui.http.error.500.title');
            $details = \jLocale::get('adminui~ui.http.error.500.description');
        }
        $tpl->assign('httpMessage', $httpMessage);
        $tpl->assign('httpErrorDetails', $details);
        $this->body->assign('MAIN', $tpl->fetch('adminui~httperror'));
    }

    protected function showAppMetadata()
    {
        $confAdminUI = \jApp::config()->adminui;
        $appTitle = (isset($confAdminUI['appTitle'])?$confAdminUI['appTitle']: '');
        if ($appTitle) {
            $this->title .= ($this->title != '' ? ' - ':''). $appTitle;
        }

        $this->body->assignIfNone('appHtmlLogo', $confAdminUI['htmlLogo']);
        $this->body->assignIfNone('appHtmlLogoMini', $confAdminUI['htmlLogoMini']);
        $this->body->assignIfNone('appHtmlCopyright', $confAdminUI['htmlCopyright']);
        $this->body->assignIfNone('appVersion', $confAdminUI['appVersion']);
        $this->body->assign('urlAdminLteAssets', \jApp::urlBasePath().$confAdminUI['adminlteAssetsUrl']);
    }

    public function addBodyClass($class)
    {
        if (!isset($this->bodyTagAttributes['class'])) {
            $this->bodyTagAttributes['class'] = $class;
        }
        else {
            $this->bodyTagAttributes['class'] .= $class;
        }
    }
}

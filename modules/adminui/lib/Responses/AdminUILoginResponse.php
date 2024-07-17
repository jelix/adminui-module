<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2024 Laurent Jouanneau
 * @link     https://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Responses;

/**
 * HTML response without menu, sidebar, for Login page
 */
class AdminUILoginResponse extends AbstractHtmlResponse
{

    public $bodyTpl = 'adminui~main_login';

    protected function doAfterActions()
    {
        $this->showAppMetadata();

        if (intval($this->_httpStatusCode) < 400 || $this->body->isAssigned('MAIN')) {
            $this->body->assignIfNone('MAIN', '<p><!-- nothing here ??--></p>');
        }
        else {
            $this->showErrorPage();
        }

        $cssClass = $this->_UIConfig->get('loginBodyCSSClass');
        if ($cssClass == '') {
            $cssClass = "hold-transition login-page";
        }
        $this->addBodyClass($cssClass);

        if (!$this->body->isAssigned('boxTitle')) {
            $this->body->assign('boxTitle', \jLocale::get('adminui~ui.page.login.title'));
        }

    }
}
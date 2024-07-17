<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2024 Laurent Jouanneau
 * @link     https://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Responses;

/**
 * HTML response without menu, sidebar, for register page
 */
class AdminUIRegisterResponse extends AbstractHtmlResponse
{

    public $bodyTpl = 'adminui~main_register';

    protected function doAfterActions()
    {
        $this->showAppMetadata();

        if (intval($this->_httpStatusCode) < 400 || $this->body->isAssigned('MAIN')) {
            $this->body->assignIfNone('MAIN', '<p><!-- nothing here ??--></p>');
        }
        else {
            $this->showErrorPage();
        }

        $cssClass = $this->_UIConfig->get('registerBodyCSSClass');
        if ($cssClass == '') {
            $cssClass = "hold-transition register-page";
        }
        $this->addBodyClass($cssClass);

        if (!$this->body->isAssigned('boxTitle')) {
            $this->body->assign('boxTitle', \jLocale::get('adminui~ui.page.register.title'));
        }
    }
}
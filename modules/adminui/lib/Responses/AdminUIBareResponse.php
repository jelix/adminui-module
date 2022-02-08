<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019-2022 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Responses;

/**
 * HTML response without menu, sidebar etc. Useful for Login page for example
 */
class AdminUIBareResponse extends AbstractHtmlResponse
{

    public $bodyTpl = 'adminui~main_bare';

    protected function doAfterActions()
    {
        $this->showAppMetadata();

        if (intval($this->_httpStatusCode) < 400 || $this->body->isAssigned('MAIN')) {
            $this->body->assignIfNone('MAIN', '<p>Empty page</p>');
        }
        else {
            $this->showErrorPage();
        }

        $cssClass = $this->_UIConfig->get('bareBodyCSSClass');
        if ($cssClass == '') {
            $cssClass = "hold-transition skin-blue login-page";
        }
        $this->addBodyClass($cssClass);
    }
}
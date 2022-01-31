<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI;


class Footer
{

    protected $tpl;

    protected $templateSelector = 'adminui~footer';

    public function __construct()
    {
        $this->tpl = new \jTpl();
        $confAdminUI = \jApp::config()->adminui;
        $this->tpl->assign('appHtmlCopyright', $confAdminUI['htmlCopyright']);
        $this->tpl->assign('appVersion', $confAdminUI['appVersion']);
    }

    function setTemplateSelector($selector)
    {
        $this->templateSelector = $selector;
    }

    /**
     * set a template variable
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    function setTplVar($name, $value)
    {
        $this->tpl->assign($name, $value);
    }

    public function __toString()
    {
        return $this->tpl->fetch($this->templateSelector);
    }

}
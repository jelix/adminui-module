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

    /**
     * @var UIConfig
     */
    protected $_config;

    function __construct(UIConfig $config)
    {
        $this->_config = $config;
        $this->tpl = new \jTpl();
        $this->tpl->assign('appHtmlCopyright', $config->get('htmlCopyright'));
        $this->tpl->assign('appVersion', $config->get('appVersion'));
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

    function cssClass()
    {
        return
            ($this->_config->get('footer.smalltext')?'text-sm':'')
            ;
    }


    public function __toString()
    {
        return $this->tpl->fetch($this->templateSelector);
    }

}
<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\NavBar;

use Jelix\AdminUI\Link;
use Jelix\AdminUI\Bar\Item;

class DropDown extends Item {

    const COUNTER_TYPE_OK = "ok";
    const COUNTER_TYPE_WARNING = "warning";
    const COUNTER_TYPE_ERROR = "error";

    const ICON_ENVELOPE = "envelope";

    protected $tpl;

    protected $templateSelector = 'adminui~navbar_dropdown';

    /**
     * DropDown constructor.
     * @param string $label
     * @param string $icon one of ICON_ constants or other keyword supported by the theme
     */
    function __construct($label, $icon, $order = 0)
    {
        parent::__construct($label, $order);
        $this->tpl = new \jTpl();
        $this->tpl->assign('icon', $icon);
        $this->tpl->assign('label', $label);
        $this->tpl->assign(array(
            'counter'=>null,
            'counter_type'=>'',
            'header' => '',
            'content' => '',
            'footer' => '',
            'footerLink' => null,
        ));
    }

    function setCounter($count, $type) {
        $this->tpl->assign('counter', $count);
        $this->tpl->assign('counter_type', $type);
    }

    function setHeader($header) {
        $this->tpl->assign('header', $header);
    }

    function setContent($content) {
        $this->tpl->assign('content', $content);
    }

    /**
     * @param string|Link $footer
     */
    function setFooter($footer) {
        if ($footer instanceof Link) {
            $this->tpl->assign('footerLink', $footer);
            $this->tpl->assign('footer', '');
        }
        else {
            $this->tpl->assign('footer', $footer);
            $this->tpl->assign('footerLink', null);
        }
    }

    public function __toString()
    {
        return $this->tpl->fetch($this->templateSelector);
    }
}
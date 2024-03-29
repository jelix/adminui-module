<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019-2022 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\NavBar;

use Jelix\AdminUI\Bar\BadgePillTrait;
use Jelix\AdminUI\Link;
use Jelix\AdminUI\Bar\Item;

class DropDown extends Item {

    use BadgePillTrait;

    const BADGE_PILL_PRIMARY = 'primary';
    const BADGE_PILL_SECONDARY = 'secondary';
    const BADGE_PILL_SUCCESS = 'success';
    const BADGE_PILL_DANGER = 'danger';
    const BADGE_PILL_WARNING = 'warning';
    const BADGE_PILL_INFO = 'info';

    const ICON_ENVELOPE = "comments";
    const ICON_NOTIFICATION = "bell";
    const ICON_TASKS = "flag";

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
            'header' => '',
            'content' => '',
            'footer' => ''
        ));
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
            $footer->setCssClass('dropdown-item dropdown-footer');
        }
        $this->tpl->assign('footer', $footer);
    }

    public function __toString()
    {
        $this->tpl->assignIfNone('footer', '');
        $this->tpl->assign('badgePills', $this->badgePills);
        return $this->tpl->fetch($this->templateSelector);
    }
}
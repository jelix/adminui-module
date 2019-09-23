<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Dashboard;



class SmallBox extends Box {

    /** @var \jTpl */
    protected $tpl;

    protected $tplSelector = 'adminui~dashboard_small_box';

    function __construct($id, $title, $information, $link='', $iconClass='' , $backgroundClass = 'bg-aqua')
    {
        parent::__construct($id);
        $this->tpl = new \jTpl();

        if (strpos($iconClass, 'ion-') !== false) {
            $iconClass = 'ion '.$iconClass;
        }

        $this->tpl->assign(array(
            'id' => $id,
            'title' => $title,
            'information' => $information,
            'link' => $link,
            'iconClass' => $iconClass,
            'backgroundClass' => $backgroundClass
        ));
    }

    function setTemplate($selector, $variables = null) {
        $this->tplSelector = $selector;
        if (is_array($variables)) {
            $this->tpl->assign($variables);
        }
    }

    function getContent() {
        return $this->tpl->fetch($this->tplSelector);
    }

}

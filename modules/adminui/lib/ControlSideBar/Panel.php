<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */
namespace Jelix\AdminUI\ControlSideBar;

class Panel {

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $icon;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var int
     */
    protected $order = 0;

    /**
     * @var string htmlContent
     */
    protected $htmlContent = '';

    /**
     *
     * @param string $label
     * @param integer $order the order of the item in the list of navbar items
     */
    function __construct($id, $label, $icon='', $order = 0)
    {
        $this->label = $label;
        $this->order = $order;
        $this->icon = $icon;
        $this->id = $id;
    }

    function getLabel() {
        return $this->label;
    }

    function getIcon() {
        return $this->icon;
    }

    function getId() {
        return $this->id;
    }


    function getOrder() {
        return $this->order;
    }

    /**
     * @param string $htmlContent
     */
    function setContent($htmlContent) {
        $this->htmlContent = $htmlContent;
    }

    function getContent() {
        return $this->htmlContent;
    }
}

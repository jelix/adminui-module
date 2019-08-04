<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\SideBar;

abstract class MenuItem
{
    protected $id = '';
    protected $label = '';
    protected $type = 'content';
    protected $order = 0;
    protected $icon = '';

    protected $active = null;

    public function __construct($id, $label, $icon = '', $order = 0)
    {
        $this->id = $id;
        $this->label = $label;
        $this->order = $order;
        $this->icon = $icon;
    }

    public function setLabel($label, $icon = '')
    {
        $this->label = $label;
        $this->icon = $icon;
    }

    public function setIcon($icon = '')
    {
        $this->icon = $icon;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getId()
    {
        return $this->id;
    }

    function getLabel()
    {
        return $this->label;
    }

    function getIcon()
    {
        return $this->icon;
    }

    function getOrder()
    {
        return $this->order;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function setActive($active = true)
    {
        $this->active = $active;
    }

    public function isActive()
    {
        return $this->active === true;
    }

}

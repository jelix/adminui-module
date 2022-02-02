<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\NavBar;

/**
 * Represents a notification item into a DropDownNotifications
 */
class NotificationItem
{
    protected $date;

    protected $label;

    protected $url;

    protected $newWindow = false;

    protected $icon = '';

    function __construct($label, $url, $date, $icon, $newWindow = false) {
        $this->url = $url;
        $this->label = $label;
        $this->date = $date;
        $this->newWindow = $newWindow;
        $this->icon = $icon;
    }

    function getUrl() {
        return $this->url;
    }
    function getLabel() {
        return $this->label;
    }

    function getIcon() {
        return $this->icon;
    }

    function getDate() {
        return $this->date;
    }

    /*function getElapsedTime()
    {

    }*/

    function toNewWindow() {
        return $this->newWindow;
    }

}
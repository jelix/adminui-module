<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\NavBar;

/**
 * Represents a message item into a DropDownMessages
 */
class NotificationTypeItem {

    protected $senderName;

    protected $senderImage = '';

    protected $date;

    protected $subject;

    protected $url;

    protected $newWindow = false;

    protected $icon = '';

    function __construct($subject, $url, $date, $icon, $newWindow = false) {
        $this->url = $url;
        $this->subject = $subject;
        $this->date = $date;
        $this->newWindow = $newWindow;
        $this->icon = $icon;
    }

    function getUrl() {
        return $this->url;
    }
    function getSubject() {
        return $this->subject;
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
<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\NavBar;

/**
 * Represents a message item into a DropDownMessages
 */
class MessageItem {

    protected $senderName;

    protected $senderImage = '';

    protected $date;

    protected $subject;

    protected $url;

    protected $newWindow = false;

    function __construct($subject, $url, $date, $newWindow = false) {
        $this->url = $url;
        $this->subject = $subject;
        $this->date = $date;
        $this->newWindow = $newWindow;
    }

    function setSender($senderName, $senderImage='') {
        $this->senderName = $senderName;
        $this->senderImage = $senderImage;
    }

    function getUrl() {
        return $this->url;
    }
    function getSubject() {
        return $this->subject;
    }

    function getSenderName() {
        return $this->senderName;
    }

    function getSenderImage() {
        return $this->senderImage;
    }

    function getDate() {
        return $this->date;
    }

    function setNewWindow($newWindow) {
        $this->newWindow = $newWindow;
    }

    function toNewWindow() {
        return $this->newWindow;
    }

}
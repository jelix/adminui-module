<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\NavBar;


use Jelix\AdminUI\Link;

class DropDownMessages extends DropDownMenu {

    protected $cssClass = 'messages-menu';

    function __construct($urlAllMessages, $label = '', $icon = '', $order = 0) {
        if ($label == '') {
            $label = \jLocale::get('adminui~ui.header.messages.title');
        }
        if ($icon == '') {
            $icon = self::ICON_ENVELOPE;
        }
        parent::__construct($label, $icon, $order);

        $this->setFooter(new Link($urlAllMessages, \jLocale::get('adminui~ui.header.messages.all')));
    }

    function addMessage(MessageItem $message) {
        $this->links[] = $message;
    }

    function createAddMessage($subject, $url, $date, $senderName) {
        $msg = new MessageItem($subject, $url, $date);
        $msg->setSender($senderName);
        $this->links[] = $msg;
        return $msg;
    }

    public function __toString()
    {
        $count = count($this->links);
        if ($count) {
            $this->setBadgePill(count($this->links), self::BADGE_PILL_SUCCESS);
            if ($count == 1) {
                $this->setHeader(\jLocale::get('adminui~ui.header.messages.count.one'));
            }
            else {
                $this->setHeader(\jLocale::get('adminui~ui.header.messages.counts', $count));
            }
        }
        else {
            $this->setHeader(\jLocale::get('adminui~ui.header.messages.count.none'));
        }

        return parent::__toString();
    }
}

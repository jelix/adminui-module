<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\NavBar;


use Jelix\AdminUI\Link;

class DropDownNotifications extends DropDownMenu {

    protected $cssClass = 'notifications-menu';

    function __construct($urlAllMessages, $label = '', $icon = '', $order = 0) {
        if ($label == '') {
            $label = \jLocale::get('adminui~ui.header.notifications.title');
        }
        if ($icon == '') {
            $icon = self::ICON_NOTIFICATION;
        }
        parent::__construct($label, $icon, $order);

        $this->setFooter(new Link($urlAllMessages, \jLocale::get('adminui~ui.header.notifications.all')));
    }

    function addNotification(NotificationItem $notif) {
        $this->links[] = $notif;
    }

    function createAddNotification($label, $url, $date, $icon = '', $newWindow = false) {
        $msg = new NotificationItem($label, $url, $date,  $icon, $newWindow);
        $this->links[] = $msg;
        return $msg;
    }

    public function __toString()
    {
        $count = count($this->links);
        if ($count) {
            $this->setBadgePill(count($this->links), self::BADGE_PILL_SUCCESS);
            if ($count == 1) {
                $this->setHeader(\jLocale::get('adminui~ui.header.notifications.count.one'));
            }
            else {
                $this->setHeader(\jLocale::get('adminui~ui.header.notifications.counts', $count));
            }
        }
        else {
            $this->setHeader(\jLocale::get('adminui~ui.header.notifications.count.none'));
        }

        return parent::__toString();
    }
}

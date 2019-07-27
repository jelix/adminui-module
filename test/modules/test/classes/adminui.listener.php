<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */


class adminuiListener extends jEventListener
{

    protected $eventMapping = array(
        'adminui.loading' => 'onAdminUILoading'
    );

    /**
     * @param jEvent $event
     */
    function onAdminUILoading($event) {
        /** @var \Jelix\AdminUI\UIManager $uim */
        $uim = $event->uiManager;

        $item = new \Jelix\AdminUI\NavBar\DropDown('foo', '');
        $item->setCounter(17, $item::COUNTER_TYPE_OK);
        $item->setHeader('super foo');
        $item->setFooter(new \Jelix\AdminUI\Link('https://jelix.org', 'Go to Jelix.org'));
        $item->setContent('<p>Hello world</p>');

        $uim->navbar()->addItem($item);
    }
}
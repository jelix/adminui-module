<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\NavBar;


class AccountDropDown extends DropDownMenu {

    /**
     * @var boolean|null  null when the status is unknown
     */
    protected $_isAuthenticated = null;

    protected $templateSelector = 'adminui~navbar_dropdown_usermenu';

    function __construct($order = 100)
    {
        $label = \jLocale::get('adminui~ui.header.account.signin');
        parent::__construct($label, 'sign-in', $order);
    }

    function setNotAuthenticated($signInLink) {
        $this->_isAuthenticated = false;
        $this->tpl->assign('login', '');
        $this->tpl->assign('username', '');
        $this->tpl->assign('photoUrl', '');
        $this->tpl->assign('signInLink', $signInLink);
        $this->tpl->assign('signOutLink', '');
        $this->tpl->assign('profileLink', '');
    }

    function setAuthenticated($login, $username, $signOutLink, $profileLink = '', $photoUrl = '') {
        $this->_isAuthenticated = true;
        $this->tpl->assign('login', $login);
        $this->tpl->assign('username', $username);
        $this->tpl->assign('photoUrl', $photoUrl);
        $this->tpl->assign('signOutLink', $signOutLink);
        $this->tpl->assign('profileLink', $profileLink);

    }

    /**
     * @return boolean|null  null when the status is unknown
     */
    function isAuthenticated() {
        return $this->_isAuthenticated;
    }

    public function __toString()
    {
        if ($this->_isAuthenticated === null) {
            return '';
        }
        $this->tpl->assign('isAuthenticated', $this->_isAuthenticated);
        return parent::__toString();
    }

}
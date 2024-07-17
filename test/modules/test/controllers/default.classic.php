<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

class defaultCtrl extends jController
{
    /**
     *
     */
    function index()
    {
        $rep = $this->getResponse('html');
        $tpl = new jTpl();


        $rep->body->assign('page_title', 'Blank Page');
        $rep->body->assign('sub_page_title', 'it all starts here');
        $rep->body->assign('breadcrumb', array(
            array('url' => jUrl::get('adminui~default:index'), 'label' => 'Home', 'icon-class' => 'fa fa-dashboard'),
            array('url' => '#', 'label' => 'Examples')
        ));
        $rep->body->assign('MAIN', $tpl->fetch('adminui~blank'));
        return $rep;
    }

    function login()
    {
        $rep = $this->getResponse('htmllogin');
        $tpl = new jTpl();

        $rep->body->assign('page_title', 'Login');
        $rep->body->assign('MAIN', $tpl->fetch('test~login'));
        return $rep;
    }

    function logincheck()
    {
        $rep = $this->getResponse('redirect');
        $rep->action = 'test~default:index';
        return $rep;
    }

    function forgotpassword()
    {
        $rep = $this->getResponse('htmllogin');
        $tpl = new jTpl();

        $rep->body->assign('page_title', 'Login');
        $rep->body->assign('boxTitle', 'You forgot your password? Here you can easily retrieve a new password');
        $rep->body->assign('MAIN', $tpl->fetch('test~forgotpassword'));
        return $rep;
    }

    function recoverpassword()
    {
        $rep = $this->getResponse('htmllogin');
        $tpl = new jTpl();

        $rep->body->assign('page_title', 'Login');
        $rep->body->assign('boxTitle', 'You are only one step a way from your new password, recover your password now.');
        $rep->body->assign('MAIN', $tpl->fetch('test~recoverpassword'));
        return $rep;
    }


    function passwordrecovered()
    {
        $rep = $this->getResponse('htmllogin');
        $tpl = new jTpl();

        $rep->body->assign('page_title', 'Login');
        $rep->body->assign('boxTitle', '');
        $rep->body->assign('MAIN', $tpl->fetch('test~passwordrecovered'));
        return $rep;
    }

    function register()
    {
        $rep = $this->getResponse('htmlregister');
        $tpl = new jTpl();

        $rep->body->assign('page_title', 'Register');
        $rep->body->assign('MAIN', $tpl->fetch('test~register'));
        return $rep;
    }

    function registersave()
    {
        $rep = $this->getResponse('htmlregister');
        $tpl = new jTpl();

        $rep->body->assign('page_title', 'Register');
        $rep->body->assign('MAIN', $tpl->fetch('test~registersaved'));
        return $rep;
    }


    function form()
    {
        $rep = $this->getResponse('html');
        $tpl = new jTpl();

        $form = jForms::get('test~formallwidgets');
        if (!$form || $this->param('delete')) {
            $form = jForms::create('test~formallwidgets');
            $form->setData('nom', 'Laurent');
            $form->setData('sexe', 'h');
            $form->setData('mail', 'laurent@example.com');
            $form->setData('conf', 'cf3');
            $form->setData('autocompletetown', 'ma');
            $form->setData('description', '<p>This is a <strong>document</strong> in html</p>');
            $form->setData('wikicontent', 'Lorem __ipsum__');
            $form->setData('objets', 'voiture');
            $form->setData('birthdaydate', '1990-01-01');
            $form->setData('task', 'assigned');
            $form->setData('assignee', 'Maurice');
            $form->setData('explanation', 'He should fix bugs');
        }

        $tpl->assign('form', $form);

        $rep->body->assign('page_title', 'A form');
        $rep->body->assign('sub_page_title', 'Show all jForms widgets for AdminLte');
        $tpl->assign('customform' , $this->param('custom'));
        $rep->body->assign('MAIN', $tpl->fetch('test~form'));
        return $rep;
    }

    function formsave()
    {
        $rep = $this->getResponse('redirect');
        $form = jForms::fill('test~formallwidgets');
        if (!$form->check()) {
            $rep->action = 'test~default:formsave';
        }
        else {
            $rep->action = 'test~default:formdata';
        }
        return $rep;
    }


    function formdata()
    {
        $rep = $this->getResponse('html');
        $tpl = new jTpl();

        $form = jForms::get('test~formallwidgets');

        $tpl->assign('form', $form);

        $rep->body->assign('page_title', 'Values of the form');
        $rep->body->assign('sub_page_title', 'Show all jForms widgets for AdminLte in the view mode');

        $rep->body->assign('MAIN', $tpl->fetch('test~formview'));
        return $rep;
    }


    function error404()
    {
        $rep = $this->getResponse('html');
        $rep->setHttpStatus(404, 'Not found');
        return $rep;
    }

    function error500()
    {
        $rep = $this->getResponse('html');
        $rep->setHttpStatus(500, 'Error');
        return $rep;
    }
}


<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/reset_html/reset_html.formwidget.php';

class reset_adminlteFormWidget extends reset_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;

    protected function getCSSClass()
    {
        $class = parent::getCSSClass();
        return $class.' btn btn-default';
    }
}

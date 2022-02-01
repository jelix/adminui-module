<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/date_html/date_html.formwidget.php';

class date_adminlteFormWidget extends date_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;

    protected function getCSSClass()
    {
        $class = parent::getCSSClass();
        return $class.' form-control';
    }
}

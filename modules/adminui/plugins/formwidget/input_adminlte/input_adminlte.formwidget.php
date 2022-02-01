<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/input_html/input_html.formwidget.php';

class input_adminlteFormWidget extends input_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;

    protected function getCSSClass()
    {
        $class = parent::getCSSClass();
        return $class.' form-control';
    }
}

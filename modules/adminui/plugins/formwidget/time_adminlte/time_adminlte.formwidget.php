<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */

require_once JELIX_LIB_PATH.'plugins/formwidget/time_html/time_html.formwidget.php';

class time_adminlteFormWidget extends time_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;

    protected function getCSSClass()
    {
        $class = parent::getCSSClass();
        return $class.' form-control';
    }
}

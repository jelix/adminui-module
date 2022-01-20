<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/htmleditor_html/htmleditor_html.formwidget.php';

class htmleditor_adminlteFormWidget extends htmleditor_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;
}

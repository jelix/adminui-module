<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/wikieditor_html/wikieditor_html.formwidget.php';

class wikieditor_adminlteFormWidget extends wikieditor_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;
}

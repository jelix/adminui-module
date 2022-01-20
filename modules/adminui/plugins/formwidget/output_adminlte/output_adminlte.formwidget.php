<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/output_html/output_html.formwidget.php';

class output_adminlteFormWidget extends output_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;

}

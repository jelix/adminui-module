<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/upload_html/upload_html.formwidget.php';

class upload_adminlteFormWidget extends upload_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;
}

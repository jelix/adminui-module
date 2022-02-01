<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/recaptcha_html/recaptcha_html.formwidget.php';

class recaptcha_adminlteFormWidget extends recaptcha_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;
}

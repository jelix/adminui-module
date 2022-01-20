<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/captcha_html/captcha_html.formwidget.php';

class captcha_adminlteFormWidget extends captcha_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;

    protected function getCSSClass()
    {
        $class = parent::getCSSClass();
        return $class.' form-control';
    }

    public function outputControl()
    {
        $attr = $this->getControlAttributes();

        $data = $this->ctrl->initCaptcha();

        unset($attr['readonly']);
        $attr['type'] = 'text';
        $attr['value'] = '';
        echo '<input';
        $this->_outputAttr($attr);
        echo "/>\n";
        echo '<span class="jforms-captcha-question help-block">',htmlspecialchars($data['question']),'</span> ';

        $this->outputJs();
    }

}

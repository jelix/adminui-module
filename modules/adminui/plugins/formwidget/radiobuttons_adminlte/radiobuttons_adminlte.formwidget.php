<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/radiobuttons_html/radiobuttons_html.formwidget.php';


class radiobuttons_adminlteFormWidget extends radiobuttons_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;
    use \Jelix\AdminUI\Form\ChoiceControlTrait;

    protected function getCSSClass()
    {
        return 'form-check-input '.parent::getCSSClass();
    }

    protected function displayRadioCheckbox($attr, $label, $checked)
    {
        echo '<div class="radio jforms-chkbox jforms-ctl-'.$this->ctrl->ref.' form-check">'.
            '<input type="radio"';
        $this->_outputAttr($attr);
        if ($checked) {
            echo ' checked';
        }
        echo '/><label class="form-check-label" for="'.$attr['id'].'">',htmlspecialchars($label),"</label></div>\n";
    }
}

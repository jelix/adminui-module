<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/checkboxes_html/checkboxes_html.formwidget.php';

class checkboxes_adminlteFormWidget extends checkboxes_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;

    protected function displayRadioCheckbox($attr, $label, $checked)
    {
        echo '<div class="checkbox jforms-chkbox jforms-ctl-'.$this->ctrl->ref.'">'.
            '<label><input type="checkbox"';
        $this->_outputAttr($attr);
        if ($checked) {
            echo ' checked';
        }
        echo '/>',htmlspecialchars($label),"</label></div>\n";
    }


}

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
    protected function displayRadioCheckbox($attr, $label, $checked)
    {
        echo '<div class="radio jforms-chkbox jforms-ctl-'.$this->ctrl->ref.'">'.
            '<label><input type="radio"';
        $this->_outputAttr($attr);
        if ($checked) {
            echo ' checked';
        }
        echo '/>',htmlspecialchars($label),"</label></div>\n";
    }
}

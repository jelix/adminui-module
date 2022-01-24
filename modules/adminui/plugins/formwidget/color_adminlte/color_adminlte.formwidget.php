<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */

require_once JELIX_LIB_PATH.'plugins/formwidget/color_html/color_html.formwidget.php';

class color_adminlteFormWidget extends color_htmlFormWidget
{
    protected function getCSSClass()
    {
        $class = parent::getCSSClass();
        return $class.' form-control';
    }

    public function outputControlValue()
    {
        $attr = $this->getValueAttributes();
        $value = $this->getValue();
        $value = $this->ctrl->getDisplayValue($value);
        $attr['style'] = 'display:inline-block;width:20px;height:20px;background-color:'.$value;
        echo '<span data-value="'.$value.'" ';
        $this->_outputAttr($attr);
        echo '> </span>';
    }
}

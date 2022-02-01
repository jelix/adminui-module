<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/group_html/group_html.formwidget.php';

class group_adminlteFormWidget extends group_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;

    public function outputLabel($format = '', $editMode = true)
    {
        if ($editMode || !$this->ctrl->hasCheckbox) {
            return;
        }

        $attr = $this->getLabelAttributes($editMode);
        if ($format) {
            $label = sprintf($format, $this->ctrl->label);
        } else {
            $label = $this->ctrl->label;
        }
        $this->outputLabelAsTitle($label, $attr);
    }

    protected function displayStartGroup($groupId, $label, $checkBoxAttr=array())
    {
        if (count($checkBoxAttr) == 0) {
            echo '<fieldset id="',$groupId,'" class="jforms-ctrl-group"><legend>',htmlspecialchars($label),"</legend>\n";
        }
        else {
            echo '<fieldset id="',$groupId,'" class="jforms-ctrl-group"><legend>',
            '<input ';
            $this->_outputAttr($checkBoxAttr);
            echo '> <label for="'.$checkBoxAttr['id'].'">',htmlspecialchars($label),"</label></legend>\n";
        }
        echo '<div class="jforms-table-group">',"\n";
    }

    /**
     * @param \Jelix\Forms\HtmlWidget\WidgetInterface $widget
     */
    protected function displayChildControl($widget)
    {
        echo '<div class="form-group">';
        $widget->outputLabel();
        echo '<div class="controls">';
        $widget->outputControl();
        $widget->outputHelp();
        echo "</div>\n</div>\n";
    }

    protected function displayEndGroup()
    {
        echo "</div></fieldset>\n";
    }


    /**
     * @param $groupId
     * @param $label
     * @param boolean $hasChildControlValue true if all values of child controls will be displayed
     * @return void
     */
    protected function displayStartValueGroup($groupId, $label, $hasChildControlValue)
    {

        if ($hasChildControlValue) {
            echo '<fieldset id="',$groupId,'" class="jforms-ctrl-group"><legend>',htmlspecialchars($label),"</legend>\n";
            echo '<div class="jforms-table-group">',"\n";
        }
        else {
            $this->outputLabel('', false);
        }
    }

    protected function displayEmptyValue()
    {
        echo '<div class="controls col-sm-10">';
        parent::displayEmptyValue();
        echo "</div>\n";
    }

    /**
     * @param \Jelix\Forms\HtmlWidget\WidgetInterface $widget
     */
    protected function displayChildControlValue($widget)
    {
        echo '<div class="form-group">';
        $widget->outputLabel('', false);
        echo '<div class="col-sm-10">';
        $widget->outputControlValue();
        echo "</div>\n</div>\n";
    }

    /**
     * @param boolean $hasChildControlValue true if all values of child controls have been displayed
     * @return void
     */
    protected function displayEndValueGroup($hasChildControlValue)
    {
        if ($hasChildControlValue) {
            echo "</div>\n";
            echo "</fieldset>\n";
        }
    }

}

<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/choice_html/choice_html.formwidget.php';

class choice_adminlteFormWidget extends choice_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;


    protected function displayStartChoiceItem($idItem, $attrRadio, $checked, $label, $attrLabel)
    {
        echo '<li id="'.$idItem.'"><div class="radio">','<label ';
        $this->_outputAttr($attrLabel);
        echo '> <input ';
        $this->_outputAttr($attrRadio);
        echo ' '.($checked ? 'checked' : '').'/> ';
        echo htmlspecialchars($label)."</label></div>\n";
    }

    /**
     * @param \Jelix\Forms\HtmlWidget\WidgetInterface $widget
     */
    protected function displayControl($widget)
    {
        echo ' <div class="jforms-item-controls form-group">';
        $widget->outputLabel();
        echo '<div class="controls">';
        $widget->outputControl();
        $widget->outputHelp();
        echo "</div></div>\n";
    }
}


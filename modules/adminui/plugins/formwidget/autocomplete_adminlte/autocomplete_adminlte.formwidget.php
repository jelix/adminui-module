<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/autocomplete_html/autocomplete_html.formwidget.php';

class autocomplete_adminlteFormWidget extends autocomplete_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;
    /**
     * @param array $attrAutoComplete
     * @param array $attrSelect
     * @param string $value
     * @param string|null $emptyLabel null if an empty item should not be shown
     */
    protected function displayAutocompleteInput($attrAutoComplete, $attrSelect, $value, $emptyLabel)
    {
        $attrAutoComplete['class'] .= ' form-control';
        echo '<div class="autocomplete-box input-group">
               <input type="text" ';
        $this->_outputAttr($attrAutoComplete);
        echo '>
                <span class="input-group-btn">
                    <button class="autocomplete-trash btn btn-info btn-flat" title="'.jLocale::get('jelix~ui.buttons.erase').'" type="button">'.jLocale::get('jelix~ui.buttons.erase').'</button>
                </span> 

                <span class="autocomplete-no-search-results" style="display:none">
                '.jLocale::get('jelix~jforms.autocomplete.no.results').'</span>   
            ';
        $this->displaySelectChoices($attrSelect, $value, $emptyLabel);
        echo "</div>\n";
    }

}

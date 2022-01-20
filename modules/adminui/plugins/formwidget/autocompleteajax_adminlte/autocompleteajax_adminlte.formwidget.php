<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/autocomplete_html/autocompleteajax_html.formwidget.php';

class autocompleteajax_adminlteFormWidget extends autocompleteajax_htmlFormWidget
{
    /**
     * @param array $attrAutoComplete
     * @param array $attrHidden attributes for the hidden input that will contain the selected value
     */
    protected function displayAutocompleteInput($attrAutoComplete, $attrHidden)
    {
        $attrAutoComplete['class'] .= ' form-control';
        echo '<div class="autocomplete-box  input-group"><input type="text" ';
        $this->_outputAttr($attrAutoComplete);
        echo '>
                <span class="input-group-btn">
                    <button class="autocomplete-trash btn btn-info btn-flat" title="'.jLocale::get('jelix~ui.buttons.erase').'" type="button">'.jLocale::get('jelix~ui.buttons.erase').'</button>
                </span> 

                <span class="autocomplete-no-search-results" style="display:none">
                '.jLocale::get('jelix~jforms.autocomplete.no.results').'</span> 
                <input type="hidden" ';
        $this->_outputAttr($attrHidden);
        echo '/>';

        echo "</div>\n";
    }
}

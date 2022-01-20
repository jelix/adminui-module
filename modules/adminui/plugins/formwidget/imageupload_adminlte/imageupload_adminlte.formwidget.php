<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/imageupload_html/imageupload_html.formwidget.php';

class imageupload_adminlteFormWidget extends imageupload_htmlFormWidget
{
    use \Jelix\AdminUI\Form\WidgetTrait;

    protected function displayModifyButton($imageSelector, $currentFileName)
    {
        echo '<button class="jforms-image-modify-btn btn btn-info" type="button" 
            data-current-image="'.$imageSelector.'" 
            data-current-file-name="'.htmlspecialchars($currentFileName).'">'.
            jLocale::get('jelix~jforms.upload.picture.choice.modify').
            '</button>'."\n";
    }

    protected function displaySelectButton()
    {
        echo '<button class="jforms-image-select-btn btn btn-info" type="button">'.jLocale::get('jelix~jforms.upload.picture.choice.new.file').'</button>'."\n";
    }
}

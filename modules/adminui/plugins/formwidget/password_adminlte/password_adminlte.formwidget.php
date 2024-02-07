<?php
/**
 * @author    Raphaël MARTIN
 * @copyright 2023 Raphaël MARTIN
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH . 'plugins/formwidget/password_html/password_html.formwidget.php';

class password_adminlteFormWidget extends password_htmlFormWidget {
    use \Jelix\AdminUI\Form\WidgetTrait;

    protected function displayInput(&$attr, $btnLabels) {
        echo '<div class="jforms-password-editor"><div class="input-group"><input';
        $this->_outputAttr($attr);
        echo "/>\n";

        $designPath = jApp::urlJelixWWWPath() . 'design/icons8/';
        $urlshow = $designPath . 'icons8-eye-24.png';
        $urlhide = $designPath . 'icons8-invisible-24.png';
        extract($btnLabels);

        echo <<<EOHTML
            <div class="jforms-password-buttons input-group-append">
                <button type="button" class="btn btn-outline-secondary jforms-password-toggle-visibility" title="$showLabel">
                    <img src="$urlshow"  data-src-show="$urlshow"  data-src-hide="$urlhide" alt="$showLabel" width="15" class="jforms-password-visibility"/>
                </button>
            </div>
            </div>
        </div>

EOHTML;
    }

    protected function getCSSClass() {
        $class = parent::getCSSClass();
        return $class . ' form-control';
    }
}

<?php
/**
 * @author    Raphaël MARTIN
 * @copyright 2023 Raphaël MARTIN
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH . 'plugins/formwidget/passwordeditor_html/passwordeditor_html.formwidget.php';

class passwordeditor_adminlteFormWidget extends passwordeditor_htmlFormWidget {
    use \Jelix\AdminUI\Form\WidgetTrait;

    public function outputMetaContent($resp) {
        $JelixWWWPath = jApp::urlJelixWWWPath();
        $resp->addJSLink($JelixWWWPath . 'js/jforms/password-editor.js');
        $resp->addJSLink($JelixWWWPath . 'js/jforms/password-list.js');
    }

    protected function getCSSClass() {
        $class = parent::getCSSClass();
        return $class . ' form-control';
    }

    protected function displayInput(&$attr, $attrScore, $btnLabels) {
        echo '<div class="jforms-password-editor "><div class="input-group"> <input';
        $this->_outputAttr($attr);
        echo "/>\n";

        $designPath = jApp::urlJelixWWWPath() . 'design/icons8/';
        $urlshow = $designPath . 'icons8-eye-24.png';
        $urlhide = $designPath . 'icons8-invisible-24.png';
        $urlreg = $designPath . 'icons8-synchronize-24.png';
        $urlcopy = $designPath . 'icons8-copy-24.png';

        extract($btnLabels);

        echo <<<EOHTML
        <div class="jforms-password-buttons input-group-append">
            <button type="button" class="btn btn-outline-secondary jforms-password-regenerate" title="$regenerateLabel">
                <img src="$urlreg" alt="$regenerateLabel" width="15"/>
            </button>
            <button type="button" class="btn btn-outline-secondary jforms-password-toggle-visibility" title="$showLabel">
                <img src="$urlshow"  data-src-show="$urlshow"  data-src-hide="$urlhide" alt="$showLabel" width="15" class="jforms-password-visibility"/>
            </button>
            <button type="button" class="btn btn-outline-secondary jforms-password-copy" title="$copyLabel">
                <img src="$urlcopy"  alt="$copyLabel" width="15"/>
            </button>

            <div class="jforms-password-score input-group-text" 
EOHTML;
        $this->_outputAttr($attrScore);
        echo <<<EOHTML
            ></div>
        </div>
    </div></div>

EOHTML;
    }
}

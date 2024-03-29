<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
class adminlteFormBuilder extends \jelix\forms\Builder\HtmlBuilder
{
    protected $formType = 'adminlte';

    protected $jFormsJsVarName = 'jFormsJQ';

    //protected $htmlFormAttributes = array('class' => 'form-horizontal');

    protected $defaultPluginsConf = array();

    protected $htmlWidgetsAttributes = array(
    );

    public function outputMetaContent($t)
    {
        $resp = jApp::coord()->response;
        if ($resp === null || $resp->getType() != 'html') {
            return;
        }

        $resp->addAssets('jforms_html');
       // $confUrlEngine = &jApp::config()->urlengine;
        //$www = $confUrlEngine['jelixWWWPath'];

        //$resp->addJSLink(jApp::config()->jquery['jquery']);
        //$resp->addJSLink($www.'/jquery/include/jquery.include.js');
        //$resp->addJSLink($www.'js/jforms_jquery.js');
        //$resp->addCSSLink($www.'design/jform.css');


        //we loop on root control has they fill call the outputMetaContent recursively
        foreach ($this->_form->getRootControls() as $ctrlref => $ctrl) {
            if ($ctrl->type == 'hidden') {
                continue;
            }
            if (!$this->_form->isActivated($ctrlref)) {
                continue;
            }

            $widget = $this->getWidget($ctrl, $this->rootWidget);
            $widget->outputMetaContent($resp);
        }
    }

    public function outputAllControls()
    {
        $modal = $this->getOption('local');
        echo '<div class="card"><div class="card-body">';
        foreach ($this->_form->getRootControls() as $ctrlref => $ctrl) {
            if ($ctrl->type == 'submit' || $ctrl->type == 'reset' || $ctrl->type == 'hidden') {
                continue;
            }
            if (!$this->_form->isActivated($ctrlref)) {
                continue;
            }
            echo '<div class="form-group">';
            if ($ctrl->type == 'group') {
                $this->outputControl($ctrl);
            } else {
                $this->outputControlLabel($ctrl);
                echo '<div class="controls">';
                $this->outputControl($ctrl);
                echo "</div>\n";
            }
            echo "</div>\n";
        }
        echo "</div>\n</div>\n";

        if ($modal) {
            echo "</div>\n".'<div class="modal-footer"><div class="jforms-submit-buttons box-footer">';
        } else {
            echo '<div class="jforms-submit-buttons form-actions card-footer">';
        }
        if ($ctrl = $this->_form->getReset()) {
            if ($this->_form->isActivated($ctrl->ref)) {
                $this->outputControl($ctrl);
                echo ' ';
            }
        }
        foreach ($this->_form->getSubmits() as $ctrlref => $ctrl) {
            if (!$this->_form->isActivated($ctrlref)) {
                continue;
            }
            $this->outputControl($ctrl);
            echo ' ';
        }
        if ($this->getOption('cancel')) {
            if (isset($this->options['cancelLocale'])) {
                echo '<button class="btn" data-dismiss="modal" aria-hidden="true">', jLocale::get($this->options['cancelLocale']), '</button>';
            } else {
                echo '<button class="btn" data-dismiss="modal" aria-hidden="true">'.jLocale::get('jelix~ui.buttons.cancel').'</button>';
            }
        }
        echo "</div>\n";
        if ($modal) {
            echo "</div>\n";
        }
    }

    protected function outputErrors()
    {
        $errors = $this->_form->getContainer()->errors;
        if (count($errors)) {
            $ctrls = $this->_form->getControls();
            echo '<div id="'.$this->_name.'_errors" class="alert alert-block alert-error jforms-error-list">';
            foreach ($errors as $cname => $err) {
                if (!array_key_exists($cname, $ctrls) || !$this->_form->isActivated($ctrls[$cname]->ref)) {
                    continue;
                }
                if ($err === jForms::ERRDATA_REQUIRED) {
                    if ($ctrls[$cname]->alertRequired) {
                        echo '<p>', $ctrls[$cname]->alertRequired,'</p>';
                    } else {
                        echo '<p>', jLocale::get('jelix~formserr.js.err.required', $ctrls[$cname]->label),'</p>';
                    }
                } elseif ($err === jForms::ERRDATA_INVALID) {
                    if ($ctrls[$cname]->alertInvalid) {
                        echo '<p>', $ctrls[$cname]->alertInvalid,'</p>';
                    } else {
                        echo '<p>', jLocale::get('jelix~formserr.js.err.invalid', $ctrls[$cname]->label),'</p>';
                    }
                } elseif ($err === jForms::ERRDATA_INVALID_FILE_SIZE) {
                    echo '<p>', jLocale::get('jelix~formserr.js.err.invalid.file.size', $ctrls[$cname]->label),'</p>';
                } elseif ($err === jForms::ERRDATA_INVALID_FILE_TYPE) {
                    echo '<p>', jLocale::get('jelix~formserr.js.err.invalid.file.type', $ctrls[$cname]->label),'</p>';
                } elseif ($err === jForms::ERRDATA_FILE_UPLOAD_ERROR) {
                    echo '<p>', jLocale::get('jelix~formserr.js.err.file.upload', $ctrls[$cname]->label),'</p>';
                } elseif ($err != '') {
                    echo '<p>', $err,'</p>';
                }
            }
            echo '</div>';
        }
    }

    /**
     * @param jFormsControl $ctrl
     * @param string        $format
     * @param bool          $editMode
     */
    public function outputControlLabel($ctrl, $format = '', $editMode = true)
    {
        if ($ctrl->type == 'hidden' || $ctrl->type == 'button') {
            return;
        }
        if ($ctrl->type == 'checkbox'
            && $ctrl->valueLabelOnCheck === ''
            && $ctrl->valueLabelOnUncheck === '') {
            return;
        }
        $widget = $this->getWidget($ctrl, $this->rootWidget);
        $widget->outputLabel($format, $editMode);
    }


    public function outputControlHelp($ctrl)
    {
        if (!$ctrl->help) {
            return;
        }
        $widget = $this->getWidget($ctrl, $this->rootWidget);
        echo '<p class="help-block" id="'.$widget->getId().'-help">'.htmlspecialchars($ctrl->help).'</p>';
    }

    public function outputAllControlsValues()
    {
        echo '<div class="card"><div class="card-body form-horizontal jforms-view">';
        foreach ($this->_form->getRootControls() as $ctrlref => $ctrl) {
            if ($ctrl->type == 'submit' || $ctrl->type == 'reset' ||
                $ctrl->type == 'hidden' || $ctrl->type == 'captcha' ||
                $ctrl->type == 'secretconfirm'
            ) {
                continue;
            }
            if (!$this->_form->isActivated($ctrlref)) {
                continue;
            }
            echo '<div class="form-group">';
            if ($ctrl->type == 'group') {
                $this->outputControlValue($ctrl);
            } else {
                $this->outputControlLabel($ctrl, '', false);
                echo '<div class="controls col-sm-10">';
                $this->outputControlValue($ctrl);
                echo "</div>\n";
            }
            echo "</div>\n";
        }
        echo "</div>\n</div>\n";
    }
}

<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
class adminlteFormWidget extends \jelix\forms\HtmlWidget\RootWidget
{
    /**
     * @var \jelix\forms\Builder\HtmlBuilder
     */
    protected $builder;

    /**
     * @param \jelix\forms\Builder\HtmlBuilder $builder
     */
    public function outputHeader($builder)
    {
        $conf = jApp::config()->urlengine;
        $collection = jApp::config()->webassets['useCollection'];
        $jquery = jApp::config()->{'webassets_'.$collection}['jquery.js'];

        // no scope into an anonymous js function, because jFormsJQ.tForm is used by other generated source code
        $js = "jFormsJQ.selectFillUrl='".jUrl::get('jelix~jforms:getListData')."';\n";
        $js .= 'jFormsJQ.config = {locale:'.$builder->escJsStr(jApp::config()->locale).
            ',basePath:'.$builder->escJsStr(jApp::urlBasePath()).
            ',jqueryPath:'.$builder->escJsStr($conf['jqueryPath']).
            ',jqueryFile:'.$builder->escJsStr($jquery).
            ',jelixWWWPath:'.$builder->escJsStr($conf['jelixWWWPath'])."};\n";
        $js .= "jFormsJQ.tForm = new jFormsJQForm('".$builder->getName()."','".
            $builder->getForm()->getSelector()."','".
            $builder->getForm()->getContainer()->formId."');\n";
        $js .= 'jFormsJQ.tForm.setErrorDecorator(new '.$builder->getOption('errorDecorator')."());\n";
        $js .= "jFormsJQ.declareForm(jFormsJQ.tForm);\n";
        $this->addJs($js);

        if ($builder->getOption('modal')) {
            echo '<div class="modal-body">';
        }
        $this->builder = $builder;
    }

    /**
     * @param \jelix\forms\Builder\HtmlBuilder $builder
     */
    public function outputFooter($builder)
    {
        if ($this->builder->getOption('modal')) {
            echo '</div>';
        }
        $js = "jQuery(document).ready(function() { var c, c2;\n".$this->js.$this->finalJs.'});';
        $container = $builder->getForm()->getContainer();
        $container->privateData['__jforms_js'] = $js;
        $formId = $container->formId;
        $formName = $builder->getForm()->getSelector();
        echo '<script type="text/javascript" src="'.\jUrl::get(
                'jelix~jforms:js',
                array('__form' => $formName, '__fid' => $formId)
            ).'"></script>';
    }
}

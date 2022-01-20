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
        $form = $builder->getForm();

        // no scope into an anonymous js function, because jFormsJQ.tForm is used by other generated source code
        echo '<script type="text/javascript">
//<![CDATA[
jFormsJQ.selectFillUrl=\''.jUrl::get('jelix~jforms:getListData').'\';
jFormsJQ.config = {locale:'.$builder->escJsStr(jApp::config()->locale).
            ',basePath:'.$builder->escJsStr($conf['basePath']).
            ',jqueryPath:'.$builder->escJsStr($conf['jqueryPath']).
            ',jqueryFile:'.$builder->escJsStr(jApp::config()->jquery['jquery']).
            ',jelixWWWPath:'.$builder->escJsStr($conf['jelixWWWPath']).'};
jFormsJQ.tForm = new jFormsJQForm(\''.$builder->getName().'\',\''.$form->getSelector().'\',\''.$form->getContainer()->formId.'\');
jFormsJQ.tForm.setErrorDecorator(new '.$builder->getOption('errorDecorator').'());
jFormsJQ.declareForm(jFormsJQ.tForm);
//]]>
</script>';
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
        parent::outputFooter($builder);
    }
}

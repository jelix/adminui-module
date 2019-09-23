<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

/**
 * @param jTpl $tpl
 * @param string $boxId
 */
function jtpl_cfunction_html_dashboard_template(\Jelix\Castor\CompilerCore $compiler, $param = array())
{
    if (count($param) == 1) {
        $compiler->addMetaContent('$t->meta($t->get(\'dashboardItems\')->getTemplate('.$param[0].')->getTemplate());');

        return '$t->display($t->get(\'dashboardItems\')->consumeTemplate('.$param[0].'));';
    } else {
        $compiler->doError2('errors.tplplugin.cfunction.bad.argument.number', 'include', '1');

        return '';
    }
}

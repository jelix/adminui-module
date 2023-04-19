<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */
require_once JELIX_LIB_PATH.'plugins/formwidget/html/html.formwidget.php';

class adminlteFormWidget extends htmlFormWidget
{

    /**
     * @param \jelix\forms\Builder\HtmlBuilder $builder
     */
    public function outputHeader($builder)
    {
        parent::outputHeader($builder);
        if ($builder->getOption('modal')) {
            echo '<div class="modal-body">';
        }
    }

    /**
     * @param \jelix\forms\Builder\HtmlBuilder $builder
     */
    public function outputFooter($builder)
    {
        if ($builder->getOption('modal')) {
            echo '</div>';
        }
        parent::outputFooter($builder);
    }
}

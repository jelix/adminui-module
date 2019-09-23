<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

use Jelix\AdminUI\Dashboard\Items;

/**
 * @param jTpl $tpl
 * @param string $boxId
 */
function jtpl_function_html_dashboard_box($tpl, $boxId) {

    /** @var Items $items */
    $items = $tpl->get('dashboardItems');
    if (!$items) {
        return;
    }
    echo $items->consumeBox($boxId);
}
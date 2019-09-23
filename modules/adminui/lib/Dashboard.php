<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI;

use Jelix\AdminUI\Dashboard\SmallBox;

class Dashboard {

    protected $smallBoxHeaderEnabled = true;

    protected $mainTemplate = '';

    /**
     * @var int should be a multiple of 12, so should be equal to 1,2,3,4 or 6
     */
    protected $smallBoxPerRow = 4;

    function __construct($mainTemplate = '', $smallBoxHeaderEnabled = true) {
        $this->smallBoxHeaderEnabled = $smallBoxHeaderEnabled;
        $this->mainTemplate = $mainTemplate;
    }

    function render(Dashboard\Items $items) {
        $content = '';
        $tpl = new \jTpl();
        $tpl->assign('dashboardItems', $items);

        if ($this->mainTemplate) {
            $content .= $tpl->fetch($this->mainTemplate);
        }

        $templates = $items->getTemplates();
        foreach($templates as $template) {
            $content .= $tpl->fetch($template);
        }

        if ($this->smallBoxHeaderEnabled) {
            $content = $this->renderSmallBoxes($items, $tpl) . "\n".$content;
        }

        $content .= $this->renderRemainingBoxes($items, $tpl);

        return $content;
    }

    protected function renderSmallBoxes(Dashboard\Items $items, \jTpl $tpl) {
        $boxes = $items->getBoxes();

        $smallBoxes = array(array());
        $boxSizesPerRows = array();
        $row = 0;
        foreach ($boxes as $id => $box) {
            if ($box instanceof SmallBox) {
                if (count($smallBoxes[$row]) >= $this->smallBoxPerRow) {
                    $boxSizesPerRows[$row] = 12 / $this->smallBoxPerRow;
                    $smallBoxes[++$row] = array();
                }
                $smallBoxes[$row][] = $id;
            }
        }
        $lastRowCount = count($smallBoxes[$row]);
        if ($lastRowCount == 0  && $row == 0) {
            return '';
        }
        if ($lastRowCount == 5) {
            $boxSizesPerRows[$row] = 6;
        }
        else {
            $boxSizesPerRows[$row] = 12 / $lastRowCount;
        }

        $tpl->assign(array(
            'smallBoxes' => $smallBoxes,
            'boxSizesPerRows' => $boxSizesPerRows
        ));
        return $tpl->fetch('adminui~dashboard_small_boxes');
    }

    protected function renderRemainingBoxes(Dashboard\Items $items, \jTpl $tpl) {
        $rightBoxes = $items->getBoxes();
        if (!count($rightBoxes)) {
            return '';
        }

        $leftBoxes = array_slice($rightBoxes, 0, round(count($rightBoxes) / 2, 0 , PHP_ROUND_HALF_UP));

        $tpl->assign(array(
            'rightBoxes' => $rightBoxes,
            'leftBoxes' => $leftBoxes
        ));
        return $tpl->fetch('adminui~dashboard_remaining_boxes');
    }

}












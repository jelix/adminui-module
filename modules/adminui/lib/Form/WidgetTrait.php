<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2022 Laurent Jouanneau
 *
 * @link     https://jelix.org
 * @licence  MIT
 */

namespace Jelix\AdminUI\Form;

trait WidgetTrait
{
    protected function outputLabelAsTitle($label, $attr)
    {
        echo '<label class="',$attr['class'],'"',$attr['idLabel'],$attr['hint'],'>';
        echo htmlspecialchars($label), $attr['reqHtml'];
        echo "</label>\n";
    }


    public function outputHelp()
    {
        $this->builder->outputControlHelp($this->ctrl);
    }
}

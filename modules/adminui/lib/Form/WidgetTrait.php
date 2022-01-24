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

    protected function getLabelAttributes($editMode)
    {
        $attr = parent::getLabelAttributes($editMode);
        $attr['class'] .= ' control-label';
        if (!$editMode) {
            $attr['class'] .= ' col-sm-2';
        }
        return $attr;
    }

    protected function getValueAttributes()
    {
        $attr = parent::getValueAttributes();
        $attr['class'] .= ' form-control';

        return $attr;
    }

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

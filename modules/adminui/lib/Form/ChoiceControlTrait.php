<?php
/**
* @author    Raphaël MARTIN
* @copyright 2024 3liz.com
*
* @see      3liz.com
*
* @license   MIT
*/

namespace Jelix\AdminUI\Form;

trait ChoiceControlTrait
{
    /**
     * use parent method, and if readonly, add proper attributes
     * Note that value won't be sent by submit but it is not a problem as it is readonly
     * this method is usefull for radio and checkbox(es) controls
     */
    protected function getControlAttributes()
    {
        $attr = parent::getControlAttributes();
        if ($this->ctrl->isReadOnly()) {
            $attr['disabled'] = 'disabled';
        } else {
            unset($attr['disabled']);
        }
        return $attr;
    }
}

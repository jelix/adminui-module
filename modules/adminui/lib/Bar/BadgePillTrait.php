<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Bar;

trait BadgePillTrait {

    /**
     * @var array[] each array has a 'label' and 'type' elements
     *              'type' is one of BADGE_PILL_ constant
     */
    protected $badgePills= array();


    public function setBadgePill($label, $type = 'primary', $id = 'default') {
        $this->badgePills[$id] = array('label'=>$label, 'type'=>$type);
    }

    public function unsetBadgePill($id = 'default') {
        if (isset($this->badgePills[$id])) {
            unset($this->badgePills[$id]);
        }
    }

    public function getBadgePill($id) {
        if (isset($this->badgePills[$id])) {
            return $this->badgePills[$id];
        }
        return null;
    }

    public function getBadgePills() {
        return $this->badgePills;
    }
}
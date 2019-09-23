<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Dashboard;

class Template  extends Item {

    /**
     * @var string template selector
     */
    protected $template;

    /**
     * @param string $id
     * @param string $template template selector
     */
    function __construct($id, $template)
    {
        parent::__construct($id);
        $this->template = $template;
    }

    /**
     * @return string
     */
    function getTemplate() {
        return $this->template;
    }

}

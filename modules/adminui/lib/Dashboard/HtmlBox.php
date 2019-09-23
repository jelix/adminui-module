<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Dashboard;


class HtmlBox extends Box {

    protected $content;

    function __construct($id, $content)
    {
        parent::__construct($id);
        $this->content = $content;
    }

    function getContent() {
        return $this->content;
    }

}
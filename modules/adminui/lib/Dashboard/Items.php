<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

namespace Jelix\AdminUI\Dashboard;


class Items {

    /**
     * @var Template[]
     */
    protected $templates = array();

    /**
     * @var Box[]
     */
    protected $boxes = array();

    /**
     * @param Template $template
     */
    function addTemplate(Template $template) {
        $this->templates[$template->getId()] = $template;
    }

    /**
     * @param Box $box
     */
    function addBox(Box $box) {
        $this->boxes[$box->getId()] = $box;
    }

    /**
     * @return Template[]
     */
    function getTemplates() {
        return $this->templates;
    }

    /**
     * @return Box[]
     */
    function getBoxes() {
        return $this->boxes;
    }

    /**
     * @param $id
     * @return string
     */
    function consumeBox($id) {
        if (isset($this->boxes[$id])) {
            $content = $this->boxes[$id]->getContent();
            unset($this->boxes[$id]);
            return $content;
        }
        return '';
    }

    /**
     * @param $id
     * @return string
     */
    function consumeTemplate($id) {
        if (isset($this->templates[$id])) {
            $content = $this->templates[$id]->getTemplate();
            unset($this->templates[$id]);
            return $content;
        }
        return '';
    }

    /**
     * @param $id
     * @return Template|null
     */
    function getTemplate($id) {
        if (isset($this->templates[$id])) {
            return $this->templates[$id];
        }
        return null;
    }

}
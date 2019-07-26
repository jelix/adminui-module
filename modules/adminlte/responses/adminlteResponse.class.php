<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2019 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence MIT
 */

require_once (JELIX_LIB_PATH.'core/response/jResponseHtml.class.php');

class adminlteResponse extends jResponseHtml {

    public $bodyTpl = 'adminlte~main';
    public $IECompatibilityMode = 'IE=edge';
    protected $_MetaOldContentType = false;
    public $metaViewport = 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no';

    protected function doAfterActions(){

        $this->title .= ($this->title !=''?'Admin':'');

        $this->body->assignIfNone('MAIN','<p>Empty page</p>');
        $this->body->assignIfNone('page_title', 'AdminLte Test');
    }
}
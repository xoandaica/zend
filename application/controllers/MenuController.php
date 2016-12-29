<?php

class MenuController extends Zend_Controller_Action {

    public function init() {
        $response = $this->getResponse();
        $response->insert('menuBar', $this->view->render('menuBar.phtml'));
    }

    public function indexAction() {
        // action body
    }

}

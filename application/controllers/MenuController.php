<?php

class MenuController extends Zend_Controller_Action {

    public function init() {
//        $response = $this->getResponse();
        $this->view->current = "Product";
//        $response->insert('menuBar', $this->view->render('menuBar.phtml'));
    }

    public function indexAction() {
//        $this->_helper->layout->setLayout('layout');
        // action body
        
    }

}

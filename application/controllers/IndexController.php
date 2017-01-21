<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
//        $response = $this->getResponse();
        $this->view->current = "Product";
//        setCurrentMenu("Product");c
//        $response->insert('menuBar', $this->view->render('menuBar.phtml'));
    }

    public function indexAction() {
        $categories = new Application_Model_DbTable_Categories();
        $listCategories = $categories->getAll();
        $this->view->categories = $listCategories;
        $this->view->categoriesSub = clone $listCategories;
    }

}

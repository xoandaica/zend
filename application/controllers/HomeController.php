<?php

class HomeController extends Zend_Controller_BaseController {

    
    public function init() {
//        $response = $this->getResponse();
//        $this->view->current = "Product";
        setCurrentMenu("Product");
//        $response->insert('menuBar', $this->view->render('menuBar.phtml'));
    }

    public function indexAction() {
        $categories = new Application_Model_DbTable_Categories();
        $listCategories = $categories->fetchAll();
        $this->view->categories = $listCategories;
        $this->view->categoriesSub = clone $listCategories;
    }

}

<?php

class HomeController extends Custom_Controller_BaseController {

    
    public function init() {
//        $response = $this->getResponse();
//        $response->insert('menuBar', $this->view->render('menuBar.phtml'));
        parent::setCurrentMenu("Product");
    }

    public function indexAction() {
        $categories = new Application_Model_DbTable_Categories();
        $listCategories = $categories->fetchAll();
        $this->view->categories = $listCategories;
        $this->view->categoriesSub = clone $listCategories;
    }

}

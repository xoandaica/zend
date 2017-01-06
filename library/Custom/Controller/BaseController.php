<?php

require_once 'Zend/Controller/Action.php';

class Custom_Controller_BaseController extends Zend_Controller_Action {

    protected $categoriesModel;
    protected $productsModel;

    public function initCategoriesModel() {
        if ($this->categoriesModel == null) {
            $this->categoriesModel = new Application_Model_DbTable_Categories();
        } else {
            return $this->categoriesModel;
        }
    }

    public function initProductModel() {
        if ($this->productsModel == null) {
            $this->productsModel = new Application_Model_DbTable_Products();
        } else {
            return $this->productsModel;
        }
    }

    protected function initContent($menu) {
        // init menu bar
        $this->view->current = $menu;
        
        // init object
        $this->initCategoriesModel();
        $this->initProductModel();
    }

    public function indexAction() {

        $categories = new Application_Model_DbTable_Categories();
        $listCategories = $categories->fetchAll();
        $this->view->categories = $listCategories;
        $this->view->categoriesSub = clone $listCategories;
    }

    protected function showMenu() {
        
        $listCategories = $this->categoriesModel->fetchAll();
        $this->view->categories = $listCategories;
        $this->view->categoriesSub = clone $listCategories;
    }

}

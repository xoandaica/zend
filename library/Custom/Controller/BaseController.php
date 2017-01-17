<?php

require_once 'Zend/Controller/Action.php';

class Custom_Controller_BaseController extends Zend_Controller_Action {

    protected $categoriesModel;
    protected $productsModel;
    protected $menusDAO;

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

    public function initMenusDAO() {
        if ($this->menusDAO == null) {
            $this->menusDAO = new Application_Model_DbTable_Menus();
        } else {
            return $this->menusDAO;
        }
    }

    protected function initContent($menu) {
        // init menu bar
        $this->view->current = $menu;

        // init object
        $this->initCategoriesModel();
        $this->initProductModel();
        $this->initMenusDAO();
    }

    protected function showMenu() {



        $listCategories = $this->categoriesModel->fetchAll();
        $this->view->categories = $listCategories;
        $this->view->categoriesSub = clone $listCategories;

        $this->view->listMenusTop = $this->menusDAO->getAllMenu('top');
    }

}

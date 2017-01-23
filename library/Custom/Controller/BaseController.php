<?php

require_once 'Zend/Controller/Action.php';

class Custom_Controller_BaseController extends Zend_Controller_Action {

    protected $categoryDAO;
    protected $productDAO;
    protected $menuDAO;
    protected $moduleDAO;

    public function init() {
        $this->initCategoriesModel();
        $this->initProductModel();
        $this->initMenusDAO();
        $this->initModuleDAO();
    }

    public function initCategoriesModel() {
        if ($this->categoryDAO == null) {
            $this->categoryDAO = new Application_Model_DbTable_Categories();
        } else {
            return $this->categoryDAO;
        }
    }

    public function initProductModel() {
        if ($this->productDAO == null) {
            $this->productDAO = new Application_Model_DbTable_Products();
        } else {
            return $this->productDAO;
        }
    }

    public function initMenusDAO() {
        if ($this->menuDAO == null) {
            $this->menuDAO = new Application_Model_DbTable_Menus();
        } else {
            return $this->menuDAO;
        }
    }

    public function initModuleDAO() {
        if ($this->moduleDAO == null) {
            $this->moduleDAO = new Application_Model_DbTable_Modules();
        } else {
            return $this->moduleDAO;
        }
    }

    protected function initContent($menu) {
        // init menu bar
        $this->view->current = $menu;

        // init object
        $this->initCategoriesModel();
        $this->initProductModel();
        $this->initMenusDAO();
        $this->initModuleDAO();
    }

    protected function showMenu() {
        $listCategories = $this->categoryDAO->fetchAll();
        $this->view->categories = $listCategories;
        $this->view->categoriesSub = clone $listCategories;

        $this->view->listMenusTop = $this->menusDAO->getMenusByPosition('top');
        $this->view->listMenusLeft = $this->menusDAO->getMenusByPosition('left');
    }

}

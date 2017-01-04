<?php
require_once 'Zend/Controller/Action.php';


class Zend_Controller_BaseController extends Zend_Controller_Action {

    private $currentMenu = '';

    public function init() {
//        $response = $this->getResponse();
        $this->view->current = $currentMenu;
//        $response->insert('menuBar', $this->view->render('menuBar.phtml'));
    }

    protected function setCurrentMenu($menu) {
        $this->$currentMenu = $menu;
        $this->init();
    }

    public function indexAction() {
        $categories = new Application_Model_DbTable_Categories();
        $listCategories = $categories->fetchAll();
        $this->view->categories = $listCategories;
        $this->view->categoriesSub = clone $listCategories;
    }

}

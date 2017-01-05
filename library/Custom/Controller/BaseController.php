<?php

require_once 'Zend/Controller/Action.php';

class Custom_Controller_BaseController extends Zend_Controller_Action {

    protected function setCurrentMenu($menu) {
        $this->view->current = $menu;
    }

    public function indexAction() {
        $categories = new Application_Model_DbTable_Categories();
        $listCategories = $categories->fetchAll();
        $this->view->categories = $listCategories;
        $this->view->categoriesSub = clone $listCategories;
    }

}

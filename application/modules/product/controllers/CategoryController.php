<?php

class Product_CategoryController extends Custom_Controller_BaseUserController {

    public function init() {
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('/admin/layout');
        parent::init();
        parent::loadUserInfor();
        parent::loadMenuByRole();
    }

    public function indexAction() {
        // action body
    }

    public function viewAction() {
        
    }

    public function addAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $name = $request->getPost("name", null);
            $alias = $request->getPost("alias", null);
            $root = $request->getPost("parent", null);
            if ($root == -1)
                $root = null;
            $content = $request->getPost("description", null);
            $sort = $request->getPost("sort", null);
            $newRow = array("name" => $name, "alias" => $alias, "parent_category" => $root, "content" => $content, "order" => $sort);
            $this->categoryDAO->create($newRow);
        } else {
            $this->view->listCategory = $this->categoryDAO->getCategories();
        }
    }

    public function editAction() {
        
    }

}

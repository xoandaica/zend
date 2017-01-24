<?php

class Product_CategoryController extends Custom_Controller_BaseUserController {

    private $order;

    public function init() {
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('/admin/layout');
        parent::init();
        parent::loadUserInfor();
        parent::loadMenuByRole();
        $this->order = 0;
    }

    public function indexAction() {
        // action body
    }

    public function viewAction() {
        $this->view->listCategory = $this->categoryDAO->getCategories();
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
            $newRow = array("name" => $name, "alias" => $alias, "parent_category" => $root, "content" => $content);
            $this->categoryDAO->create($newRow);
        } else {
            $this->view->listCategory = $this->categoryDAO->getCategories();
        }
    }

    public function editAction() {
        $request = $this->getRequest();
        // posision menu : top, left, right, bottom
        if ($request->isPost()) {
            if (array_key_exists('editCategory', $request->getPost())) {
                # Publish-button was clicked
                $id = $request->getParam("id");
                $name = $request->getPost("name", null);
                $alias = $request->getPost("alias", null);
                $root = $request->getPost("parent", null);
                if ($root == -1)
                    $root = null;
                $content = $request->getPost("description", null);
                $newRow = array("name" => $name, "parent_category" => $root, "description" => $content);
                print_r($id);
                $this->categoryDAO->update($newRow, $id);
            } else if (array_key_exists('deleteCategory', $request->getPost())) {
                $id = $request->getParam("id");
                $this->categoryDAO->delete($id);
                # Save-button was clicked
            }
            $this->view->listCategory = $this->categoryDAO->getCategories();
            $this->_helper->redirector('view', 'Category', 'product');
        } else {
            $id = $request->getParam("id");
            $this->view->listCategory = $this->categoryDAO->getCategories();
            $this->view->category = $this->categoryDAO->get($id);
        }
    }

    public function saveAction() {
        try {
            $request = $this->getRequest();
            $listCategory = $request->getPost("newcategory", null);
//        $menuPosition = $request->getPost("menuPosition", null);
            $arrayCategory = json_decode($listCategory, true); //decode json to array
            Zend_Debug::dump($arrayCategory);
            foreach ($arrayCategory as $parentCategory) {
                // update rootMenu
                $this->categoryDAO->updateCategory($parentCategory['id'], null, ++$this->order);
                $this->loop($parentCategory);
            }
            $this->view->listCategory = $this->categoryDAO->getCategories();
            $this->_helper->redirector('view', 'Category', 'product');
        } catch (Zend_Exception $ex) {
            Zend_Debug::dump($ex);
        }
    }

    private function loop($parentCategory) {
        if (!empty($parentCategory['children'])) {
            $arrayMenu = $parentCategory['children'];
            foreach ($arrayMenu as $category) {
                $this->categoryDAO->updateCategory($category['id'], $parentCategory['id'], ++$this->order);
                $this->loop($category);
            }
        }
    }

}

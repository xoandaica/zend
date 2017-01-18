<?php

class Product_CategoryController extends Custom_Controller_BaseUserController {

    public function init() {
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('/admin/layout');
        $this->loadSession();
        $this->loadUserInfor();
        $this->loadMenuByRole();
    }

    public function indexAction() {
        // action body
    }

    public function viewAction() {
        
    }

    public function addAction() {
        
    }

    public function editAction() {
        
    }

}

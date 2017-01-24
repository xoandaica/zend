<?php

class Product_ProductController extends Custom_Controller_BaseUserController {

    public function init() {
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('/admin/layout');
        parent::init();
        parent::loadUserInfor();
        parent::loadMenuByRole();
    }

    public function viewAction() {
        // action body
    }

    public function editAction() {
        // action body
    }

    public function deleteAction() {
        // action body
    }

    public function addAction() {
        // action body
    }

}

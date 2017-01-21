<?php

class Administrator_HomeController extends Custom_Controller_BaseUserController {

    public function init() {
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('/admin/layout');
        $this->loadSession();
        $this->loadUserInfor();
        $this->loadMenuByRole();
    }

    public function indexAction() {
        // return index view
    }

}

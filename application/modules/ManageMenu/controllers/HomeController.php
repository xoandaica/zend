<?php

class ManageMenu_HomeController extends Custom_Controller_BaseUserController {

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
        $request = $this->getRequest();
        $menuPosition = $request->getPost("menuPosition", null);
        print_r($menuPosition);
    }

}

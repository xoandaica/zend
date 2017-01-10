<?php

class Administrator_LoginController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
        $this->_helper->layout()->disableLayout();
    }

    public function indexAction() {
        // action body
    }

    public function loginAction() {
        $request = $this->getRequest();
        $username = $request->getPost('username', null);
        $password = $request->getPost('password', null);
        if ($this->login($username, $password)) {
            $this->_helper->viewRenderer->renderBySpec('index', array('module' =>
                'administrator', 'controller' => 'Home'));
        } else {
            echo "ahihi";
        }
    }

    public function login($username, $password) {
        if ($username == "admin" && $password == "123456") {
            return true;
        } else {
            return false;
        }
    }

}

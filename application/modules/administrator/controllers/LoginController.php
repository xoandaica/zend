<?php

class Administrator_LoginController extends Custom_Controller_BaseUserController {

    public function init() {
        /* Initialize action controller here */
        $this->_helper->layout()->disableLayout();
        $this->loadSession();
    }

    /**
     * Login Action
     * return a view named login.phtml
     */
    public function loginAction() {
        try {
            if ($this->getSession()->userInfor != null) {
                $this->view->userInfor = $this->getSession()->userInfor;
                $this->loadMenuByRole();
                $this->_helper->redirector('index', 'Home', 'administrator');
//                $this->_helper->viewRenderer->renderBySpec('index', array('module' =>
//                    'administrator', 'controller' => 'Home'));
            } else {
                $request = $this->getRequest();
                if ($request->isPost()) {
                    $username = $request->getPost('username', null);
                    $password = $request->getPost('password', null);
                    $userInfor = $this->login($username, $password);
                    if ($userInfor != null) {
                        $this->getSession()->userInfor = $userInfor;
                        $this->_helper->redirector('index', 'Home', 'administrator');
                    } else {
                        $this->view->loginStatus = 'false';
                        $this->_helper->viewRenderer->renderBySpec('login', array('module' =>
                            'administrator', 'controller' => 'Login'));
//                        $this->_helper->redirector('login', 'Login', 'administrator');
                    }
                }
            }
        } catch (Zend_Exception $ex) {
            Zend_Debug::dump($ex);
        }
    }

    /**
     * logout Action
     */
    public function logoutAction() {
        $this->getSession()->unsetAll();
        $this->_helper->viewRenderer->renderBySpec('login', array('module' =>
            'administrator', 'controller' => 'Login'));
    }

    public function login($username, $password) {
        $userWithRole = new Administrator_Model_UserInfor();
        $loginDAO = new Application_Model_DbTable_Users();
        $roleDAO = new Application_Model_DbTable_Roles();
        $user = $loginDAO->getUser($username, $password);
        if ($user != null) {
            // update role infor for user
            $userWithRole->setUserInfor($user);
            $role = $roleDAO->getRole($user->role);
            if ($role != null) {
                $userWithRole->setUserRole($role);
                return $userWithRole;
            }
        }
        return null;
    }

}

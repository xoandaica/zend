<?php

class Administrator_LoginController extends Custom_Controller_BaseUserController {

    public function init() {
        /* Initialize action controller here */
        $this->_helper->layout()->disableLayout();
        $this->loadSession();
    }

    public function loginAction() {
        if ($this->getSession()->userInfor != null) {
            $this->view->userInfor = $this->getSession()->userInfor;
            $this->_helper->viewRenderer->renderBySpec('index', array('module' =>
                'administrator', 'controller' => 'Home'));
        } else {
            $request = $this->getRequest();
            if ($request->isPost()) {
                $username = $request->getPost('username', null);
                $password = $request->getPost('password', null);
                $userInfor = $this->login($username, $password);
                if ($userInfor != null) {
                    $this->getSession()->userInfor = $userInfor;
                    $this->view->userInfor = $userInfor;
                    // set listModule by Role
                    $functionDAO = new Application_Model_DbTable_Functions();
                    $arrayIdFunction = explode(",", $userInfor->getUserRole()->id_functions);
                    print_r($arrayIdFunction);
                    $listModuleByRole = $functionDAO->getListModuleByFunctionID($arrayIdFunction);
//                    $this->view->listModuleByRole = $listModuleByRole;

//                    $this->_helper->viewRenderer->renderBySpec('index', array('module' =>
//                        'administrator', 'controller' => 'Home'));
                    print_r($listModuleByRole);
//                    $this->_helper->viewRenderer->renderBySpec('login', array('module' =>
//                        'administrator', 'controller' => 'Login'));
                } else {
                    $this->view->loginStatus = 'false';
                    $this->_helper->viewRenderer->renderBySpec('login', array('module' =>
                        'administrator', 'controller' => 'Login'));
                }
            }
        }
    }

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

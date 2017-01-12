<?php

require_once 'Zend/Controller/Action.php';

class Custom_Controller_BaseUserController extends Zend_Controller_Action {

    private $session;

    public function loadSession() {
        $session = new Zend_Session_Namespace("UserSession");
        $this->setSession($session);
    }

    function getSession() {
        return $this->session;
    }

    function setSession($session) {
        $this->session = $session;
    }

    function loadMenuByRole() {
        // set listModule by Role
        $moduleDAO = new Application_Model_DbTable_Modules();
        $arrayIdFunction = explode(",", $this->getSession()->userInfor->getUserRole()->id_functions);
        $listModuleByRole = $moduleDAO->getListModuleByFunctionId($arrayIdFunction);
        $this->view->listModuleByRole = $listModuleByRole;
    }

    function loadUserInfor() {
        if ($this->getSession()->userInfor != null) {
            $this->view->userInfor = $this->getSession()->userInfor;
        }
    }

}

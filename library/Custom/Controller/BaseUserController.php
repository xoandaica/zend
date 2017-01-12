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

}

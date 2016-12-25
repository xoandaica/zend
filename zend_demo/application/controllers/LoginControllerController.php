<?php

class LoginControllerController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        $form = new Application_Form_Login();
        $form->submit->setLabel('Add');
        $this->view->form = $form;
    }

}

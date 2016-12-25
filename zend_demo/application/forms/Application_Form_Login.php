<?php

class Application_Form_Login extends Zend_Form {

    public function init() {
        $form = new Zend_Form();
        $form->setAction('/user/login')
                ->setMethod('post');

// Create and configure username element:
        $username = $form->createElement('text', 'username');
        $username->addValidator('alnum')
                ->addValidator('regex', false, array('/^[a-z]+/'))
                ->addValidator('stringLength', false, array(6, 20))
                ->setRequired(true)
                ->addFilter('StringToLower');

// Create and configure password element:
        $password = $form->createElement('password', 'password');
        $password->addValidator('StringLength', false, array(6))
                ->setRequired(true);

// Add elements to form:
        $form->addElement($username)
                ->addElement($password)
                // use addElement() as a factory to create 'Login' button:
                ->addElement('submit', 'login', array('label' => 'Login'));
    }

}

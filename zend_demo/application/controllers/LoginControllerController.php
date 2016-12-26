<?php

class LoginControllerController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
       $this->view->current_date_and_time = date('M d, Y - H:i:s');
       $this->view->ahihi= 1;
    }

    public function testAction()
    {
       $this->view->current_date_and_time = date('M d, Y - H:i:s');
    }

    public function ahihiAction()
    {
        $form = new Application_Form_Login();
        $this->view->form = $form;
    }


}



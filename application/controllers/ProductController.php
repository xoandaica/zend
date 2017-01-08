<?php

class ProductController extends Custom_Controller_BaseController {

    public function init() {
        /* Initialize action controller here */
        $this->initContent("Product");
    }

    public function indexAction() {
        // action body
    }

    public function detailAction() {
        $this->showMenu();
        $request = $this->getRequest(); //$this should refer to a controller
        $id = $request->getParam('id');
        
        $product = $this->productsModel->fetchRow("id = ".$id);
        $this->view->productDetail = $product;
        
        
    }

}

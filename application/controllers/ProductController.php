<?php

require_once 'Zend/Session.php';

class ProductController extends Custom_Controller_BaseController {

    public function init() {
        /* Initialize action controller here */
        $this->initContent("Product");
    }

    public function indexAction() {
        // action body
    }

    public function detailAction() {
        //init menu
        $this->showMenu();
        $request = $this->getRequest(); //$this should refer to a controller
        $id = $request->getParam('id');

        $product = $this->productsModel->fetchRow("id = " . $id);
        $this->view->productDetail = $product;
    }

    public function cartAction() {
        // init menu
        $this->showMenu();
//        If (!Zend_Session::sessionExist()) {
        $sess = new Zend_Session_Namespace("cartSession");
        $sess->cart = new Application_Model_CartModel();
//        }
        $cart = $sess->cart;
        if ($cart->getTotalNumber() == 0) {
            /**
             *  add product to cart
             */
            // get data from request
            $request = $this->getRequest();
            $idProduct = $request->getPost('idProduct', null);
            $num = $request->getPost('pnum', null);
            // get detail product with id
            $product = $this->productsModel->fetchRow("id = " . $idProduct);
            $cartItem = new Application_Model_CartItem();
            $cartItem->setProduct($product);
            $cartItem->setNumber($num);
            // get cart info from session
            $arrayProduct = $cart->getListProduct();
            // update number product
            array_push($arrayProduct, $cartItem);
            // update cart
            $cart->setListProduct($arrayProduct);
            // show view
            $this->view->cart = $cart;
        } else {
            // update product number if existed
        }
    }

}


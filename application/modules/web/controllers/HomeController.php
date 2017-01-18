<?php

class Web_HomeController extends Custom_Controller_BaseController {

    public function init() {
        $this->_helper->layout->setLayout('/web/layout');
        $this->initContent("Product");
    }

    public function indexAction() {
        // show list menu
        $this->showMenu();
        // show list product
        $listProducts = [];
        $allRootCategory = $this->categoriesModel->getAllRootCategories();
        foreach ($allRootCategory as $tmp) {
            $arrayProduct = [];
            $product = $this->productsModel->getListProductByRootCategory($tmp['id']);
            array_push($arrayProduct, $product);
            $productsDetails = new Application_Model_Products();
            $productsDetails->setCategory($tmp);
            $productsDetails->setListProducts($product);
            array_push($listProducts, $productsDetails);
        }

        $this->view->listProducts = $listProducts;
    }

}

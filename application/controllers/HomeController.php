<?php

class HomeController extends Custom_Controller_BaseController {

    public function init() {
//        $response = $this->getResponse();
//        $response->insert('menuBar', $this->view->render('menuBar.phtml'));
        parent::setCurrentMenu("Product");
    }

    public function indexAction() {
        // show list menu
        $categoriesModel = new Application_Model_DbTable_Categories();
        $productsModel = new Application_Model_DbTable_Products();

        $listCategories = $categoriesModel->fetchAll();
        $this->view->categories = $listCategories;
        $this->view->categoriesSub = clone $listCategories;

        // show list product
        $listProducts = [];
        $allRootCategory = $categoriesModel->getAllRootCategories();
        foreach ($allRootCategory as $tmp) {
            $arrayProduct = [];
            $product = $productsModel->getListProductByRootCategory($tmp['id']);
            array_push($arrayProduct, $product);
            $productsDetails = new Application_Model_Products();
            $productsDetails->setCategory($tmp);
            $productsDetails->setListProducts($product);
            array_push($listProducts, $productsDetails);
        }

        $this->view->listProducts = $listProducts;
    }

}

<?php

class Application_Model_Products {

    private $products;
    private $category;

    public function setListProducts($products) {
        $this->products = $products;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getProducts() {
        return $this->products;
    }

    public function getCategory() {
        return $this->category;
    }

}

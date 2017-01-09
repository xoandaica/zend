<?php

class Application_Model_CartModel {

    // mang cartItem
    private $listProduct;
    // tong tien
    private $totalMoney;
    // tong so san pham
    private $totalNumber;

    function getListProduct() {
        if ($this->listProduct == null) {
            $this->listProduct = [];
        }
        return $this->listProduct;
    }

    function setListProduct($listProduct) {
        $this->listProduct = $listProduct;
    }

    function getTotalMoney() {
        return $this->totalMoney;
    }

    function getTotalNumber() {
        if ($this->totalNumber == null) {
            return 0;
        }
        return $this->totalNumber;
    }

    function setTotalMoney($totalMoney) {
        $this->totalMoney = $totalMoney;
    }

    function setTotalNumber($totalNumber) {
        $this->totalNumber = $totalNumber;
    }

}

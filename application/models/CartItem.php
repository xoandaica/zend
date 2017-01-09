<?php

class Application_Model_CartItem {

    // chi tiet san pham
    private $product;
    // so luong
    private $number;
    // ghi chu san pham
    private $note;

    function getProduct() {
        return $this->product;
    }

    function getNumber() {
        return $this->number;
    }

    function getNote() {
        return $this->note;
    }

    function setProduct($product) {
        $this->product = $product;
    }

    function setNumber($number) {
        $this->number = $number;
    }

    function setNote($note) {
        $this->note = $note;
    }

}

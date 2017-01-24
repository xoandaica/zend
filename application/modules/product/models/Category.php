<?php

class Product_Model_Category {

    // 
    private $dataId;
    private $currentCategory;
    private $arrayChildCategory;

    // for view in view.html


    function getCurrentCategory() {
        return $this->currentCategory;
    }

    function getArrayChildCategory() {
        return $this->arrayChildCategory;
    }

    function setCurrentCategory($currentCategory) {
        $this->currentCategory = $currentCategory;
    }

    function setArrayChildCategory($arrayChildCategory) {
        $this->arrayChildCategory = $arrayChildCategory;
    }

    function getDataId() {
        return $this->dataId;
    }

    function setDataId($dataId) {
        $this->dataId = $dataId;
    }

}

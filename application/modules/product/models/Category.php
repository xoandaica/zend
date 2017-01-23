<?php

class Product_Model_Category {

    // 
    private $dataId;
    private $currentMenu;
    private $arrayChildMenu;

    // for view in view.html


    function getCurrentMenu() {
        return $this->currentMenu;
    }

    function getArrayChildMenu() {
        return $this->arrayChildMenu;
    }

    function setCurrentMenu($currentMenu) {
        $this->currentMenu = $currentMenu;
    }

    function setArrayChildMenu($arrayChildMenu) {
        $this->arrayChildMenu = $arrayChildMenu;
    }

    function getDataId() {
        return $this->dataId;
    }

    function setDataId($dataId) {
        $this->dataId = $dataId;
    }

}

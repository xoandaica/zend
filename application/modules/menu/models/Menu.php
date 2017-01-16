<?php

class Menu_Model_Menu {

    // 
    private $dataId;
    private $currentMenu;
    private $arrayChildMenu;
    // for view in view.html
    public static $numberObject = 0;

    function __construct() {
        self::$numberObject++;
    }

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

    static function getNumberObject() {
        return self::$numberObject;
    }

    static function setNumberObject($numberObject) {
        self::$numberObject = $numberObject;
    }

}

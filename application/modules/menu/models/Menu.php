<?php

class Menu_Model_Menu {

    // infor user get from db 
    private $currentMenu;
    
    private $arrayChildMenu;
    
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


    
}

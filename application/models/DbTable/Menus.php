<?php

class Application_Model_DbTable_Menus extends Zend_Db_Table_Abstract {

    protected $_name = 'menus';

    public function getAllMenu() {
        try {
            $rows = $this->fetchAll();
            $arrayMenu = [];
            foreach ($rows as $tmp) {
                if ($tmp->root_menu == null) {
                    $menu = new Menu_Model_Menu();
                    $menu->setCurrentMenu($tmp->name);
                    $menu->setArrayChildMenu($this->loopMenu($tmp, $rows));
                    array_push($arrayMenu, $menu);
                }
            }
            print_r($arrayMenu);
        } catch (Zend_Exception $e) {
            Zend_Debug::dump($e);
        }

        
    }

    public function loopMenu($menu, $rows) {
        $arrayChildMenu = [];
        foreach ($rows as $tmp) {
            if ($tmp->root_menu != null && $tmp->root_menu === $menu->id) {
                $menu = new Menu_Model_Menu();
                $menu->setCurrentMenu($tmp->name);
                $menu->setArrayChildMenu($this->loopMenu($tmp, $rows));
                array_push($arrayChildMenu, $menu);
            }
        }
        return $arrayChildMenu;
    }

}

<?php

class Application_Model_DbTable_Menus extends Zend_Db_Table_Abstract {

    protected $_name = 'menus';

    public function getAllMenu($position) {
        try {
            $rows = $this->fetchAll('position ="' . $position . '"')->toArray();
            $arrayMenu = [];
            foreach ($rows as $element) {
                if ($element['root_menu'] === null) {
                    $menu = new Menu_Model_Menu();
                    $menu->setCurrentMenu($element['name']);
                    $menu->setArrayChildMenu($this->loopChild($element, $rows));
                    array_push($arrayMenu, $menu);
                }
            }
            return $arrayMenu;
        } catch (Zend_Exception $e) {
            Zend_Debug::dump($e);
        }
    }

    public function loopChild($tmp, $rows) {
        $arrayChildMenu = [];
        foreach ($rows as $element) {
            if ($element['root_menu'] != null && $element['root_menu'] == $tmp['id']) {
                $menu = new Menu_Model_Menu();
                $menu->setCurrentMenu($element['name']);
                $menu->setArrayChildMenu($this->loopChild($element, $rows));
                array_push($arrayChildMenu, $menu);
            }
        }
        return $arrayChildMenu;
    }

}

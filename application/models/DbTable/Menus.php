<?php

class Application_Model_DbTable_Menus extends Custom_Database_AbstractCRUD {

    protected $_name = 'menus';

    public function getMenusByPosition($position) {
        try {
            $select = $this->select()->where('position ="' . $position . '"')->order("order asc");
            $rows = $this->fetchAll($select)->toArray();
            $arrayMenu = [];
            foreach ($rows as $element) {
                if ($element['root_menu'] === null) {
                    $menu = new Menu_Model_Menu();
                    $menu->setDataId($element['id']);
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
                $menu->setDataId($element['id']);
                $menu->setCurrentMenu($element['name']);
                $menu->setArrayChildMenu($this->loopChild($element, $rows));
                array_push($arrayChildMenu, $menu);
            }
        }
        return $arrayChildMenu;
    }

    public function updateMenu($idMenu, $rootMenu, $order) {
        try {
            $arrayData = array('root_menu' => $rootMenu, "order" => $order);
            $this->update($arrayData, $idMenu);
        } catch (Zend_Exception $e) {
            Zend_Debug::dump($e);
        }
    }

}

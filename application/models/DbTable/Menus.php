<?php

class Application_Model_DbTable_Menus extends Zend_Db_Table_Abstract {

    protected $_name = 'menus';

    public function getAllMenu($position) {
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
            $this->update($arrayData, " id =" . $idMenu);
        } catch (Zend_Exception $e) {
            Zend_Debug::dump($e);
        }
    }

//    public function updateMenu1($name, $alias, $posistion, $root, $module, $content, $description, $id) {
//        try {
//            $newRow = array("name" => $name, "alias" => $alias, "root_menu" => $root, "module" => $module, "position" => $posistion, "content" => $content);
//            $this->update($newRow, " id = " . $id);
//        } catch (Zend_Exception $e) {
//            Zend_Debug::dump($e);
//        }
//    }
//
//    public function addMenu($name, $alias, $posistion, $root, $module, $content, $description) {
//        try {
//            $newRow = array("name" => $name, "alias" => $alias, "root_menu" => $root, "module" => $module, "position" => $posistion, "content" => $content);
//            $row = $this->createRow($newRow);
//            $row->save();
//        } catch (Zend_Exception $e) {
//            Zend_Debug::dump($e);
//        }
//    }

//    public function getMenuById($id) {
//        try {
//            $idInt = (int) $id;
//            $row = $this->fetchRow("id = " . $idInt);
//            return $row->toArray();
//        } catch (Zend_Exception $ex) {
//            Zend_Debug::dump($ex);
//        }
//    }
//
//    public function deleteById($id) {
//        try {
//            $this->delete("id = " . $id);
//        } catch (Zend_Exception $ex) {
//            Zend_Debug::dump($ex);
//        }
//    }

}

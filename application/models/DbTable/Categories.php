
<?php

class Application_Model_DbTable_Categories extends Custom_Database_AbstractCRUD {

    protected $_name = 'categories';

    public function getAllRootCategories() {
        $row = $this->fetchAll('parent_category is null');
        if (!$row) {
            throw new Exception("Could not get all root categories");
        }
        return $row->toArray();
    }

    public function getCategories() {
        try {
            $rows = $this->fetchAll()->toArray();
            $arrayMenu = [];
            foreach ($rows as $element) {
                if ($element['parent_category'] === null) {
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
            if ($element['parent_category'] != null && $element['parent_category'] == $tmp['id']) {
                $menu = new Menu_Model_Menu();
                $menu->setDataId($element['id']);
                $menu->setCurrentMenu($element['name']);
                $menu->setArrayChildMenu($this->loopChild($element, $rows));
                array_push($arrayChildMenu, $menu);
            }
        }
        return $arrayChildMenu;
    }

}

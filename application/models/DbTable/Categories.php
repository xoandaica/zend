
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
            $arrayCategory = [];
            foreach ($rows as $element) {
                if ($element['parent_category'] === null) {
                    $menu = new Product_Model_Category();
                    $menu->setDataId($element['id']);
                    $menu->setCurrentCategory($element['name']);
                    $menu->setArrayChildCategory($this->loopChild($element, $rows));
                    array_push($arrayCategory, $menu);
                }
            }
            return $arrayCategory;
        } catch (Zend_Exception $e) {
            Zend_Debug::dump($e);
        }
    }

    public function loopChild($tmp, $rows) {
        $arrayChildCategory = [];
        foreach ($rows as $element) {
            if ($element['parent_category'] != null && $element['parent_category'] == $tmp['id']) {
                $menu = new Product_Model_Category();
                $menu->setDataId($element['id']);
                $menu->setCurrentCategory($element['name']);
                $menu->setArrayChildCategory($this->loopChild($element, $rows));
                array_push($arrayChildCategory, $menu);
            }
        }
        return $arrayChildCategory;
    }

    public function updateCategory($idCategory, $rootCategory, $order) {
        try {
            $arrayData = array('parent_category' => $rootCategory, "order" => $order);
            $this->update($arrayData, $idCategory);
        } catch (Zend_Exception $e) {
            Zend_Debug::dump($e);
        }
    }

}

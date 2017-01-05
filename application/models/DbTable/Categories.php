<?php

class Application_Model_DbTable_Categories extends Zend_Db_Table_Abstract {

    protected $_name = 'categories';

    public function getById($id) {

        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function getAllRootCategories() {
        $row = $this->fetchAll('parent_category is null');
        if (!$row) {
            throw new Exception("Could not get all root categories");
        }
        return $row->toArray();
    }

}

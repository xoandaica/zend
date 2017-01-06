<?php

class Application_Model_DbTable_Products extends Zend_Db_Table_Abstract {

    protected $_name = 'products';

    public function getListProductByRootCategory($idCategory) {
        $idCategory = (int) $idCategory;
        $row = $this->fetchAll('root_category = ' . $idCategory);
        if (!$row) {
            throw new Exception("Could not find row $idCategory");
        }
        return $row->toArray();
    }

}

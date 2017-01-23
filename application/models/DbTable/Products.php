<?php

class Application_Model_DbTable_Products extends Custom_Database_AbstractCRUD {

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

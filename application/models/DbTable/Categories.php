
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

}

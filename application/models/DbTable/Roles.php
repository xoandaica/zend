<?php

class Application_Model_DbTable_Roles extends Zend_Db_Table_Abstract {

    protected $_name = 'roles';

    public function getRole($idRole) {
        $idRole = (int) $idRole;
        $row = $this->fetchRow("id=" . $idRole);
        if (!$row) {
            return null;
        }
        return $row;
    }

}

<?php

class Application_Model_DbTable_Roles extends Custom_Database_AbstractCRUD {

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

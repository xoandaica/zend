<?php

class Application_Model_DbTable_Users extends Custom_Database_AbstractCRUD {

    protected $_name = 'users';

    public function getUser($username, $password) {
        $row = $this->fetchRow("username = '" . $username . "' and password= '" . $password."'");
        if (!$row) {
            return null;
        }
        return $row;
    }

}

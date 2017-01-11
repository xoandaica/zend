<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract {

    protected $_name = 'users';

    public function getUser($username, $password) {
        $row = $this->fetchRow("username = '" . $username . "' and password= '" . $password."'");
        if (!$row) {
            return null;
        }
        return $row;
    }

}

<?php

class Administrator_Model_UserInfor {

    // infor user get from db 
    private $userInfor;
    // role of user get from db
    private $userRole;

    function getUserInfor() {
        return $this->userInfor;
    }

    function getUserRole() {
        return $this->userRole;
    }

    function setUserInfor($userInfor) {
        $this->userInfor = $userInfor;
    }

    function setUserRole($userRole) {
        $this->userRole = $userRole;
    }

}

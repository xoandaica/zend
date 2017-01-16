<?php

class Application_Model_DbTable_Modules extends Zend_Db_Table_Abstract {

    protected $_name = 'modules';

    public function getAllModulesForMenus() {
        try {
            // with can_show = 0, this modules can't be included in menus
            $rows = $this->fetchAll(' can_show = 1');
        } catch (Zend_Exception $ex) {
            Zend_Debug::dump($ex);
        }
        return $rows->toArray();
    }

    public function getListModuleByFunctionId($arrayFunctionId) {
        try {
            $condition = " id in (";
            $condition .= implode(",", $arrayFunctionId);
            $condition .= ")";

            $functionDAO = new Application_Model_DbTable_Functions();
            $queryGetListModule = $functionDAO->select()->distinct()->from('functions', 'id_module')->where($condition);
            $rows = $functionDAO->fetchAll($queryGetListModule);
            $arrayModuleId = [];
            foreach ($rows->toArray() as $tmp) {
                array_push($arrayModuleId, $tmp['id_module']);
            }
            $condition1 = " id in (";
            $condition1 .= implode(",", $arrayModuleId);
            $condition1 .= ")";
            $rows1 = $this->fetchAll($condition1);
            return $rows1->toArray();
        } catch (Zend_Exception $e) {
            Zend_Debug::dump($e);
        }
    }

}

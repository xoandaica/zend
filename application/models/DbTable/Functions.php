<?php

class Application_Model_DbTable_Functions extends Zend_Db_Table_Abstract {

    protected $_name = 'functions';

    public function getListModuleByFunctionID($arrayFunctionId) {
        $condition = " id in (";
        $condition .= implode(",", $arrayFunctionId);
        $condition .= ")";

        $selectIdModule = $this->select()->distinct()->from('functions', 'id_module')->where($condition);


//        $selectModuleDetail = $this->select()->from('modules','*')->where('id in (1)');

        $rows = $this->fetchAll($this->select()->from('modules')->joinInner(array('a' => 'functions'), 'modules.id = a.id_module')->where('a.id in (1,2,3,4)'));
        return $rows->toArray();
    }

}

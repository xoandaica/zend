<?php

require_once 'Zend/Db/Table/Abstract.php';

class Custom_Database_AbstractCRUD extends Zend_Db_Table_Abstract {

    public function get($id) {
        try {
            $row = parent::fetchRow('id =' . $id);
            return $row->toArray();
        } catch (Zend_Exception $ex) {
            Zend_Debug::dump($ex);
        }
    }

    public function update($arrayData, $id) {
        try {

            parent::update($arrayData, "id = " . $id);
        } catch (Zend_Exception $ex) {
            Zend_Debug::dump($ex);
        }
    }

    public function delete($id) {
        try {
            parent::delete("id = " . $id);
        } catch (Zend_Exception $ex) {
            Zend_Debug::dump($ex);
        }
    }

    public function create($arrayData) {
        try {
            $row = parent::createRow($arrayData);
            $row->save();
        } catch (Zend_Exception $e) {
            Zend_Debug::dump($e);
        }
    }

    public function getAll() {
        try {
            $row = parent::fetchAll();
            return $row->toArray();
        } catch (Zend_Exception $ex) {
            Zend_Debug::dump($ex);
        }
    }

}

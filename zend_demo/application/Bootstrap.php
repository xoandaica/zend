<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
protected function _initAutoload()
{
$this->_resourceLoader = new Zend_Loader_Autoloader_Resource(array(
'namespace' => 'Application',
'basePath' => APPLICATION_PATH . '/forms',
));
}
}


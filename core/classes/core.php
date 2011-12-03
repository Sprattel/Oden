<?php


/**
 * 
 */
class OD_Core {
  var $od;
  function __construct() {
    $this->od = &Oden::getInstance();    
    $this->load = new OD_Load();
    $this->model = new OD_Model();
    
    $database = new OD_Database($this->od->config->get('db_driver'));
    $this->db = $database->getInstance();
  }
   
  function __get($name) {
    classLoader($name);
    $this->{$normalName} = new $name();
  }
}

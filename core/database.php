<?php

class OD_Database
{
  var $db;
  var $od;
  public function __construct($db_driver)
  {
    $od = &get_instance();
    $db_file = DB_DIR . DS . $db_driver . '.php';

    require_once ($db_file);
    $db_driver = "OD_" . $db_driver;
    $this->db = new $db_driver;
  }

  function get_instance()
  {    
    return $this->db;
  }

}

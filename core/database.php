<?php

class OD_Database
{
  var $db;
  var $od;
  private static $instance;
  public function __construct($db_driver)
  {
    self::$instance = &$this;
    $db_file = CORE_DIR . 'database' . DS . $db_driver . '.php';

    require_once ($db_file);
    $db_driver = "OD_" . $db_driver;
    $this->db = new $db_driver;
  }
  
  public function getDb() {
    return $this->db->getDb();
  }
  
  public static function &get_instance()
  {    
    return self::$instance;
  }

}

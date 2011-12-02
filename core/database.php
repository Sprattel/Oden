<?php

class OD_Database
{
  var $db;
  var $od;
  private static $instance;
  
  /*
   * Setup the database driver
   * @param (string)$db_driver
   * @return void
   */
  
  public function __construct($db_driver)
  {
    self::$instance = &$this;
    $db_file = CORE_DIR . 'database' . DS . $db_driver . '.php';

    require_once ($db_file);
    $db_driver = "OD_" . $db_driver;
    $this->db = new $db_driver;
  }
  
  /*
   * Return active database
   */
  public function getDb() {
    return $this->db->getDb();
  }
  
  /*
   * Return instance of the database 
   * @return OD_Database
   */
  public static function &get_instance()
  {    
    return self::$instance;
  }

}

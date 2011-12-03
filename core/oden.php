<?php
include 'corefuncs.php';

class Oden {
  var $controller;
  var $config;
  var $router;
  var $db;
  var $benchmark;
  
  
  private static $instance;

  public function __construct() {
    self::$instance = &$this;
    
    require_once (CORE_DIR . 'magicmethods.php');
    
    //Error Handlerss
    require_once (CORE_DIR . 'errorhandler.php');
    set_error_handler("error_handler");
    
    
    //Load config
    $this->config = new OD_Configure();
    require_once (APPLICATION_DIR . 'configs' . DS . 'config.php');
        
    //Init required core classes   
    $this->db = new OD_Database($this->config->get("db_driver"));    
    new ODM();    
    $this->router = new OD_Router();
    
    //Start
    $this->loadAndRunController();

  }
  
  /*
   * Return instance of Oden 
   * @return Oden
   */
  public static function &getInstance()
  {
    return self::$instance;
  }
  
  /*
   * Load controller
   */
  private function loadAndRunController()
  {
    if ($this->router->getController() != "")
      $controller = $this->router->getController();
    else
      $controller = $this->config->get('default_controller');

    if ($this->router->getMethod())
      $method = $this->router->getMethod();

    $params = $this->router->getArgs();

    $controllerFile = APPLICATION_DIR . 'controllers' . DS . $controller . '.php';

    include $controllerFile;

    $this->$controller = new $controller;
    if (!isset($method))
      $method = 'index';

    if ((int)method_exists($this->$controller, $method))
      call_user_func_array(array($this->$controller, $method), $params);
  }


}

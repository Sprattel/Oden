<?php

class Oden
{
  var $controller;
  var $config;
  var $router;
  var $db;

  private static $instance;

  public function __construct()
  {
    self::$instance = &$this;
    
    //Load required core files
    require_once (CORE_DIR . 'configure.php');
    $this->config = new OD_Configure();
    require_once (APPLICATION_DIR . 'configs' . DS . 'config.php');
    require_once (CORE_DIR . 'magicmethods.php');
    require_once (CORE_DIR . 'libs' . DS . 'odm.php');    
    require_once (CORE_DIR . 'database.php');
    require_once (CORE_DIR . 'load.php');
    require_once (CORE_DIR . 'model.php');
    require_once (CORE_DIR . 'controller.php');
    require_once (CORE_DIR . 'router.php');
    require_once (CORE_DIR . 'errorhandler.php');
    require_once (CORE_DIR . 'libs' . DS . 'cache.php'); 
    
    //Init required core classes   
    $this->db = new OD_Database($this->config->get("db_driver"));    
    new ODM();    
    $this->router = new OD_Router();
    
    //Set custom error handler
    set_error_handler("error_handler");
    
    //Start
    $this->loadAndRunController();

  }
  
  /*
   * Return instance of Oden 
   * @return Oden
   */
  public static function &get_instance()
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

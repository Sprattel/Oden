<?php

class Oden
{
  var $controller;
  var $config;
  var $router;

  private static $instance;

  public function __construct()
  {
    self::$instance = &$this;

    require_once (CORE_DIR . DS . 'configure.php');
    $this->config = new OD_Configure();
    require_once (CONFIGS_DIR . DS . 'config.php');

    require_once (CORE_DIR . DS . 'database.php');
    require_once (CORE_DIR . DS . 'load.php');
    require_once (CORE_DIR . DS . 'model.php');
    require_once (CORE_DIR . DS . 'controller.php');
    require_once (CORE_DIR . DS . 'router.php');
    require_once (CORE_DIR . DS . 'error_handler.php');

    require_once (CORE_DIR . LIBS_DIR . DS . 'cache.php');

    $this->router = new OD_Router();
    set_error_handler("error_handler");
    $this->_loadAndRunController();

  }

  public static function &get_instance()
  {
    return self::$instance;
  }

  function _loadAndRunController()
  {
    if ($this->router->getController() != "")
      $controller = $this->router->getController();
    else
      $controller = $this->config->get('default_controller');

    if ($this->router->getMethod())
      $method = $this->router->getMethod();

    $params = $this->router->getArgs();

    $controllerFile = CONTROLLERS_DIR . DS . $controller . '.php';

    include $controllerFile;

    $this->$controller = new $controller;
    if (!isset($method))
      $method = 'index';

    if ((int)method_exists($this->$controller, $method))
      call_user_func_array(array($this->$controller, $method), $params);
  }


}

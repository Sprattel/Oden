<?php

require_once (CONFIGS_DIR . DS . 'config.php');
require_once (CORE_DIR . DS . 'load.php');
require_once (CORE_DIR . DS . 'model.php');
require_once (CORE_DIR . DS . 'controller.php');
require_once (CORE_DIR . DS . 'error_handler.php');

require_once (CORE_DIR . LIBS_DIR . DS . 'cache.php');
//error handler
set_error_handler("error_handler");


/**
 * Using output buffering to include a PHP file into a string
 * http://php.net/manual/en/function.include.php
 * 
 * @return string
 * @param string $filename
 */
function get_include_contents($filename) {
  if(is_file($filename)) {
    ob_start();
    include $filename;
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
  }
  return false;
}

$uri = preg_split('/\//', $_SERVER['REQUEST_URI']);

if($uri[1] != "")
  $controller = $uri[1];
else
  $controller = $config['default_controller'];

if(isset($uri[2]))
  $method = $uri[2];

$params = array_slice($uri, 3);

$controllerFile = CONTROLLERS_DIR . DS . $controller . '.php';

include $controllerFile;

$controllerChild = new $controller;

if(!isset($method))
  $method = 'index';

if((int)method_exists($controllerChild, $method))
  call_user_func_array(array($controllerChild, $method), $params);

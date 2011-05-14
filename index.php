<?php

session_start();
//bench
$time_start = microtime(true);

error_reporting(E_ALL);

ini_set('display_errors', 'On');
ini_set('memory_limit', '64M');

define('DS', '/');

define('CORE_DIR', DS . 'core');
define('APPLICATION_DIR', DS . 'application');
define('SCRIPT_DIR', DS . 'script');
define('CSS_DIR', DS . 'css');
define('IMAGES_DIR', DS . 'images');
define('CACHE_DIR', DS . 'cache');

define('LIBS_DIR', DS . 'libs');

define('VIEWS_DIR', APPLICATION_DIR . DS . 'views');
define('CONTROLLERS_DIR', APPLICATION_DIR . DS . 'controllers');
define('CONFIGS_DIR', APPLICATION_DIR . DS . 'configs');
define('ELEMENTS_DIR', APPLICATION_DIR . DS . 'elements');

require_once (CORE_DIR . DS . 'bootstrap.php');

$time_end = microtime(true);
$time = $time_end - $time_start;

echo $time;

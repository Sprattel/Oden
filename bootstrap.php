<?php
error_reporting(E_ALL);

//CP = Class prefix
define('CP', 'OD_');

define('DS', DIRECTORY_SEPARATOR );


define('REALPATH', realpath('..'));

define('CORE_DIR', REALPATH. DS . 'core' . DS);
define('APPLICATION_DIR', REALPATH. DS  . 'application' . DS);
define('PHP_EXT', '.php');

ini_set('display_errors', 'On');
ini_set('memory_limit', '64M');

require_once (CORE_DIR . DS . 'oden.php');
new Oden();

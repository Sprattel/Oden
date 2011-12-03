<?php



function classLoader($name) {
   
	$modelPath = APPLICATION_DIR . "models" . DS . strtolower($name) . PHP_EXT;
  if(file_exists($modelPath))
    require_once $modelPath;
  
  $coreClassName = str_replace(CP, '', $name);
  $corePath = CORE_DIR . "classes" . DS . strtolower($coreClassName) . PHP_EXT;
  if(file_exists($corePath))
    require_once $corePath;
}
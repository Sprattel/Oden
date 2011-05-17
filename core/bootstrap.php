<?php

/**
 * Using output buffering to include a PHP file into a string
 * http://php.net/manual/en/function.include.php
 * 
 * @return string
 * @param string $filename
 */
function get_include_contents($filename)
{
  if (is_file($filename))
  {
    ob_start();
    include $filename;
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
  }
  return false;
}
function &get_instance()
{
  return Oden::get_instance();
}
require_once (CORE_DIR . DS . 'oden.php');
new Oden();

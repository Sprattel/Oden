<?php

class OD_Benchmark {
  static $marks = array();
  
  /*
   * Start a new benchmark
   */
  public static function start($name) {
    self::$marks[$name]['start'] = microtime();
  }
  
  /*
   * End benchmark
   */
  public static function end($name)  {
    self::$marks[$name]['end'] = microtime();
  }
  
  /*
   * Return mark
   */
  public static function getMark($name) {
    return self::$marks[$name];
  }
  
  /*
   * return time between start and end in milliseconds
   */
  public static function getTime($name) {
    $start = self::$marks[$name]['start'];
    $end = self::$marks[$name]['end'];
    return $end - $start;
  }
}

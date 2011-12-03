<?php

class OD_Benchmark {
  var $marks = array();
  
  /*
   * Start a new benchmark
   */
  public function start($name) {
    $this->marks[$name]['start'] = microtime();
  }
  
  /*
   * End benchmark
   */
  public function end($name)  {
    $this->marks[$name]['end'] = microtime();
  }
  
  /*
   * Return mark
   */
  public function getMark($name) {
    return $this->$marks[$name];
  }
  
  /*
   * return time between start and end in milliseconds
   */
  public function getTime($name) {
    $start = $this->marks[$name]['start'];
    $end = $this->marks[$name]['end'];
    return $end - $start;
  }
}

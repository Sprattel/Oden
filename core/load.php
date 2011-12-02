<?php

class OD_Load
{
  /**
   * Loads a view file 
   * 
   * @access public
   * @param string $filename, array $data, int $cacheTime
   * @return void
   */
  public function view($filename, $data = null, $cacheTime = 0) {
    if (is_array($data))
      extract($data);
  
    include APPLICATION_DIR . 'html'. DS . 'views' . DS . $filename.PHP_EXT;
  }
  
  /*
   * Loads a element file
   * 
   * @access public
   * @param string $filename, array $data, int $cacheTime
   * @return void
   */
  public function element($element, $data = null, $cacheTime = 0) {
    if (is_array($data))
      extract($data);
    
    include APPLICATION_DIR . 'html'. DS . 'elements' . DS . $filename.PHP_EXT;
  }  
}

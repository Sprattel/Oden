<?php

class OD_Load
{
  /**
   *
   * This function 
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

  public function element($element, $data = null, $cacheTime = 0) {
    if (is_array($data))
      extract($data);
    
    include APPLICATION_DIR . 'html'. DS . 'elements' . DS . $filename.PHP_EXT;
  }  
}

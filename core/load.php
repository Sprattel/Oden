<?php

class Load {
  /**
   *
   * This function 
   * 
   * @access public
   * @param string $filename, array $data, int $cacheTime
   * @return void
   */
  public function view($filename, $data = null, $cacheTime = 0) {
    if(!Cache::get('v_' . $filename)) {
      if(is_array($data)) {
        extract($data);
      }

      $inc = get_include_contents(include VIEWS_DIR . DS . $filename . '.php');
      if(Cache::save('v_' . $filename, $inc, $cacheTime))
        return $inc;

    } else {
      return Cache::get('v_' . $filename);
    }
  }

  public function element($element, $data = null, $cacheTime = 0) {
    if(!Cache::get('e_' . $element)) {
      if(is_array($data)) {
        extract($data);
      }

      $inc = get_include_contents(include ELEMENTS_DIR . DS . $element . '.php');
      if(Cache::save('e_' . $element, $inc, $cacheTime))
        return $inc;

    } else {
      return Cache::get('e_' . $element);
    }

  }
}

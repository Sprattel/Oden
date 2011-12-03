<?php

class OD_Router
{
  var $segments = array();

  function __construct()
  {
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($uri);
    $this->segments = $uri;
  }

  /**
   * Get the current controller in url
   * @return string
   */
  function getController()
  {
    return $this->segments[0];
  }

  /**
   * Get the current method in url
   * @return string
   */
  function getMethod()
  {
    if (isset($this->segments[1]))
      return $this->segments[1];
  }

  /**
   * Get the current arguments in url
   * @return array
   */
  function getArgs()
  {
    return array_slice($this->segments, 2);
  }


}

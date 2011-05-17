<?php

class OD_Configure
{
  var $config;

  /**
   * This method sets a config value
   */
  function set($key, $value)
  {
    $this->config[$key] = $value;
  }

  /**
   * This method gets a config value
   */
  function get($key)
  {
    if (array_key_exists($key, $this->config))
      return $this->config[$key];
    else
      return false;
  }
}

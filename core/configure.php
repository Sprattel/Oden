<?php

class OD_Configure
{
  var $config;
  var $currentUser = false;
  
  function __construct() {
    $this->loadUser();
  }
  /*
   * Load current developer
   */
  private function loadUser(){
    $currentUserFilePath = APPLICATION_DIR.'configs'.DS.'currentuser';

    if(file_exists($currentUserFilePath))
      $this->currentUser = file_get_contents($currentUserFilePath);
  }
  /*
   * Get current user
   */
  function getUser() {
    return $this->currentUser;
  }
  
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

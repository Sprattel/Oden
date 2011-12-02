<?php

/**
 * Oden database driver for the NoSQL datanase MongoDB
 * http://www.mongodb.org/
 */

class OD_MongoDB
{
  var $connection;
  var $connect_string;
  var $db;
  var $od;
  public function __construct() {
    $this->od =& Oden::getInstance();
    
    $this->connect($this->od->config->get('db_username'),
                   $this->od->config->get('db_password'),
                   $this->od->config->get('db_name'),
                   $this->od->config->get('db_host'),
                   $this->od->config->get('db_port'));
    
  }
  
  /*
   * Connect to the database
   */
  function connect($username, $password, $database, $host, $port) {
    if(!empty($username) && !empty($password))
      $this->connect_string = "mongodb://{$username}:{$password}@{$host}:{$port}";   
    else 
      $this->connect_string = "mongodb://{$host}:{$port}";
    try {
      $this->connection = new Mongo($this->connect_string);
    } catch(MongoConnectionException $e) {
      throw $e;
    }

    $this->db = $this->connection->{$database};
  }
  
  /*
   * Return mongoDb
   */
  function getDb() {
    return $this->db;
  }

}
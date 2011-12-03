<?php

//default controller

$this->config->set('default_controller', 'welcome');

/**
 * Database config
 * 
 */
$this->config->set('db_driver', 'mongodb');

$this->config->set('db_host', '127.0.0.1');
$this->config->set('db_port', '27017');
$this->config->set('db_name', 'oden');
$this->config->set('db_username', '');
$this->config->set('db_password', '');


//Example
//Dev mode
if($this->config->getUser() == 'dev') {

}

//Live mode
if(!$this->config->getUser()) {

}






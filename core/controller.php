<?php

class OD_Controller
{
  public $load;
  public $model;
  public $viewData;
  public $elementData;
  public $config;
  public $db;
  
  function __construct()  {
    $od = &Oden::getInstance();

    $this->load = new OD_Load();
    $this->model = new OD_Model();

    $database = new OD_Database($od->config->get('db_driver'));
    $this->db = $database->getInstance();
  }

  function __destruct() {
    unset($this->load);
    unset($this->model);
  }

}

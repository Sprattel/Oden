<?php

class Controller {
  public $load;
  public $model;
  public $viewData;
  public $elementData;

  function __construct() {
    $this->load = new Load();
    $this->model = new Model();
  }

  function __destruct() {
    unset($this->load);
    unset($this->model);
  }

}

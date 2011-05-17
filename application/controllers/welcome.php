<?php

class Welcome extends OD_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function index($param1 = null)
  {
    $this->load->view('welcome', array('hello' => 'world', 'debugFiles' =>
      get_included_files(), 10));
  }
}

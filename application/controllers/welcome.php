<?php

class Welcome extends OD_Controller {
  function __construct() {
    parent::__construct();
  }

  function index($param1 = null) {
    
    $this->benchmark->start("fisk");

    $user = new User();
    
    $katt = new Item();    
    $katt->setName("Katt");
    $Hund = new Item();    
    $Hund->setName("Hund");
    
    $user->setUsername("Martin");
    $user->setPassword("Larsson");
    $user->setPassword("Larsson2");
    
    $user->setAllt(array('hello' => 'world'));
    $user->setAllt(array('hello' => 'w', 'foo' => 'bar'));
    
    $user->addItem($katt);
    $user->addItem($Hund);
    
    $this->benchmark->End("fisk");
    
    $this->load->view('welcome',
    array('hello' => 'world',
    'debugFiles' =>get_included_files(),
    'benchtest' => $this->benchmark->getTime("fisk"), 10));
  }
}

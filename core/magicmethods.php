<?php

function __autoload($name) {
  include APPLICATION_DIR . "models" . DS . strtolower($name) . PHP_EXT;
}
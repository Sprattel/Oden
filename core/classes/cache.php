<?php

class Cache {
  static function save($data, $key, $timeout = 0) {
    return apc_store($data, $key, $timeout);
  }
  static function get($key) {
    return apc_fetch($key);
  }
}

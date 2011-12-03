<?php


define('SET_PATTERN', '/^set(.+)/');
define('GET_PATTERN', '/^get(.+)/');
define('ADD_PATTERN', '/^add(.+)/');


class ODM {
  private $db;
  private $id;
  private $class;
  private $collection;
  
  function __construct() {
    $database = &OD_Database::getInstance();
    $this->db = $database->getDb();
  }
  
  public function __call($name, $arguments) {
    $this->class = get_class($this);
    $this->collection = $this->db->{$this->class};  
    $name = strtolower($name);
    
    if(preg_match(SET_PATTERN, $name, $match))
      return $this->set($match[1], $arguments);
    
    if(preg_match(GET_PATTERN, $name, $match))
      return $this->get($match[1], $arguments);
    
    if(preg_match(ADD_PATTERN, $name, $match))
      return $this->add($match[1], array_pop($arguments));
  }
  
  /*
   * Set field in db
   */
  private function add($field, $object) {
    $this->collection->update(
      array('_id' => $this->getId()),
      array('$push' => array( $field => $object->getId())),
      array("upsert" => true));
  }
  
  /*
   * Set field in db
   */
  private function set($field, $value = null) {
    if(count($value) == 1)
      $data[$field] = array_pop($value);
    else
      $data[$field] = $value;    
    
    $this->{$field} = $data[$field];
    
    if(isset($this->id)) {
      $this->update($field, $data);
      return $this->id;
    }
    
    $this->collection->insert($data);    
    
    $this->id = $data['_id'];
    
    return $this->id;
  }
  
  /*
   * Update field in db
   */
  private function update($field, $data) {        
    $this->collection->update(
      array('_id' => $this->id),
      array('$set' => array( $field => $data[$field] )),
      array("upsert" => false));
  }
  
  /*
   * Get field in db
   */
  private function get($field) {
    if(isset($this->{$field}))
      return $this->{$field};

    $data = $this->collection->findOne(array('_id' => $this->id), array($field));
    $this->{$field} = $data[$field];
    return $this->{$field};
  }
  
  public function getId() {
    return $this->id;
  }
}

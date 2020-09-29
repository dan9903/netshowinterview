<?php

namespace Source\Models;

use Source\Database\Connection;
use \PDOException;

abstract class Model {
  protected $table = null;
  
  public abstract function find();
  public abstract function save();
  /**
  * Prepare query to insert on database
  * @param array $values [field => value]
  * @return boolean
   */

  protected function insert($values) {
    $fields = implode(', ', array_keys($values) );
    $binds = implode(', ', array_pad([], count($values), '?'));
    $query = 'INSERT INTO '.$this->table.' ( '.$fields.' ) VALUES ( '.$binds.' );';
    $ret = $this->execute($query, array_values($values));
    return $ret ? true: false;
  }

  protected function select($where=null, $order=null, $limit=null, $fields= '*') {
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
    
    return $this->execute($query);
  }

  private function execute($query, $params = []) {
    try {
      $stmt = Connection::getInstance()->prepare($query);
      $stmt->execute($params);
      return $stmt;
    } catch ( \PDOException $e) {
      die($e->getMessage());
    }
  }
}